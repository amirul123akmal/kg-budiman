<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
			'tajuk' => 'required|string|max:255',
			'keterangan' => 'required|string',
			'tarikh_mula' => 'required|date',
			'tarikh_akhir' => 'nullable|date|after_or_equal:tarikh_mula',
			'status' => 'required|string|max:50',
			'gambar' => 'nullable|image|max:4096',
		]);

		$imagePath = null;
		if ($request->hasFile('gambar')) {
			$imagePath = $request->file('gambar')->store('pengumuman', 'public');
		}

		Announcement::create([
			'title' => $data['tajuk'],
			'content' => $data['keterangan'],
			'start_date' => $data['tarikh_mula'],
			'end_date' => $data['tarikh_akhir'],
			'image_path' => $imagePath,
			'created_by' => Auth::id() ?? 1,
		]);

		return redirect()->route('admin.pengunguman.index')->with('success', 'Pengumuman ditambah.');
    }

    public function update(Request $request, $id)
    {
		$announcement = Announcement::findOrFail($id);

		$data = $request->validate([
			'tajuk' => 'required|string|max:255',
			'keterangan' => 'required|string',
			'tarikh_mula' => 'required|date',
			'tarikh_akhir' => 'nullable|date|after_or_equal:tarikh_mula',
			'status' => 'required|string|max:50',
			'gambar' => 'nullable|image|max:4096',
		]);

		if ($request->hasFile('gambar')) {
			if ($announcement->image_path) {
				Storage::disk('public')->delete($announcement->image_path);
			}

			$announcement->image_path = $request->file('gambar')->store('pengumuman', 'public');
		}

		$announcement->title = $data['tajuk'];
		$announcement->content = $data['keterangan'];
		$announcement->start_date = $data['tarikh_mula'];
		$announcement->end_date = $data['tarikh_akhir'];
		$announcement->save();

		return redirect()->route('admin.pengunguman.index')->with('success', 'Pengumuman dikemas kini.');
    }

    public function destroy($id)
    {
		$announcement = Announcement::findOrFail($id);

		if ($announcement->image_path) {
			Storage::disk('public')->delete($announcement->image_path);
		}

		$announcement->delete();
		return redirect()->route('admin.pengunguman.index')->with('success', 'Pengumuman dipadam.');
    }

}
