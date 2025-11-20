<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Announcement;
use App\Models\CommitteeMember;
use App\Models\Facility;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function utama()
    {
        $carouselAnnouncements = Announcement::whereDate('start_date', '<=', now()->startOfDay())
            ->orderBy('start_date')
            ->get()
            ->map(function (Announcement $announcement, int $index) {
                $imageUrl = $announcement->image_path
                    ? Storage::url($announcement->image_path)
                    : asset('images/buletin-placeholder.jpg');

                return [
                    'id' => $announcement->announcementID,
                    'title' => $announcement->title,
                    'summary' => Str::limit(strip_tags($announcement->content), 150),
                    'image_url' => $imageUrl,
                    'start_date' => optional($announcement->start_date)->format('d M Y'),
                    'anchor' => 'news-' . ($index + 1),
                ];
            });

        return view('guest.utama', compact('carouselAnnouncements'));
    }

	public function ahliJawatankuasa()
	{
		$members = CommitteeMember::orderBy('position')->orderBy('name')->get();
		// Map to view-friendly arrays with resolved image URLs
		$membersMapped = $members->map(function ($member) {
			$imageUrl = Storage::url($member->photo_path);
			return [
				'name' => $member->name,
				'position' => $member->position,
				'phone' => $member->phone_number,
				'image_url' => $imageUrl,
			];
		});

		// Define top positions for Majlis Tertinggi
		$topPositions = ['Pengerusi', 'Bendahari', 'Setiausaha'];

		$majlisTertinggi = $membersMapped->filter(function ($m) use ($topPositions) {
			return in_array(strtolower($m['position']), array_map('strtolower', $topPositions));
		})->sortBy(function ($m) use ($topPositions) {
			// Keep consistent ordering: Pengerusi, Bendahari, Setiausaha
			$order = array_map('strtolower', $topPositions);
			return array_search(strtolower($m['position']), $order);
		})->values()->all();

		$ahliJawatankuasaLain = $membersMapped->reject(function ($m) use ($topPositions) {
			return in_array(strtolower($m['position']), array_map('strtolower', $topPositions));
		})->values()->all();

		return view('guest.ajk', compact('majlisTertinggi', 'ahliJawatankuasaLain'));
	}

    public function fasiliti()
    {
        $fasiliti = Facility::orderBy('name', 'asc')->get();
        return view('guest.fasiliti', compact('fasiliti'));
    }

    public function aktiviti(AktivitiController $aktivitiController)
    {
        // Fetch activities from database
        $activities = Activity::orderBy('activity_date', 'desc')->get();
        
        // Format activities for view
        $aktivitiList = $activities->map(function ($activity) {
            // Handle image_path - could be JSON, comma-separated, or single path
            $imageUrls = [];
            if (!empty($activity->image_path)) {
                // Helper function to convert path to URL
                $pathToUrl = function ($path) {
                    $path = trim($path);

                        return Storage::url($path);
                };
                
                // Try to decode as JSON first
                $decoded = json_decode($activity->image_path, true);
                if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                    // It's JSON array
                    $imageUrls = array_map($pathToUrl, $decoded);
                } else {
                    // Try comma-separated
                    $paths = explode(',', $activity->image_path);
                    $imageUrls = array_map($pathToUrl, $paths);
                }
            }
            
            // Extract tags from description or set empty array
            // You can modify this logic based on how tags are stored
            $tags = [];
            
            return [
                'title' => $activity->title,
                'description' => $activity->description,
                'date' => $activity->activity_date->format('d M Y'),
                'image_urls' => $imageUrls,
                'tags' => $tags,
            ];
        })->toArray();

        // Fetch announcements with pagination via AktivitiController helper
        $pengumumanList = $aktivitiController->guestAnnouncements()
            ->through(function ($announcement) {
                return [
                    'title' => $announcement->title,
                    'content' => $announcement->content,
                    'start_date' => $announcement->start_date->format('Y-m-d'),
                ];
            });
        
        return view('guest.aktiviti', compact('aktivitiList', 'pengumumanList'));
    }

    public function budimanBizHub()
    {
        // Fetch approved vendors from database
        $vendors = Vendor::approved()->orderBy('name', 'asc')->get();
        
        $totalVendors = count($vendors);
        // dd($vendors, Vendor::all());
        return view('guest.bizhub', [
            'vendors' => $vendors,
            'totalVendors' => $totalVendors,
        ]);
    }

    public function hubungiKami()
    {
        return view('guest.hubungi-kami');
    }

    public function sejarah()
    {
        return view('guest.sejarah');
    }
}
