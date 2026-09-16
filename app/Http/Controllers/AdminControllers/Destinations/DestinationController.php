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

class DestinationController extends Controller
{
    protected $seoService;
    public function __construct(SeoService $seoService)
    {
        $this->seoService = $seoService;
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
        ]);
        $medium_width = env('MEDIUM_WIDTH');
        $medium_height = env('MEDIUM_HEIGHT');
        $data = $request->all();

        // dd($data);
        $file = $request->file('thumbnail');
        $file2 = $request->file('banner');
        $banner = [];
        $thumbnail = '';
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $thumbnail = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
            $destinationOriginal = public_path('uploads/original');
            Image::make($file->getRealPath())->encode('webp', 85)->save($destinationOriginal . '/' . $thumbnail);
        }

        if ($request->hasfile('banner')) {
            $product = $request->file('banner')->getClientOriginalName();
            $extension = $request->file('banner')->getClientOriginalExtension();
            $product = explode('.', $product);
            $banner = Str::slug($product[0]) . '-' . Str::random(40) . '.' . $extension;
            $destinationOriginal = public_path('uploads/original');

            $banner_picture = Image::make($file2->getRealPath());
            $width = Image::make($file2->getRealPath())->width();
            $height = Image::make($file2->getRealPath())->height();

            $banner_picture->save($destinationOriginal . '/' . $banner);
        }
        if ($request->hasfile('banner')) {
            foreach ($request->file('banner') as $image) {
                $name = time() . rand(1, 50) . '.' . $image->extension();
                $image->move(public_path('uploads/original/'), $name);
                $banner[] = $name;
            }
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

        // SEO
        $this->seoService->save($result, $request);

        $activities = $request->activity_id;
        $data = [];
        foreach ($activities as $item) {
            $data[] = [
                'destination_id' => $result->id,
                'activity_id' => $item,
            ];
        }
        // dd($data);
        $destinationActivity = DestinationActivityrelModel::insert($data);
        if ($result) {
            return redirect()->back()->with('success', 'Successfully added.');
        }
        return redirect()->back()->with('message', 'Try again!');
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
        $data = DestinationModel::with('seo')->find($id);
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
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'uri' => 'required|unique:cl_trip_destinations,uri,' . $id,
        ]);
        $data = DestinationModel::find($id);
        $file = $request->file('thumbnail');
        $file2 = $request->file('banner');

        if ($request->hasFile('thumbnail')) {
            if ($data->thumbnail && file_exists(public_path('uploads/original/' . $data->thumbnail))) {
                unlink(public_path('uploads/original/' . $data->thumbnail));
            }

            $image = $request->file('thumbnail');
            $name = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . Str::random(5) . '.webp';
            $destinationPath = public_path('uploads/original');

            Image::make($image->getRealPath())->encode('webp', 85)->save($destinationPath . '/' . $name);

            $data['thumbnail'] = $name;
        }

        if ($request->hasFile('banner')) {
            // Remove old file if exists
            if ($data->banner) {
                if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->banner)) {
                    unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->banner);
                }
            }
            // if($request->hasfile('banner')){
            //   foreach($request->file('banner') as $image)
            //   {
            //     $name = time().rand(1,50).'.'.$image->extension();
            //     $image->move(public_path('uploads/original/'),$name);
            //     $banner[] = $name;
            //   }
            // }
            $image = $request->file('banner');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/original/');
            $image->move($destinationPath, $name);
            $data['banner'] = $name;
        }

        $data->title = $request->title;
        $data->uri = Str::slug($request->uri);
        $data->content = $request->content;
        $data->brief = $request->brief;
        $data->ordering = $request->ordering;
        $data->video = $request->video;
        $data->status = $request->status;
        
        if ($data->save()) {
            // SEO
            $this->seoService->save($data, $request);

            $data->activities()->detach();
            $data->activities()->attach($request->activity_id);

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
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail);
            }
        }
        if ($data->banner) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->banner);
            }
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
            if (file_exists(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/original/' . $data->thumbnail);
            }
        }
        $data->thumbnail = NULL;
        $data->save();
        return response('Delete Successful.');
    }
}
