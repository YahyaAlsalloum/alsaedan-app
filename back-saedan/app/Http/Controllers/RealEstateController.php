<?php

namespace App\Http\Controllers;

use App\Models\RealEstate;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Storage;

class RealEstateController extends Controller
{

    public function index()
    {
        return RealEstate::select(
        'id',
        'name',
        'description',
        'location',
        'type',
        'image',
        )->get();

    }



    public function store(Request $request)
    {
        $data = $request ->validate([
            'name' =>'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif',
            'description'=>'required|string',
            'location'=>'required|string',
            'type'=>'required|string'
        ]);
    // Handle image upload
    $image = $request->file('image');
    $imageName = time() . '.' . $image->getClientOriginalName();
    $imagePath = 'public/images/realEstate/';
    Storage::putFileAs($imagePath, $image, $imageName);

    RealEstate::create([
            'name' => $data['name'],
            'image' => $imageName, // Save the image filename in the database
            'description' => $data['description'],
            'location' => $data['location'],
            'type' => $data['type'],
        ]);
        return response()->json(["Message"=>"RealEstate created successfully"]);
    }


    public function show($id)
    {
        $realEstate = realEstate::find($id);
        return response()->json(["realEstate"=>$realEstate]);
    }



    public function update(Request $request, $id)
    {
        $realEstate = realEstate::find($id);
        // Retrieve the old image filename from the database
        $oldImageFilename = realEstate::findOrFail($id)->image; // Replace YourModel with your actual model name

        //echo json_encode($request) ;
        $request ->validate([
            'name' =>'required|string',
            'description'=>'required|string',
            'location'=>'required|string',
            'type'=>'required|string'
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
            // Attempt to update 'name','locaton','type' and 'description' fields directly from the request
            $realEstate->update($input);

            // Check if the update was successful
            if ($realEstate->wasChanged()) {
                return response()->json(["message" => "plog updated successfully"], 200);
            } else {
                return response()->json(["message" => "No changes made to the plog"], 200);
            }
        } catch (\Exception $e) {
            return response()->json(["message" => "An error occurred during the update: " . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $realEstate = realEstate::find($id);
        $imagePath = 'public/images/realEstate/' . $realEstate->image;
        if (Storage::exists($imagePath)) {
            Storage::delete($imagePath);
        }
        $deleted = $realEstate->delete();

        if ($deleted) {
            return response()->json(["message" => "RealEstate deleted successfully"]);
        } else {
            return response()->json(["message" => "Failed to delete RealEstate"], 500); // Return an error response
        }
    }
}
