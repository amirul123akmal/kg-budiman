<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// Models
use App\Models\Activity;
use App\ApiHelper as API;

class AktivitiController extends Controller
{

    public function get_aktiviti(Request $request)
    {
        $data = Activity::all();
        return API::resp([
            'aktiviti' => $data
        ]);
    }

    public function add_aktiviti(Request $request)
    {

        $receivedData = json_decode($request->getContent(), true);

        $requiredFields = ['title', 'description', 'date', 'images'];
        $fieldCheck = API::fieldChecker($receivedData, $requiredFields);

        if ($fieldCheck) {
            return API::resp([
                'error' => $fieldCheck['error'],
                'missing_fields' => $fieldCheck['missing_fields']
            ], 400);
        }
        
        $imagesPath = [];
        $images = $receivedData['images'];
        foreach ($images as $base64Image) {
            $imageData = base64_decode($base64Image);
            $imageName = uniqid().'.png';
            Storage::disk('public')->put('aktiviti/'.$imageName, $imageData);
            // You might want to store the image paths in the database as well
            $imagesPath[] = 'aktiviti/'.$imageName;
        }

        // dd(json_encode($imagesPath));

        $activity = new Activity();
        $activity->title = $receivedData['title'];
        $activity->description = $receivedData['description'];
        $activity->activity_date = $receivedData['date'];
        $activity->image_path = implode(',', $imagesPath);
        $activity->save();

        return API::resp([
            'message' => 'Activity added successfully',
            'activity' => $activity
        ]);
    }

    public function delete_aktiviti($id)
    {
        $activity = Activity::find($id);
        if (!$activity) {
            return API::resp([
                'error' => 'Activity not found'
            ], 404);
        }

        // Optionally, delete associated images from storage
        if ($activity->image_path) {
            $imagePaths = explode(',', $activity->image_path);
            foreach ($imagePaths as $path) {
                Storage::disk('public')->delete($path);
            }
        }

        $activity->delete();

        return API::resp([
            'message' => 'Activity deleted successfully'
        ]);
    }

    public function update_aktiviti(Request $request, $id)
    {
        $activity = Activity::find($id);
        if (!$activity) {
            return API::resp([
                'error' => 'Activity not found'
            ], 404);
        }

        $receivedData = json_decode($request->getContent(), true);

        // Update fields if provided
        if (isset($receivedData['title'])) {
            $activity->title = $receivedData['title'];
        }
        if (isset($receivedData['description'])) {
            $activity->description = $receivedData['description'];
        }
        if (isset($receivedData['date'])) {
            $activity->activity_date = $receivedData['date'];
        }
        if (isset($receivedData['images'])) {
            // Optionally, delete old images from storage
            if ($activity->image_path) {
                $oldImagePaths = explode(',', $activity->image_path);
                foreach ($oldImagePaths as $path) {
                    Storage::disk('public')->delete($path);
                }
            }

            $imagesPath = [];
            $images = $receivedData['images'];
            foreach ($images as $base64Image) {
                $imageData = base64_decode($base64Image);
                $imageName = uniqid().'.png';
                Storage::disk('public')->put('aktiviti/'.$imageName, $imageData);
                $imagesPath[] = 'aktiviti/'.$imageName;
            }
            $activity->image_path = implode(',', $imagesPath);
        }

        $activity->save();

        return API::resp([
            'message' => 'Activity updated successfully',
            'activity' => $activity
        ]);
    }

    public function get_specific_aktiviti($id)
    {
        $activity = Activity::find($id);
        if (!$activity) {
            return API::resp(['error' => 'Activity not found'], 404);
        }

        return API::resp([
            'activity' => $activity
        ]);
    }
}
