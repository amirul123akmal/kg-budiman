<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PengumumanController extends Controller
{
    public function index()
    {
		$announcements = Announcement::orderBy('start_date', 'desc')->paginate(15);
		return view('admin.pengumuman.index', compact('announcements'));
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function edit($id)
    {
		$announcement = Announcement::findOrFail($id);
		return view('admin.pengumuman.edit', compact('announcement'));
    }

    public function store(Request $request)
    {
		$data = $request->validate([
			'title' => 'required|string|max:255',
			'content' => 'required|string',
			'start_date' => 'required|date',
			'end_date' => 'nullable|date|after_or_equal:start_date',
			'created_by' => 'required|integer|exists:users,userID',
		]);

		Announcement::create($data);

		return redirect()->route('admin.pengunguman.index')->with('success', 'Pengumuman ditambah.');
    }

    public function update(Request $request, $id)
    {
		$announcement = Announcement::findOrFail($id);

		$data = $request->validate([
			'title' => 'required|string|max:255',
			'content' => 'required|string',
			'start_date' => 'required|date',
			'end_date' => 'nullable|date|after_or_equal:start_date',
			'created_by' => 'required|integer|exists:users,userID',
		]);

		$announcement->update($data);

		return redirect()->route('admin.pengunguman.index')->with('success', 'Pengumuman dikemas kini.');
    }

    public function destroy($id)
    {
		$announcement = Announcement::findOrFail($id);
		$announcement->delete();
		return redirect()->route('admin.pengunguman.index')->with('success', 'Pengumuman dipadam.');
    }

    /**
     * Retrieve active announcements to be shown in the public carousel.
     */
    public function getCarouselAnnouncements(): Collection
    {
        $now = now()->startOfDay();
        $windowStart = $now->copy()->subDays(3);

        return Announcement::whereDate('start_date', '>=', $now)
            ->orderBy('start_date')
            ->get()
            ->map(function (Announcement $announcement, int $index) {
                $imageUrl = $announcement->image_path
                    ? Storage::url($announcement->image_path)
                    : asset('images/buletin-placeholder.jpg');

                return [
                    'id' => $announcement->announcementID,
                    'title' => $announcement->title,
                    'summary' => Str::limit(strip_tags($announcement->content), 140),
                    'image_url' => $imageUrl,
                    'start_date' => optional($announcement->start_date)->format('d M Y'),
                    'anchor' => 'news-' . ($index + 1),
                ];
            });
    }
}
