<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Http\Requests\CloudinaryStoreRequest;

class CloudinaryController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $image_name = time(). '.' . $image->getClientOriginalExtension();

        try {
            $cloudinaryImage = Cloudinary::upload($image->getRealPath(), [
                'public_id' => $image_name,
                'folder' => 'foodblog'
            ]);

            $media = Media::create([
                'file_name' => $image_name,
                'medially_id' => 1,
                'medially_type' => $image->getClientMimeType(),
                'file_url' => $cloudinaryImage->getSecurePath($image_name),
                'file_type' => $image->getClientMimeType(),
                'size' => $image->getSize(),
            ]);
            // $media->attachMedia($image);

            return response()->json([
                'status' => 200,
                'message' => 'Image uploaded successfully',
                'data' => [$cloudinaryImage->getSecurePath($image_name), $image_name]
            ]);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());

            return response()->json([
                'status' => 500,
                'message' => 'Failed to upload image',
                'data' => [$e]
            ]);
        }
    }
}
