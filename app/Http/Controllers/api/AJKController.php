<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\ApiHelper;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

// Models
use App\Models\CommitteeMember;

class AJKController extends Controller
{

    public function __construct()
    {
        $this->apiHelper = new ApiHelper();
    }

    public function get_jawatan_kuasa(Request $request)
    {
        $data = CommitteeMember::all();
        return $this->apiHelper->resp([
            'jawatan_kuasa' => $data
        ]);
    }
    

    public function add_jawatan_kuasa(Request $request)
    {
        if (!$request->isJson()) {
            return $this->apiHelper->resp(['error' => 'Invalid JSON'], 400);
        }

        $receivedData = json_decode($request->getContent(), true);

        $requiredFields = ['name', 'position', 'phone_number', 'image_base64'];
        $checker = $this->apiHelper->fieldChecker($receivedData, $requiredFields);

        if ($checker) {
            return $this->apiHelper->resp($checker, 400);
        }

        $imageBase64 = $receivedData['image_base64'];
        $imageName = uniqid() . '.png';

        $imageData = base64_decode($imageBase64);

        Storage::disk('public')->put('ajk/' . $imageName, $imageData);

        $member = CommitteeMember::create([
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'phone_number' => $request->input('phone_number'),
            'photo_path' => 'ajk/' . $imageName,
        ]);

        return $this->apiHelper->resp([
            'message' => 'Committee member added successfully',
            'member' => $member
        ]);
    }

    public function get_specific_jawatan_kuasa($id)
    {
        $member = CommitteeMember::find($id);
        if (!$member) {
            return $this->apiHelper->resp(['error' => 'Committee member not found'], 404);
        }

        return $this->apiHelper->resp([
            'member' => $member
        ]);
    }

    public function delete_jawatan_kuasa($id)
    {
        $member = CommitteeMember::find($id);
        if (!$member) {
            return $this->apiHelper->resp(['error' => 'Committee member not found'], 404);
        }

        // Delete the associated image
        Storage::disk('public')->delete($member->photo_path);

        $member->delete();

        return $this->apiHelper->resp(['message' => 'Committee member deleted successfully']);
    }

    public function update_jawatan_kuasa(Request $request, $id)
    {
        if (!$request->isJson()) {
            return $this->apiHelper->resp(['error' => 'Invalid JSON'], 400);
        }

        $member = CommitteeMember::find($id);
        if (!$member) {
            return $this->apiHelper->resp(['error' => 'Committee member not found'], 404);
        }

        $receivedData = json_decode($request->getContent(), true);

        // Update fields if provided
        if (isset($receivedData['name'])) {
            $member->name = $receivedData['name'];
        }
        if (isset($receivedData['position'])) {
            $member->position = $receivedData['position'];
        }
        if (isset($receivedData['phone_number'])) {
            $member->phone_number = $receivedData['phone_number'];
        }
        if (isset($receivedData['image_base64'])) {
            // Delete old image
            Storage::disk('public')->delete($member->photo_path);

            // Save new image
            $imageBase64 = $receivedData['image_base64'];
            $imageName = uniqid() . '.png';
            $imageData = base64_decode($imageBase64);
            Storage::disk('public')->put('ajk/' . $imageName, $imageData);

            $member->photo_path = 'ajk/' . $imageName;
        }

        $member->save();

        return $this->apiHelper->resp([
            'message' => 'Committee member updated successfully',
            'member' => $member
        ]);
    }
}
