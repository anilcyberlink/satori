<?php

namespace App\Http\Controllers\AdminControllers\Teams;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Team\TeamCategory;
use App\Models\Team\TeamModel;
use App\Models\Team\Certificates;
use App\Models\Team\ExtraInfo;
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
        $categories = TeamCategory::orderBy('ordering')->get();
        $teams = TeamModel::orderBy('ordering')->orderBy('id', 'desc')->get()->groupBy('team_category');

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
            'twitter_url' => 'nullable|max:500',
            'instagram_url' => 'nullable|max:500',
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
        $data['team_category'] = $request->category;
        $data['status'] = 1;
        $data['show_in_home'] = $request->has('show_in_home') ? 1 : 0;

        $result = TeamModel::create($data);
        $last_id = $result->id;

        // SEO
        $this->seoService->save($result, $request);

        // Insert into Certificates
        if ($request->has('certificates_ordering')) {
            $destinationPath = public_path('uploads/team');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            foreach ($request->certificates_ordering as $index => $ordering) {
                if (empty($ordering) && empty($request->certificates_title[$index] ?? null) && !$request->hasFile("image.$index")) {
                    continue;
                }
                $MemberCertificate = new Certificates();
                $MemberCertificate->team_id = $last_id;
                $MemberCertificate->ordering = $ordering ?: 1;
                $MemberCertificate->title = $request->certificates_title[$index] ?? null;
                $MemberCertificate->type = $request->type[$index] ?? 'Certificate';
                if ($request->hasFile("image.$index")) {
                    $thumb_file = $request->file("image.$index");
                    $originalName = pathinfo($thumb_file->getClientOriginalName(), PATHINFO_FILENAME);
                    $thumb = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                    $thumbnail_picture = Image::make($thumb_file->getRealPath());
                    $thumbnail_picture->encode('webp', 85);
                    $thumbnail_picture->save($destinationPath . '/' . $thumb);
                    $MemberCertificate->image = $thumb;
                }
                $MemberCertificate->save();
            }
        }

        // Insert into Extra Info
        if ($request->has('info_ordering')) {
            foreach ($request->info_ordering as $index => $ordering) {
                if (empty($ordering) && empty($request->info_title[$index] ?? null) && empty($request->info_description[$index] ?? null)) {
                    continue;
                }
                $extraInfo = new ExtraInfo();
                $extraInfo->team_id = $result->id;
                $extraInfo->ordering = $ordering ?: 1;
                $extraInfo->title = $request->info_title[$index] ?? null;
                $extraInfo->description = $request->info_description[$index] ?? null;
                $extraInfo->save();
            }
        }

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

    public function toggleStatus(Request $request, $id)
    {
        $team = TeamModel::find($id);
        $team->status = $request->status == 1 ? 1 : 0;
        $team->save();

        return response()->json([
            'success' => true,
            'status' => $team->status,
            'message' => 'Status updated successfully.'
        ]);
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
        if (!$data) {
            return redirect('admin/teams');
        }
        $certificates = $data->certificates()->get();
        $infos = $data->extrainfos()->get();
        $category = TeamCategory::get();

        return view('admin.team.edit', compact('data', 'certificates', 'category','infos'));
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
            'twitter_url' => 'nullable|max:500',
            'instagram_url' => 'nullable|max:500',
            'content' => 'nullable|string',
            'ordering' => 'nullable|integer|min:1',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:10000',
        ]);
        $result = TeamModel::find($id);

        $data = $request->all();
        $baseUri = $request->uri;
        $uri = $baseUri;
        $counter = 1;
        while (TeamModel::where('uri', $uri)->where('id', '!=', $id)->exists()) {
            $uri = $baseUri . $counter;
            $counter++;
        }
        $data['uri'] = $uri;
        $destinationPath = public_path('uploads/team');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }
        if ($request->hasFile('thumbnail')) {
            $thumb_file = $request->file('thumbnail');
            $originalName = pathinfo($thumb_file->getClientOriginalName(), PATHINFO_FILENAME);
            $thumbnail_name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
            $thumbnail_picture = Image::make($thumb_file->getRealPath());
            $thumbnail_picture->encode('webp', 85);
            $thumbnail_picture->save($destinationPath . '/' . $thumbnail_name);
            if ($result->thumbnail && file_exists($destinationPath . '/' . $result->thumbnail)) {
                unlink($destinationPath . '/' . $result->thumbnail);
            }
            $data['thumbnail'] = $thumbnail_name;
        } else {
            $data['thumbnail'] = $result->thumbnail;
        }
        $data['ordering'] = $request->ordering ?: 1;
        $data['team_category'] = $request->category;
        $data['show_in_home'] = $request->has('show_in_home') ? 1 : 0;
        $result->update($data);
        // SEO
        $this->seoService->save($result, $request);

        // Update Certificate
        if ($request->has('certificates_id')) {
            $destinationPath = public_path('uploads/team');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }
            foreach ($request->certificates_id as $index => $certificateId) {
                $ordering = $request->certificates_ordering[$index] ?? 1;
                $title = $request->certificates_title[$index] ?? null;
                $type = $request->type[$index] ?? 'certificate';
                if (empty($certificateId)) {
                    $certificateData = new Certificates();
                    $certificateData->team_id = $result->id;
                } else {
                    $certificateData = Certificates::where('id', $certificateId)
                        ->where('team_id', $result->id)
                        ->first();
                    if (!$certificateData) {
                        continue;
                    }
                }
                $certificateData->ordering = $ordering;
                $certificateData->title = $title;
                $certificateData->type = $type;
                if ($request->hasFile("image.$index")) {
                    $thumb_file = $request->file("image.$index");
                    if ($certificateData->image && file_exists($destinationPath . '/' . $certificateData->image)) {
                        unlink($destinationPath . '/' . $certificateData->image);
                    }
                    $originalName = pathinfo($thumb_file->getClientOriginalName(), PATHINFO_FILENAME);
                    $thumb = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
                    $thumbnail_picture = Image::make($thumb_file->getRealPath());
                    $thumbnail_picture->encode('webp', 85);
                    $thumbnail_picture->save($destinationPath . '/' . $thumb);
                    $certificateData->image = $thumb;
                }
                $certificateData->save();
            }
        }
        // Update Extra Info
        if ($request->has('info_id')) {
            foreach ($request->info_id as $index => $infoId) {
                $ordering = $request->info_ordering[$index] ?? 1;
                $title = $request->info_title[$index] ?? null;
                $description = $request->info_description[$index] ?? null;
                if (empty($infoId)) {
                    $infoData = new ExtraInfo();
                    $infoData->team_id = $result->id;
                } else {
                    $infoData = ExtraInfo::where('id', $infoId)
                        ->where('team_id', $result->id)
                        ->first();
                    if (!$infoData) {
                        continue;
                    }
                }
                $infoData->ordering = $ordering;
                $infoData->title = $title;
                $infoData->description = $description;
                $infoData->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Team member updated successfully.'
        ]);
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
    public function extrainfosdestroy($team_id, $id)
    {
        $data = ExtraInfo::where('id', $id)
            ->where('team_id', $team_id)
            ->first();
        if (!$data) {
            return response('Extra info not found.', 404);
        }
        $data->delete();
        return response('Delete Successful.');
    }

    public function thumbdelete($id)
    {
        $data = TeamModel::find($id);
        if (!$data) {
            return response('Team member not found.', 404);
        }
        if ($data->thumbnail) {
            $path = public_path('uploads/team/' . $data->thumbnail);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $data->thumbnail = null;
        $data->save();

        return response('Delete Successful.');
    }
}
