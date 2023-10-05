<?php

namespace App\Http\Controllers;

use App\Models\plog;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;

class PlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return plog::select('id', 'title', 'image', 'description')->get();
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required|string'
        ]);
        // Handle image upload
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalName();

        // Specify the subdirectory path where the image should be stored

        $imagePath = 'public/images/plogs';
        // Use Storage::putFileAs with the specified path
        Storage::putFileAs($imagePath, $image, $imageName);
        plog::create([
            'title' => $data['title'],
            'image' => $imageName, // Save the image filename in the database
            'description' => $data['description'],
        ]);
        return response()->json(["Message" => "plog created successfully"]);
    }

    /**
     * Display the specified resource.
     */
    public function show(plog $plog)
    {
        return response()->json(["plog" => $plog]);
    }


    public function update(Request $request, Plog $plog)
    {
        $id = $plog->id;
        // Retrieve the old image filename from the database
        $oldImageFilename = Plog::findOrFail($id)->image; // Replace YourModel with your actual model name

        //echo json_encode($request) ;
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        $input = $request->all();
        // Check if a new image file was provided
        if ($image = $request->file('image')) {

            // Handle image upload
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalName();
            $imagePath = 'public/images/plogs';
            Storage::putFileAs($imagePath, $image, $imageName);
            $input['image'] = $imageName;

            // Delete the old image if it exists and is different from the new one
            if ($oldImageFilename && $oldImageFilename !== $imagePath) {
                Storage::disk('public')->delete($oldImageFilename);
            }
        } else {
            unset($input['image']);
        }
        try {
            // Attempt to update 'title' and 'description' fields directly from the request
            $plog->update($input);

            // Check if the update was successful
            if ($plog->wasChanged()) {
                return response()->json(["message" => "plog updated successfully"], 200);
            } else {
                return response()->json(["message" => "No changes made to the plog"], 200);
            }
        } catch (\Exception $e) {
            return response()->json(["message" => "An error occurred during the update: " . $e->getMessage()], 500);
        }
    }






    public function destroy(plog $plog)
    {
        $imagePath = 'public/images/plogs/' . $plog->image;
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
        $plog->delete();

        return response()->json(["Message" => "plog deleted successfully"]);
    }
}
