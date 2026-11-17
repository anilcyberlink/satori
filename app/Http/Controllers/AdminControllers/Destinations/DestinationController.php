<?php

namespace App\Http\Controllers\AdminControllers\Destinations;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Travels\ActivityModel;
use Intervention\Image\Facades\Image;
use App\Models\Destinations\DestinationModel;
use App\Models\Destinations\DestinationActivityrelModel;
use App\Services\SeoService;
use App\Services\ModelImageService;

class DestinationController extends Controller
{
    protected $seoService;
    protected $modelImageService;
    public function __construct(SeoService $seoService, ModelImageService $modelImageService)
    {
        $this->seoService = $seoService;
        $this->modelImageService = $modelImageService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = DestinationModel::orderBy('ordering', 'asc')->get();
        return view('admin.destinations.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = DestinationModel::max('ordering');
        $ordering = $ordering + 1;
        $relatedActivities = ActivityModel::get();
        return view('admin.destinations.create', compact('ordering', 'relatedActivities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'uri' => 'required|unique:cl_trip_destinations',
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

        $result = new DestinationModel();
        $result->title = $request->title;
        $result->uri = $request->uri;
        $result->content = $request->content;
        $result->thumbnail = $thumbnail;
        $result->banner = $banner;
        $result->video = $request->video;
        $result->ordering = $request->ordering;
        $result->status = $request->status;
        $result->brief = $request->brief;
        $result->save();

        // Multiple Banners
        $this->modelImageService->save($result, $request->file('multi_banners', []));

        // SEO
        $this->seoService->save($result, $request);

        // Activities
        $activities = [];
        foreach ($request->activity_id ?? [] as $item) {
            $activities[] = [
                'destination_id' => $result->id,
                'activity_id' => $item,
            ];
        }
        if (!empty($activities)) {
            DestinationActivityrelModel::insert($activities);
        }

        return redirect()->back()->with('success', 'Successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DestinationModel::with(['seo', 'multiBanners'])->findOrFail($id);
        $relatedActivities = ActivityModel::get();
        $selected = DestinationActivityrelModel::where('destination_id', $id)->get();
        // dd($selected);
        return view('admin.destinations.edit', compact('data', 'relatedActivities', 'selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'uri' => 'required|unique:cl_trip_destinations,uri,' . $id,
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'multi_banners' => 'nullable|array',
            'multi_banners.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = DestinationModel::findOrFail($id);
        $destinationPath = public_path('uploads/original');
        $thumbnailPath = public_path('uploads/thumbnails');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        if (!file_exists($thumbnailPath)) {
            mkdir($thumbnailPath, 0755, true);
        }

        // Update Thumbnail
        if ($request->hasFile('thumbnail')) {
            if ($data->thumbnail && file_exists($thumbnailPath . '/' . $data->thumbnail)) {
                unlink($thumbnailPath . '/' . $data->thumbnail);
            }

            $image = $request->file('thumbnail');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';

            Image::make($image->getRealPath())
                ->encode('webp', 85)
                ->save($thumbnailPath . '/' . $name);

            $data->thumbnail = $name;
        }

        // Update Single Banner
        if ($request->hasFile('banner')) {
            if ($data->banner && file_exists($destinationPath . '/' . $data->banner)) {
                unlink($destinationPath . '/' . $data->banner);
            }

            $image = $request->file('banner');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';

            Image::make($image->getRealPath())
                ->encode('webp', 85)
                ->save($destinationPath . '/' . $name);

            $data->banner = $name;
        }

        // Update Destination Details
        $data->title = $request->title;
        $data->uri = Str::slug($request->uri);
        $data->content = $request->content;
        $data->brief = $request->brief;
        $data->ordering = $request->ordering;
        $data->video = $request->video;
        $data->status = $request->status;

        if ($data->save()) {

            // Save New Multiple Banners
            $this->modelImageService->save($data, $request->file('multi_banners', []));

            // SEO
            $this->seoService->save($data, $request);

            // Update Activities
            $data->activities()->sync($request->activity_id ?? []);

            return redirect()->back()->with('success', 'Update Successful.');
        }

        return redirect()->back()->with('message', 'Try again!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DestinationModel::find($id);
        if ($data->thumbnail) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/thumbnails/' . $data->thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/thumbnails/' . $data->thumbnail);
            }
        }
        if ($data->banner) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->banner);
            }
        }
        // Delete all associated multiple banners
        foreach ($data->multiBanners as $multiBanner) {
            $this->modelImageService->delete($multiBanner);
        }
        $data->delete();

        return "Delete Success";
    }

    public function filter($id)
    {
        $data = DestinationModel::find($id)->trips()->get();
        return view('admin.destinations.destination_trip', compact('data'));
    }

    public function delete_banner($id)
    {
        $data = DestinationModel::find($id);
        if ($data->banner) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->banner);
            }
        }
        $data->banner = NULL;
        $data->save();
        return response('Delete Successful.');
    }

    public function delete_thumb($id)
    {
        $data = DestinationModel::find($id);
        if ($data->thumbnail) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/thumbnails/' . $data->thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/thumbnails/' . $data->thumbnail);
            }
        }
        $data->thumbnail = NULL;
        $data->save();
        return response('Delete Successful.');
    }
}
