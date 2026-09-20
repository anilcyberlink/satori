<?php

namespace App\Http\Controllers\AdminControllers\Review;

use App\Http\Controllers\Controller;
use App\Model\TripReview;
use App\Model\TripReviewImage;
use App\Models\Travels\TripModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TripReviewController extends Controller
{
    public function trip_review(Request $request)
    {
        $review = TripReview::orderby('id', 'desc')->get();
        $trip = TripModel::all();

        return view('admin.trip-reviews.index', compact('review', 'trip'));
    }

    public function post_trip_review(Request $request)
    {
        if ($request->isMethod('get')) {
            $trip = TripModel::all();
            return view('admin.trip-reviews.create', compact('trip'));
        }
        if ($request->isMethod('post')) {
            $request->validate([
                'trip_id'       => 'required|integer|exists:cl_trip_details,id',
                'full_name'     => 'required|string|max:255',
                'country'       => 'required|string|max:100',
                'email'         => 'nullable|email|max:255',
                'contact'       => 'nullable|string|max:50',
                'title'         => 'required|string|max:255',
                'rating'        => 'required|integer|min:1|max:5',
                'message'       => 'required|string',
                'photo'         => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
                'trip_photos'   => 'nullable|array|max:5',
                'trip_photos.*' => 'image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            ]);

            $trip = TripModel::find($request->trip_id);

            $review = new TripReview();
            $review->trip_id   = $request->trip_id;
            $review->full_name = $request->full_name;
            $review->country   = $request->country;
            $review->email     = $request->email;
            $review->contact   = $request->contact;
            $review->title     = $request->title;
            $review->rating    = $request->rating;
            $review->message   = $request->message;
            $review->status    = 0;
            $review->consent   = 1;
            $review->usefulness   = 1;
            $review->trip_title = $trip ? $trip->trip_title : null;


            $destinationPath = public_path('uploads/reviews');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Profile image (same table)
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $filename = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                Image::make($file)->encode('webp', 80)->save($destinationPath . '/' . $filename);
                $review->image = $filename;
            }

            $review->save();

            // Trip photos
            if ($request->hasFile('trip_photos')) {
                foreach ($request->file('trip_photos') as $photo) {
                    $originalName = pathinfo(
                        $photo->getClientOriginalName(),
                        PATHINFO_FILENAME
                    );
                    $filename = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                    Image::make($photo)->encode('webp', 80)->save($destinationPath . '/' . $filename);

                    $review->images()->create([
                        'image' => $filename
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Review Created Successfully');
        }
    }
    public function view_trip_review($id)
    {
        $data = TripReview::with('images')->findOrFail($id);

        return view('admin.trip-reviews.show', compact('data'));
    }
    public function review_status(Request $request)
    {
        $review = TripReview::findOrFail($request->status);
        $review->status = $request->status_value;
        $review->save();
        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully.',
        ]);
    }

    public function delete_trip_review_image($id)
    {
        $img = TripReviewImage::findOrFail($id);
        $path = public_path('uploads/reviews/' . $img->image);
        if (file_exists($path)) {
            unlink($path);
        }
        $img->delete();

        return response()->json(['success' => true]);
    }

    public function edit_trip_review(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $trip = TripModel::all();
            $data = TripReview::with('images')->findOrFail($id);

            return view('admin.trip-reviews.edit', compact('trip', 'data'));
        }

        if ($request->isMethod('post')) {
            $review = TripReview::with('images')->findOrFail($id);

            $request->validate([
                'trip_id'       => 'required|integer|exists:cl_trip_details,id',
                'full_name'     => 'required|string|max:255',
                'country'       => 'required|string|max:100',
                'email'         => 'nullable|email|max:255',
                'contact'       => 'nullable|string|max:50',
                'title'         => 'required|string|max:255',
                'rating'        => 'required|integer|min:1|max:5',
                'message'       => 'required|string',
                'photo'         => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
                'trip_photos'   => 'nullable|array',
                'trip_photos.*' => 'image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            ]);

            // Max 5 trip photos in total (saved ones + new ones)
            $newCount = count($request->file('trip_photos', []));

            if ($review->images->count() + $newCount > 5) {
                return back()
                    ->withErrors(['trip_photos' => 'Maximum 5 images allowed in total.'])
                    ->withInput();
            }

            $trip = TripModel::find($request->trip_id);

            $review->trip_id    = $request->trip_id;
            $review->full_name  = $request->full_name;
            $review->country    = $request->country;
            $review->email      = $request->email;
            $review->contact    = $request->contact;
            $review->title      = $request->title;
            $review->rating     = $request->rating;
            $review->usefulness = $request->usefulness;
            $review->message    = $request->message;
            $review->trip_title = $trip ? $trip->trip_title : null;

            $destinationPath = public_path('uploads/reviews');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            // Profile image (same table) - replace only if a new one is uploaded
            if ($request->hasFile('photo')) {
                if ($review->image && file_exists($destinationPath . '/' . $review->image)) {
                    unlink($destinationPath . '/' . $review->image);
                }

                $file = $request->file('photo');
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $filename = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                Image::make($file)->encode('webp', 80)->save($destinationPath . '/' . $filename);
                $review->image = $filename;
            }

            $review->save();

            // Add newly uploaded trip photos
            if ($request->hasFile('trip_photos')) {
                foreach ($request->file('trip_photos') as $photo) {
                    $originalName = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
                    $filename = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                    Image::make($photo)->encode('webp', 80)->save($destinationPath . '/' . $filename);

                    $review->images()->create([
                        'image' => $filename
                    ]);
                }
            }

            return redirect()->back()->with('success', 'Review Updated Successfully');
        }
    }

    public function delete_trip_review(Request $request)
    {
        $id = $request->id;
        $review = TripReview::with('images')->findOrFail($id);

        $destinationPath = public_path('uploads/reviews');

        // Delete profile image file
        if ($review->image && file_exists($destinationPath . '/' . $review->image)) {
            unlink($destinationPath . '/' . $review->image);
        }

        // Delete trip photo files and their rows
        foreach ($review->images as $img) {
            if (file_exists($destinationPath . '/' . $img->image)) {
                unlink($destinationPath . '/' . $img->image);
            }
            $img->delete();
        }

        $review->delete();

        return redirect()->back()->with('success', 'Review deleted successfully');
    }
}
