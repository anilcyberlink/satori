<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Travels\PastTripModel;
use App\Models\Travels\PastTripImageModel;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PastTripImageController extends Controller
{
    public function addImages($id)
    {
        $pastTrip = PastTripModel::findOrFail($id);
        $data = PastTripImageModel::where('past_trip_id',$id)->get();

        // dd($pastTrip ,'tst', $data);
        return view('admin.past-images.create',compact('pastTrip','data'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'past_trip_id'=>'required|exists:cl_past_trips,id',
            'name'=>'required|string|max:255',
            'category'=>'required|in:team,tripimage,document',
            'position'=>'nullable|string|max:255',
            'country'=>'nullable|string|max:255',
            'image'=>'required|file|mimes:jpg,jpeg,png,webp,pdf|max:10240',
        ]);
        $pastTrip = PastTripModel::findOrFail($request->past_trip_id);

        $data = new PastTripImageModel();
        $data->past_trip_id = $pastTrip->id;
        $data->name = $request->name;
        $data->category = $request->category;
        $data->position = $request->position;
        $data->country = $request->country;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $originalName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = strtolower($file->getClientOriginalExtension());
            $destinationPath = public_path('uploads/pastimages');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath,0755,true);
            }
            if (in_array($extension,['jpg','jpeg','png','webp'])) {
                $image_name = Str::slug($originalName).'-'.Str::random(5).'.webp';
                Image::make($file->getRealPath())->encode('webp',90)->save($destinationPath.'/'.$image_name);
                $data->image = $image_name;
            } else {
                $image_name = Str::slug($originalName).'-'.Str::random(5).'.'.$extension;
                $file->move($destinationPath,$image_name);
                $data->image = $image_name;
            }
        }
        $data->save();

        return redirect()->route('pasttrip.image.create',$pastTrip->id)->with('success','Image added successfully.');
    }

    public function edit($id)
    {
        $data = PastTripImageModel::findOrFail($id);
        $pastTrip = PastTripModel::findOrFail($data->past_trip_id);

        return view('admin.past-images.edit',compact('pastTrip','data'));
    }

    public function update(Request $request,$id)
    {
        $data = PastTripImageModel::findOrFail($id);
        $request->validate([
            'past_trip_id'=>'required|exists:cl_past_trips,id',
            'name'=>'required|string|max:255',
            'category'=>'required|in:team,tripimage,document',
            'position'=>'nullable|string|max:255',
            'country'=>'nullable|string|max:255',
            'image'=>'nullable|file|mimes:jpg,jpeg,png,webp,pdf|max:10240',
        ]);
        $pastTrip = PastTripModel::findOrFail($request->past_trip_id);
        $data->past_trip_id = $pastTrip->id;
        $data->name = $request->name;
        $data->category = $request->category;
        $data->position = $request->position;
        $data->country = $request->country;
        if ($request->hasFile('image')) {
            if ($data->image) {
                $oldImagePath = public_path('uploads/pastimages/'.$data->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $file = $request->file('image');
            $originalName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $extension = strtolower($file->getClientOriginalExtension());
            $destinationPath = public_path('uploads/pastimages');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath,0755,true);
            }
            if (in_array($extension,['jpg','jpeg','png','webp'])) {
                $image_name = Str::slug($originalName).'-'.Str::random(5).'.webp';
                Image::make($file->getRealPath())->encode('webp',90)->save($destinationPath.'/'.$image_name);
            } else {
                $image_name = Str::slug($originalName).'-'.Str::random(5).'.'.$extension;
                $file->move($destinationPath,$image_name);
            }
            $data->image = $image_name;
        }
        $data->save();

        return redirect()->route('pasttrip.image.create',$pastTrip->id)->with('success','Image updated successfully.');
    }

    public function destroy($id)
    {
        $data = PastTripImageModel::findOrFail($id);
        $pastTripId = $data->past_trip_id;
        if ($data->image) {
            $imagePath = public_path('uploads/pastimages/'.$data->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $data->delete();
        
        return redirect()->route('pasttrip.image.create',$pastTripId)->with('success','Image data deleted successfully.');
    }


}
