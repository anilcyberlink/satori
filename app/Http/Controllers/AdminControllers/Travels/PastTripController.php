<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Models\Travels\TripModel;
use App\Models\Travels\PastTripModel;

class PastTripController extends Controller
{
    public function index($id)
    {
        $trip = TripModel::where('id', $id)->first();
        $data= PastTripModel::where('trip_id', $trip->id)->orderBy('ordering', 'desc')->get();

        // dd($trip);
        return view('admin.past-trips.index', compact('trip','data'));
    }

    public function create($id)
    {
        $trip = TripModel::where('id', $id)->first();
        $order = PastTripModel::where('trip_id', $id)->max('ordering');
        $past_order = $order + 1 ;

        // dd($trip);
        return view('admin.past-trips.create', compact('trip','past_order'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'trip_id' => 'required|exists:cl_trip_details,id',
            'title' => 'required|string|max:255',
            'uri' => 'required|string|max:255|unique:cl_past_trips,uri',
            'sub_title' => 'nullable|string|max:255',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $pastTrip = new PastTripModel();

        $pastTrip->trip_id = $request->trip_id;
        $pastTrip->title = $request->title;
        $pastTrip->uri = $request->uri;
        $pastTrip->sub_title = $request->sub_title;
        $pastTrip->ordering = $request->ordering;
        $pastTrip->status = 1;

        if ($request->hasFile('banner')) {

            $file = $request->file('banner');
            $originalName = pathinfo($file->getClientOriginalName(),PATHINFO_FILENAME);
            $banner_name = Str::slug($originalName). '-' . Str::random(5). '.webp';
            $destinationPath = public_path('uploads/banners');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            Image::make($file->getRealPath())->encode('webp', 90)->save($destinationPath . '/' . $banner_name);

            $pastTrip->banner = $banner_name;
        }
        $pastTrip->save();

        return redirect()->route('pasttrip.index', $request->trip_id)->with('success', 'Past trip created successfully.');
    }
    public function status($id)
    {
        $data = PastTripModel::findOrFail($id);
        $data->status = $data->status == 1 ? 0 : 1;
        $data->save();
        return response()->json([
            'success' => true,
            'message' => 'Status changed successfully.'
        ]);
    }

    public function edit($id)
    {
        $data = PastTripModel::findOrFail($id);
        $trip = TripModel::findOrFail($data->trip_id);

        return view('admin.past-trips.edit',compact('trip', 'data'));
    }

    public function update(Request $request, $id)
    {
        $data = PastTripModel::findOrFail($id);

        $request->validate([
            'trip_id' => 'required|exists:cl_trip_details,id',
            'title' => 'required|string|max:255',
            'uri' => 'required|string|max:255|unique:cl_past_trips,uri,'.$data->id,
            'sub_title' => 'nullable|string|max:255',
            'ordering' => 'required|integer|min:1',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data->trip_id = $request->trip_id;
        $data->title = $request->title;
        $data->uri = $request->uri;
        $data->sub_title = $request->sub_title;
        $data->ordering = $request->ordering;

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $originalName = pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            );
            $banner_name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
            $destinationPath = public_path('uploads/banners');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            Image::make($file->getRealPath())
                ->encode('webp', 90)
                ->save($destinationPath . '/' . $banner_name);

            $data->banner = $banner_name;
        }

        $data->save();

        return redirect()
            ->route('pasttrip.index', $data->trip_id)
            ->with('success', 'Past trip updated successfully.');
    }

    public function destroy($id)
    {
        $data = PastTripModel::findOrFail($id);
        $tripId = $data->trip_id;

        if ($data->banner) {
            $bannerPath = public_path('uploads/banners/' . $data->banner);
            if (file_exists($bannerPath)) {
                unlink($bannerPath);
            }
        }

        $data->delete();

        return redirect()->route('pasttrip.index', $tripId)->with('success', 'Past trip deleted successfully.');
    }

}
