<?php

namespace App\Http\Controllers\AdminControllers\Travels;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Travels\ActivityModel;
use Intervention\Image\Facades\Image;
use App\Services\SeoService;
use App\Services\ModelImageService;

class ActivityController extends Controller
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
        $expedition = ActivityModel::where('activity_parent', 'expedition')->orderBy('id', 'desc')->get();
        $activity = ActivityModel::where('activity_parent', 'activity')->orderBy('id', 'desc')->get();
        $trekking = ActivityModel::where('activity_parent', 'trekking')->orderBy('id', 'desc')->get();
        $packages = ActivityModel::where('activity_parent', 'package')->orderBy('id', 'desc')->get();
        // dd($packages);
        return view('admin.activities.index', compact('expedition', 'trekking', 'activity', 'packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // List Activity Template
        $fileList = scandir(resource_path('views/themes/default/'));
        $filterArray = $this->filter_activity_template($fileList);
        $filename = array();
        foreach ($filterArray as $filterArr) {
            $filename[] = $this->remove_extention($filterArr);
        }
        $file1 = array('triplist' => 'Choose Template');
        foreach ($filename as $file) {
            $file1[$file] = $file;
        }
        $templates = $file1;
        /*********/

        $ordering = 0;
        $ord = ActivityModel::max('ordering');
        $ordering += $ord + 1;
        return view('admin.activities.create', compact('ordering', 'templates'));
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
            'uri' => 'required|unique:cl_trip_activities,uri',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'multi_banners' => 'nullable|array',
            'multi_banners.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $destinationOriginal = public_path('uploads/original');
        $iconPath = public_path('uploads/thumbnails');

        if (!file_exists($destinationOriginal)) {
            mkdir($destinationOriginal, 0755, true);
        }

        if (!file_exists($iconPath)) {
            mkdir($iconPath, 0755, true);
        }

        // Single Banner
        $bannerName = null;
        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $bannerName = Str::slug($originalName) . '-' . Str::random(5) . '.webp';

            Image::make($image->getRealPath())->encode('webp', 85)->save($destinationOriginal . '/' . $bannerName);
        }

        // Thumbnail / Icon
        $iconName = null;
        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $iconName = Str::slug($originalName) . '-' . Str::random(5) . '.webp';

            Image::make($image->getRealPath())->encode('webp', 85)->save($iconPath . '/' . $iconName);
        }

        $isChecked = $request->has('status');

        $result = new ActivityModel();
        $result->activity_parent = $request->activity_parent;
        $result->title = $request->title;
        $result->sub_title = $request->sub_title;
        $result->template = $request->template;
        $result->uri = generate_unique_uri(ActivityModel::class, Str::slug($request->uri));
        $result->thumbnail = $iconName;
        $result->banner = $bannerName;
        $result->excerpt = $request->excerpt;
        $result->content = $request->content;
        $result->external_link = $request->external_link;
        $result->category_video = $request->category_video;
        $result->meta_keyword = $request->meta_keyword;
        $result->meta_description = $request->meta_description;
        $result->ordering = $request->ordering;
        $result->status =  1;
        $result->isdefault = $request->isdefault;
        $result->save();

        // Multiple Banners
        $this->modelImageService->save($result, $request->file('multi_banners', []));

        // SEO
        $this->seoService->save($result, $request);

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
        $relatedActivities = ActivityModel::get();
        // List Activity Template
        $fileList = scandir(resource_path('views/themes/default/'));
        $filterArray = $this->filter_activity_template($fileList);

        $filename = array();
        foreach ($filterArray as $filterArr) {
            $filename[] = $this->remove_extention($filterArr);
        }
        $file1 = array('triplist' => 'Choose Template');
        foreach ($filename as $file) {
            $file1[$file] = $file;
        }
        $templates = $file1;

        $data = ActivityModel::with('seo','multiBanners')->find($id);

        return view('admin.activities.edit', compact('data', 'templates', 'relatedActivities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'uri' => 'required|unique:cl_trip_activities,uri,' . $id,
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            'multi_banners' => 'nullable|array',
            'multi_banners.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = ActivityModel::findOrFail($id);
        $bannerPath = public_path('uploads/original');
        $thumbnailPath = public_path('uploads/thumbanils');

        if (!file_exists($bannerPath)) {
            mkdir($bannerPath, 0755, true);
        }

        if (!file_exists($thumbnailPath)) {
            mkdir($thumbnailPath, 0755, true);
        }

        // Update Single Banner
        if ($request->hasFile('banner')) {
            if ($data->banner && file_exists($bannerPath . '/' . $data->banner)) {
                unlink($bannerPath . '/' . $data->banner);
            }

            $image = $request->file('banner');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';

            Image::make($image->getRealPath())->encode('webp', 85)->save($bannerPath . '/' . $name);

            $data->banner = $name;
        }

        // Update Thumbnail
        if ($request->hasFile('thumbnail')) {
            if ($data->thumbnail && file_exists($thumbnailPath . '/' . $data->thumbnail)) {
                unlink($thumbnailPath . '/' . $data->thumbnail);
            }

            $image = $request->file('thumbnail');
            $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';

            Image::make($image->getRealPath())->encode('webp', 85)->save($thumbnailPath . '/' . $name);

            $data->thumbnail = $name;
        }

        // Update Activity Details
        $data->title = $request->title;
        $data->sub_title = $request->sub_title;
        $data->banner_alt = $request->banner_alt;
        $data->thumbnail_alt = $request->thumbnail_alt;
        $data->template = $request->template;
        $data->activity_parent = $request->activity_parent;
        $data->excerpt = $request->excerpt;
        $data->content = $request->content;
        $data->external_link = $request->external_link;
        $data->uri = Str::slug($request->uri);
        $data->ordering = $request->ordering;
        $data->meta_keyword = $request->meta_keyword;
        $data->meta_description = $request->meta_description;
        $data->category_video = $request->category_video;
        $data->status = $request->has('status') ? 1 : 0;

        if ($data->save()) {
            // Save New Multiple Banners
            $this->modelImageService->save($data, $request->file('multi_banners', []));

            // SEO
            $this->seoService->save($data, $request);

            return redirect()->back()->with('success', 'Update Successfully.');
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
        $data = ActivityModel::find($id);
        if ($data->banner != NULL) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner);
            }
        }
        if ($data->thumbnail != NULL) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/thumbnails/' . $data->thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/thumbnails/' . $data->thumbnail);
            }
        }
        // Delete all associated multiple banners
        foreach ($data->multiBanners as $multiBanner) {
            $this->modelImageService->delete($multiBanner);
        }

        $data->delete();
        return 'Deletion Success';
    }

    // Filter Template Child
    private function filter_activity_template($template)
    {
        $tmpl2 = array();
        if (!empty($template)) {
            foreach ($template as $tmpl) {
                if (strpos($tmpl, "activity-") !== false) {
                    $tmpl2[] = $tmpl;
                }
            }
        }
        return $tmpl2;
    }

    // Remove Extention
    private function remove_extention($filename)
    {
        $exp = explode('.', $filename);
        $file = $exp[0];
        return $file;
    }


    // Delete  Thumbnail
    function delete_activity_thumb(ActivityModel $activityModel, $id)
    {
        $data = ActivityModel::find($id);
        if ($data->banner) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/banners/' . $data->banner);
            }
        }
        $data->banner = NULL;
        $data->save();
        return response('Delete Successful.');
    }

    function delete_activity_icon(ActivityModel $activityModel, $id)
    {
        $icon_data = ActivityModel::find($id);
        if ($icon_data->thumbnail) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/thumbnails/' . $icon_data->thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/thumbnails/' . $icon_data->thumbnail);
            }
        }
        $icon_data->thumbnail = NULL;
        $icon_data->save();
        return response('Delete Successful.');
    }
    public function isdefault(Request $request)
    {
        $data = ActivityModel::find($request->id);
        $default = ActivityModel::where('id', '!=', $data->id)->get();
        if ($data->isdefault == '1') {
            $data->isdefault = '0';
            $data->save();
            return back();
        } else if ($data->isdefault == '0') {
            foreach ($default as $row) {
                if ($row->isdefault == '1') {
                    $default = ActivityModel::where('id', $row->id)->update(['isdefault' => '0']);
                }
            }
            $data->isdefault = '1';
            $data->save();
            return back();
        }
        return back();
    }
}
