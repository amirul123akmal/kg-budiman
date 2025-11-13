<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Announcement;
use App\Models\CommitteeMember;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Facility;

class GuestController extends Controller
{
    public function utama()
    {
        return view('guest.utama');
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
        $fasiliti = Facility::orderBy('created_at', 'desc')->get();
        return view('guest.fasiliti', compact('fasiliti'));
    }

    public function aktiviti()
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

        // Fetch announcements from database
        $announcements = Announcement::where('start_date', '<=', now())
            ->where(function ($query) {
                $query->whereNull('end_date')
                    ->orWhere('end_date', '>=', now());
            })
            ->orderBy('start_date', 'desc')
            ->get();
        
        // Format announcements for view
        $pengumumanList = $announcements->map(function ($announcement) {
            return [
                'title' => $announcement->title,
                'content' => $announcement->content,
                'start_date' => $announcement->start_date->format('Y-m-d'),
            ];
        })->toArray();
        
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
}
