<?php

namespace App\Http\Controllers\AdminControllers\Destinations;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\SeoService;
use App\Services\ModelImageService;
use App\Models\Destinations\DestinationModel;
use App\Models\Destinations\DestinationCategoryModel;
use Intervention\Image\Facades\Image;

class DestinationCategoryController extends Controller
{
    protected $seoService;
    protected $modelImageService;

    public function __construct(SeoService $seoService, ModelImageService $modelImageService)
    {
        $this->seoService = $seoService;
        $this->modelImageService = $modelImageService;
    }

    public function index()
    {
        $data = DestinationCategoryModel::with('destination')->orderBy('ordering', 'asc')->get();

        return view('admin.destination-category.index', compact('data'));
    }

    public function create()
    {
        $destinations = DestinationModel::orderBy('title', 'asc')->get();
        $ordering = DestinationCategoryModel::max('ordering') + 1;

        return view('admin.destination-category.create', compact('destinations', 'ordering'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required|exists:cl_trip_destinations,id',
            'title' => 'required',
            'uri' => 'required|unique:cl_trip_destination_categories,uri',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'multi_banners' => 'nullable|array',
            'multi_banners.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $destinationOriginal = public_path('uploads/original');
        $thumbnailPath = public_path('uploads/thumbnails');

        if (!file_exists($destinationOriginal)) {
            mkdir($destinationOriginal, 0755, true);
        }

        if (!file_exists($thumbnailPath)) {
            mkdir($thumbnailPath, 0755, true);
        }

        // Thumbnail
        $thumbnail = null;

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $thumbnail = Str::slug($originalName) . '-' . Str::random(5) . '.webp';

            Image::make($file->getRealPath())->encode('webp', 85)->save($thumbnailPath . '/' . $thumbnail);
        }

        // Single Banner
        $banner = null;

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $banner = Str::slug($originalName) . '-' . Str::random(5) . '.webp';

            Image::make($file->getRealPath())->encode('webp', 85)->save($destinationOriginal . '/' . $banner);
        }

        // Save Destination Category
        $result = new DestinationCategoryModel();
        $result->destination_id = $request->destination_id;
        $result->title = $request->title;
        $result->uri = $request->uri;
        $result->sub_title = $request->sub_title;
        $result->brief = $request->brief;
        $result->description = $request->description;
        $result->thumbnail = $thumbnail;
        $result->banner = $banner;
        $result->ordering = $request->ordering;
        $result->status = $request->status;
        $result->save();

        // Multiple Banners
        $this->modelImageService->save($result, $request->file('multi_banners', []));

        // SEO
        $this->seoService->save($result, $request);

        return redirect()->back()->with('success', 'Successfully added.');
    }
    public function edit($id)
    {
        $data = DestinationCategoryModel::with(['seo', 'multiBanners'])->findOrFail($id);
        $destinations = DestinationModel::orderBy('title', 'asc')->get();

        return view('admin.destination-category.edit', compact('data', 'destinations'));
    }
    public function update(Request $request, $id)
    {
        $result = DestinationCategoryModel::findOrFail($id);

        // dd($request->all());
        $request->validate([
            'destination_id' => 'required|exists:cl_trip_destinations,id',
            'title' => 'required',
            'uri' => 'required|unique:cl_trip_destination_categories,uri,' . $result->id,
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'multi_banners' => 'nullable|array',
            'multi_banners.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $destinationOriginal = public_path('uploads/original');
        $thumbnailPath = public_path('uploads/thumbnails');

        if (!file_exists($destinationOriginal)) {
            mkdir($destinationOriginal, 0755, true);
        }

        if (!file_exists($thumbnailPath)) {
            mkdir($thumbnailPath, 0755, true);
        }

        // Thumbnail
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $thumbnail = Str::slug($originalName) . '-' . Str::random(5) . '.webp';

            Image::make($file->getRealPath())->encode('webp', 85)->save($thumbnailPath . '/' . $thumbnail);

            // Delete previous thumbnail
            if ($result->thumbnail && file_exists($thumbnailPath . '/' . $result->thumbnail)) {
                unlink($thumbnailPath . '/' . $result->thumbnail);
            }

            $result->thumbnail = $thumbnail;
        }

        // Single Banner
        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $banner = Str::slug($originalName) . '-' . Str::random(5) . '.webp';

            Image::make($file->getRealPath())->encode('webp', 85)->save($destinationOriginal . '/' . $banner);

            // Delete previous banner
            if ($result->banner && file_exists($destinationOriginal . '/' . $result->banner)) {
                unlink($destinationOriginal . '/' . $result->banner);
            }

            $result->banner = $banner;
        }

        // Update Destination Category
        $result->destination_id = $request->destination_id;
        $result->title = $request->title;
        $result->uri = $request->uri;
        $result->sub_title = $request->sub_title;
        $result->brief = $request->brief;
        $result->description = $request->description;
        $result->ordering = $request->ordering;
        $result->status = $request->has('status') ? 1 : 0;
        $result->save();

        // Save New Multiple Banners
        $this->modelImageService->save($result, $request->file('multi_banners', []));

        // SEO
        $this->seoService->save($result, $request);

        return redirect()->back()->with('success', 'Successfully updated.');
    }

    public function deleteThumb($id)
    {
        $data = DestinationCategoryModel::findOrFail($id);

        $thumbnailPath = public_path('uploads/thumbnails/' . $data->thumbnail);

        if ($data->thumbnail && file_exists($thumbnailPath)) {
            unlink($thumbnailPath);
        }

        $data->thumbnail = null;
        $data->save();

        return response()->json(['success' => true]);
    }
    public function deleteBanner($id)
    {
        $data = DestinationCategoryModel::findOrFail($id);

        $bannerPath = public_path('uploads/original/' . $data->banner);

        if ($data->banner && file_exists($bannerPath)) {
            unlink($bannerPath);
        }

        $data->banner = null;
        $data->save();

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $data = DestinationCategoryModel::findOrFail($id);

        // Delete thumbnail
        if ($data->thumbnail && file_exists(public_path('uploads/thumbnails/' . $data->thumbnail))) {
            unlink(public_path('uploads/thumbnails/' . $data->thumbnail));
        }

        // Delete banner
        if ($data->banner && file_exists(public_path('uploads/original/' . $data->banner))) {
            unlink(public_path('uploads/original/' . $data->banner));
        }

        $data->delete();

        return redirect()->back()->with('success', 'Successfully deleted.');
    }

}
