<?php

namespace App\Http\Controllers\AdminControllers\Teams;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Team\TeamCategory;
use App\Models\Team\TeamModel;
use App\Models\Team\Certificates;
use Intervention\Image\Facades\Image;
use App\Services\SeoService;

class TeamController extends Controller
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
        $categories = TeamCategory::where('status','1')->orderBy('ordering')->get();
        $teams = TeamModel::orderBy('ordering')->orderBy('id', 'desc')->get()->groupBy('category');

        return view('admin.team.index', compact('categories', 'teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = TeamCategory::get();
        $order = TeamModel::max('ordering');
        $ordering = $order + 1;

        return view('admin.team.create', compact('category', 'ordering'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'uri' => 'required',
            'position' => 'nullable|string|max:255',
            'category' => 'required|exists:cl_team_categories,id',
            'phone' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'twitter_url' => 'nullable|url|max:500',
            'instagram_url' => 'nullable|url|max:500',
            'content' => 'nullable|string',
            'ordering' => 'nullable|integer|min:1',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:10000',
        ]);
        $data = $request->all();

        $baseUri = $request->uri;
        $uri = $baseUri;
        $counter = 1;
        while (TeamModel::where('uri', $uri)->exists()) {
            $uri = $baseUri . $counter;
            $counter++;
        }
        $data['uri'] = $uri;

        $thumbnail_name = '';
        if ($request->hasFile('thumbnail')) {
            $thumb_file = $request->file('thumbnail');
            $originalName = pathinfo($thumb_file->getClientOriginalName(), PATHINFO_FILENAME);
            $thumbnail_name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
            $destinationPath = public_path('uploads/team');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            $thumbnail_picture = Image::make($thumb_file->getRealPath());
            $thumbnail_picture->encode('webp', 85);
            $thumbnail_picture->save($destinationPath . '/' . $thumbnail_name);
        }

        $data['thumbnail'] = $thumbnail_name;
        $data['ordering'] = $request->ordering ?: 1;
        $data['status'] = 1;
        $data['show_in_home'] = $request->has('show_in_home') ? 1 : 0;

        $result = TeamModel::create($data);

        // SEO
        $this->seoService->save($result,$request);

        if ($result) {
            return response()->json([
                'success' => true,
                'message' => 'Team member added successfully.'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Unable to add team member.'
        ], 500);
    }

    public function store_old(Request $request)
    {
        if ($request->ajax()) {
            // dd($request->all());
            $request->validate([
                'name' => 'required',
            ]);

            $banner_width = env('BANNER_WIDTH');
            $banner_height = env('BANNER_HEIGHT');

            $data = $request->all();

            /*************Banner Upload************/
            $file =  $request->file('banner');
            $banner_name = '';
            if ($request->hasfile('banner')) {
                $banner = $request->file('banner')->getClientOriginalName();
                $extension = $request->file('banner')->getClientOriginalExtension();
                $banner = explode('.', $banner);
                $banner_name = Str::slug($banner[0]) . '-' . Str::random(5) . '.' . $extension;

                $destinationPath = public_path('uploads/team');

                $banner_picture = Image::make($file->getRealPath());
                $banner_picture->resize($banner_width, $banner_height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $banner_name);
            }

            /******Upload Thumbnail******/
            $thumb_file =  $request->file('thumbnail');
            $thumbnail_name = '';
            if ($request->hasfile('thumbnail')) {
                $thumbnail = $request->file('thumbnail')->getClientOriginalName();
                $extension = $request->file('thumbnail')->getClientOriginalExtension();
                $thumbnail = explode('.', $thumbnail);
                $thumbnail_name = Str::slug($thumbnail[0]) . '-' . Str::random(5) . '.' . $extension;

                $destinationPath = public_path('uploads/team');

                $thumbnail_picture = Image::make($thumb_file->getRealPath());
                $width = Image::make($thumb_file->getRealPath())->width();
                $height = Image::make($thumb_file->getRealPath())->height();
                $thumbnail_picture->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $thumbnail_name);
            }
            /*****************************/

            $data['team_key'] = time() . rand(500000, 999999999);
            $data['uri'] = Str::slug($request->uri);
            $data['banner'] = $banner_name;
            $data['thumbnail'] = $thumbnail_name;


            $is_draft  = '0';
            if ($request->submit == 'publish') {
                $is_draft = '0';
            } else if ($request->submit == 'draft') {
                $is_draft = '1';
            }
            $isChecked = $request->has('published');
            $data['published'] = ($isChecked) ? '1' : '0';
            $data['is_draft'] = $is_draft;
            $result = TeamModel::create($data);

            // SEO
            $this->seoService->save($result, $request);

            $last_id = $result->id;

            // Insert into Certificates
            if (isset($request->certificates_ordering)) {
                $gear_keys = array_keys($request->certificates_ordering);
                $sn_gear = 1;
                $sn_gear_count = count($request->certificates_ordering);
                foreach ($gear_keys as $key => $value) {
                    if ($key + 1 >= $sn_gear_count) {
                        continue;
                    }
                    $MemberCertificate = new Certificates();
                    $MemberCertificate->team_id = $last_id;
                    $thumb_file = $request->file('image');
                    if (isset($thumb_file[$value])) {
                        $thumb = time() . '-' . Str::random(15) . $thumb_file[$value]->getClientOriginalName();
                        $destinationPath = public_path('uploads/team');
                        $thumb_file[$value]->move($destinationPath, $thumb);
                        $MemberCertificate->image = $thumb;
                    }
                    $MemberCertificate->ordering = $request->certificates_ordering[$key];
                    $MemberCertificate->title = $request->certificates_title[$key];
                    $MemberCertificate->save();
                    $sn_gear++;
                }
            }


            return response()->json(['status' => 'success', 'message' => 'Member Added Successfully']);
        }
        return false;
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
        $data = TeamModel::with('seo')->find($id);
        $certificates = $data->certificates()->get();
        $category = TeamCategory::where('team_parent', '0')->get();
        return view('admin.team.edit', compact('data', 'certificates', 'category'));
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
        if ($request->ajax()) {

            $is_draft = 0;
            if ($request->submit == 'publish') {
                $is_draft = 0;
            } else if ($request->submit == 'draft') {
                $is_draft = 1;
            }

            $banner_width = env('BANNER_WIDTH');
            $banner_height = env('BANNER_HEIGHT');

            $data = TeamModel::find($id);

            $file =  $request->file('banner');
            $thumbnail_file =  $request->file('thumbnail');
            $banner_name = '';
            $thumbnail_name = '';

            if ($request->hasfile('banner')) {
                $data = TeamModel::find($id);
                if ($data->banner) {
                    if (file_exists(env('PUBLIC_PATH') . 'uploads/team/' . $data->banner)) {
                        unlink(env('PUBLIC_PATH') . 'uploads/team/' . $data->banner);
                    }
                }
                $banner = $request->file('banner')->getClientOriginalName();
                $extension = $request->file('banner')->getClientOriginalExtension();
                $banner = explode('.', $banner);
                $banner_name = Str::slug($banner[0]) . '-' . Str::random(40) . '.' . $extension;
                $destinationPath = public_path('uploads/team');
                $banner_picture = Image::make($file->getRealPath());
                $width = Image::make($file->getRealPath())->width();
                $height = Image::make($file->getRealPath())->height();

                $banner_picture->resize($banner_width, $banner_height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $banner_name);
                $data->banner = $banner_name;
            }

            /*****Thumbnail*****/
            if ($request->hasfile('thumbnail')) {
                $data = TeamModel::find($id);
                if ($data->thumbnail) {
                    if (file_exists(env('PUBLIC_PATH') . 'uploads/team/' . $data->thumbnail)) {
                        unlink(env('PUBLIC_PATH') . 'uploads/team/' . $data->thumbnail);
                    }
                }
                $thumbnail = $request->file('thumbnail')->getClientOriginalName();
                $extension = $request->file('thumbnail')->getClientOriginalExtension();
                $thumbnail = explode('.', $thumbnail);
                $thumbnail_name = Str::slug($thumbnail[0]) . '-' . Str::random(40) . '.' . $extension;
                $destinationPath = public_path('uploads/team');
                $thumbnail_picture = Image::make($thumbnail_file->getRealPath());
                $width = Image::make($thumbnail_file->getRealPath())->width();
                $height = Image::make($thumbnail_file->getRealPath())->height();

                $thumbnail_picture->resize($width, $height, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath . '/' . $thumbnail_name);
                $data->thumbnail = $thumbnail_name;
            }

            $data['team_key'] = time() . rand(500000, 999999999);
            $data->name = $request->name;
            $data->position = $request->position;
            $data->category = $request->category;
            $data->subcategory = $request->subcategory;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->brief = $request->brief;
            $data->content = $request->content;
            $data->ordering = $request->ordering;
            $data->fb_url = $request->fb_url;
            $data->instagram_url = $request->instagram_url;
            $data->twitter_url = $request->twitter_url;
            $data->linkedin_url = $request->linkedin_url;
            $data->uri = Str::slug($request->uri);
            $isChecked = $request->has('published');
            $data->published = ($isChecked) ? '1' : '0';
            $isChecked = $request->has('status');
            $data->status = ($isChecked) ? '1' : '0';
            $data->is_draft = $is_draft;
            $_data = TeamModel::find($id);

            // Update Certificates

            if (isset($request->certificates_id)) {
                $certificates_keys = array_keys($request->certificates_id);
                $sn_certificates = 1;
                $sn_certificate_count = count($request->certificates_id);

                foreach ($certificates_keys as $key => $value) {
                    if ($key + 1 >= $sn_certificate_count) {
                        continue;
                    }

                    if ($request->certificates_id[$value] == "") {
                        $certificateData = new Certificates();
                        $certificateData->team_id = $data->id;
                        $thumb_file = $request->file('image');
                        if (isset($thumb_file[$value])) {
                            $thumb = $thumb_file[$value]->getClientOriginalName();
                            $destinationPath = public_path('uploads/team');
                            $thumb_file[$value]->move($destinationPath, $thumb);
                            $certificateData->image = $thumb;
                        }
                        $certificateData->ordering = $request->certificates_ordering[$key];
                        $certificateData->title = $request->certificates_title[$key];

                        $certificateData->save();
                    } else if ($request->certificates_id[$value] !== null && $request->certificates_id[$value] !== "") {
                        $certificates_id = $request->certificates_id[$value];
                        $certificateData = Certificates::find($certificates_id);

                        $thumb_file = $request->file('image');
                        if (isset($thumb_file[$key])) {

                            if ($certificateData->image) {
                                if (file_exists(env('PUBLIC_PATH') . 'uploads/team/' . $certificateData->image)) {
                                    unlink(env('PUBLIC_PATH') . 'uploads/team/' . $certificateData->image);
                                }
                            }

                            $thumb = $thumb_file[$key]->getClientOriginalName();
                            $destinationPath = public_path('uploads/team');
                            $thumb_file[$key]->move($destinationPath, $thumb);
                            $certificateData->image = $thumb;
                        }
                        $certificateData->team_id = $data->id;
                        $certificateData->ordering = $request->certificates_ordering[$key];
                        $certificateData->title = $request->certificates_title[$key];
                        $certificateData->save();
                    }

                    $sn_certificates++;
                }
            }

            $data->save();
            // SEO
            $this->seoService->save($data, $request);

            return response()->json(['status' => 'success', 'message' => 'Member Updated Successful!']);
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = TeamModel::find($id);
        if ($data->banner  != NULL) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/team/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/team/' . $data->banner);
            }
        }
        if ($data->thumbnail  != NULL) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/team/' . $data->thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/team/' . $data->thumbnail);
            }
        }

        $data->certificates()->delete();
        $data->delete();
        return 'Are you sure to delete?';
    }



    public function certificatesdestroy($team_id, $id)
    {
        $data = Certificates::find($id);
        if ($data->image  != NULL) {
            unlink('uploads/team/' . $data->image);
        }
        $data->delete();
        return 'Are you sure to delete?';
    }

    public function thumbdelete($id)
    {
        $data = TeamModel::find($id);
        if ($data->thumbnail) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/team/' . $data->thumbnail)) {
                unlink(env('PUBLIC_PATH') . 'uploads/team/' . $data->thumbnail);
            }
        }
        $data->thumbnail = NULL;
        $data->save();
        return response('Delete Successful.');
    }

    public function bannerdelete($id)
    {
        $data = TeamModel::find($id);
        if ($data->banner) {
            if (file_exists(env('PUBLIC_PATH') . 'uploads/team/' . $data->banner)) {
                unlink(env('PUBLIC_PATH') . 'uploads/team/' . $data->banner);
            }
        }
        $data->banner = NULL;
        $data->save();
        return response('Delete Successful.');
    }
}
