<?php

namespace App\Http\Controllers\AdminControllers\Teams;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Team\TeamCategory;
use Intervention\Image\Facades\Image;

class TeamCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = TeamCategory::orderBy('id', 'desc')->get();

        return view('admin.team-category.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordering = TeamCategory::max('ordering');
        $ordering = $ordering + 1;
        $category = TeamCategory::where('team_parent', 0)->get();

        return view('admin.team-category.create', compact('ordering', 'category'));
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
            'category' => 'required',
            'uri' => 'required|unique:cl_team_categories,uri',
            'picture' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:10000',
        ]);
        $data = $request->all();
        $file_name = null;
        if ($request->hasFile('picture')) {
            $file = $request->file('picture');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $file_name = Str::slug('icon-' . $originalName) . '-' . Str::random(5) . '.webp';
            $destination = public_path('uploads/team');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $image = Image::make($file->getRealPath());
            $image->encode('webp', 85);
            $image->save($destination . '/' . $file_name);
        }
        $data['picture'] = $file_name;
        $result = TeamCategory::create($data);

        if ($result) {
            return redirect()->route('teamcategory.index')->with('success', 'Team Category added successfully.');
        }
        return redirect()->back()->withInput()->with('error', 'Something went wrong. Try Again.');
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
        $data = TeamCategory::find($id);
        $category = TeamCategory::where('team_parent', 0)->get();

        //    dd($category);
        return view('admin.team-category.edit', compact('data', 'category'));
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
            'category' => 'required',
            'uri' => 'required|unique:cl_team_categories,uri,' . $id,
            'picture' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:10000',
        ]);
        $data = TeamCategory::findOrFail($id);

        if ($request->hasFile('picture')) {
            if ($data->picture) {
                $oldFile = public_path('uploads/team/' . $data->picture);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }
            $file = $request->file('picture');
            $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $file_name = Str::slug($originalName) . '-' . Str::random(5) . '.webp';
            $destination = public_path('uploads/team');
            if (!file_exists($destination)) {
                mkdir($destination, 0755, true);
            }
            $image = Image::make($file->getRealPath());
            $image->encode('webp', 85);
            $image->save($destination . '/' . $file_name);
            $data->picture = $file_name;
        }
        $data->team_parent = $request->team_parent;
        $data->category = $request->category;
        $data->uri = $request->uri;
        $data->ordering = $request->ordering;
        $data->caption = $request->caption;
        $data->content = $request->content;
        $data->save();

        return redirect()->back()->with('success', 'Team Category Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = TeamCategory::find($id);
        if ($data->picture  != NULL) {
            unlink('uploads/team/' . $data->picture);
        }
        $data->delete();
        return 'Are you sure to delete?';
    }

    public function delete_teamcategory_thumb($id)
    {
        $data = TeamCategory::findOrFail($id);
        if ($data->picture) {
            $file = public_path('uploads/team/' . $data->picture);
            if (file_exists($file)) {
                unlink($file);
            }
        }
        $data->picture = null;
        $data->save();

        return response('Image removed successfully.');
    }
}
