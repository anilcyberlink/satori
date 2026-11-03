<?php

use Carbon\Carbon;
use App\Models\Team\TeamModel;
use App\Models\Posts\PostModel;
use App\Models\Travels\TripModel;
use Illuminate\Support\Facades\DB;
use App\Models\Posts\PostTypeModel;
use App\Models\Travels\RegionModel;
use App\Models\Travels\SeasonModel;
use App\Models\Settings\CountryModel;
use App\Models\Settings\SettingModel;
use App\Models\Travels\ActivityModel;
use App\Models\Travels\TripTypeModel;
use App\Models\Travels\TripGradeModel;
use App\Models\Posts\PostCategoryModel;
use App\Models\Posts\AssociatedPostModel;
use App\Models\Travels\ActivityGroupModel;
use App\Models\Destinations\DestinationModel;
use App\Models\Destinations\DestinationActivityrelModel;
use App\Models\Expeditions\ExpeditionModel;
use App\Models\Posts\PostImageModel;


// Check whether this post type has post or not.
function is_empty_posttype($id)
{
    return PostModel::where('post_type', $id)->exists();
}

function is_empty_category($id)
{
    return PostModel::where('post_category', $id)->exists();
}

function show_category($category_id)
{
    $post = PostCategoryModel::where('id', $category_id)->first();
    return $post['category'];
}

function loop_category($id)
{
    $category = PostCategoryModel::where('pid', $id)->first();
    return $category;
}

function check_posttype_uri($uri)
{
    $data = PostTypeModel::where(['uri' => $uri])->first();
    if ($data) {
        return true;
    }
    return false;
}

function has_posts($post_type)
{
    $data = PostModel::where(['post_type' => $post_type, 'post_parent' => '0', 'status' => 1])->orderBy('post_order', 'asc')->get();
    if ($data->count() > 0) {
        return $data;
    }
    return false;
}
function has_associatedpost($id)
{
    $data = AssociatedPostModel::where('post_id', $id)->count();
    return $data;
}
function has_single_post($post_type)
{
    $data = PostModel::where(['post_type' => $post_type, 'post_parent' => '0', 'status' => 1])->orderBy('post_order', 'asc')->first();
    if ($data) {
        return $data;
    }
    return false;
}

function check_uri($uri)
{
    $data = PostModel::where(['uri' => $uri])->first();
    if ($data) {
        return true;
    }
    return false;
}

function posttype_geturl($uri)
{
    $data = PostTypeModel::where('uri', $uri)->first();
    if ($data) {
        return $data['uri'] . '.html';
    }
    return false;
}

// Check and List Child Post


function check_child_post($id)
{
    return PostModel::where('post_parent', $id)->count();
}


// Get parent post
function post_parent_fun($uri)
{
    $post = PostModel::where(['uri' => $uri])->first();
    if ($post) {
        $parent = PostModel::where(['post_parent' => $post->post_parent, 'status' => 1])->first();
        return $parent;
    }
    return false;
}

// Get parent post
function post_parent_byId($id)
{
    $parent = PostModel::where(['id' => intval($id)])->first();
    if ($parent) {
        return $parent;
    }
    return false;
}

// for sidebar inner left
function child_list($uri)
{
    $post_parent = PostModel::where(['uri' => $uri, 'status' => 1])->first();
    if ($post_parent->post_parent) {
        $_list = PostModel::where(['post_parent' => $post_parent->post_parent, 'status' => 1])->get();
        return $_list;
    }
    return false;
}

function settings()
{
    $data = SettingModel::where(['id' => '1'])->first();
    if ($data) {
        return $data;
    }
    return false;
}


/**********Trip List by regions************/
function tripbyregions($region_id)
{
    $data = RegionModel::find($region_id)->trips()->orderBy('ordering', 'asc')->get();
    return $data;
}

// Expedition
function trip_byDestinations($id)
{
    $data = DestinationModel::find($id)->trips()->where('status', '1')->orderBy('ordering', 'asc')->get();
    if ($data) {
        return $data;
    }
    return false;
}

function populartrip_byDestinations($id)
{
    $data = DestinationModel::find($id)->trips()->where(['status' => '1', 'video_status' => '1'])->orderBy('ordering', 'asc')->get();
    if ($data) {
        return $data;
    }
    return false;
}

function is_empty_destination($id)
{
    $data = DestinationModel::find($id)->trips()->count();
    if ($data > 0) {
        return true;
    }
    return false;
}

function activity_byregions($region_id)
{
    $data = RegionModel::find($region_id)->activities()->get();
    return $data;
}

function tripurl($uri)
{
    $trip = TripModel::where('uri', $uri)->first();

    return $trip ? $trip->uri . '.html' : false;
}
function trip_destination_title($tripId)
{
    if (!$tripId) {
        return null;
    }

    return TripModel::where('id', $tripId)
        ->with('destinations')
        ->first()?->destinations()
        ->value('title');
}

function trip_byactivities($activity_id)
{
    $data = ActivityModel::find($activity_id);
    $trips = $data->trips()->get();
    return $trips;
}


function tripcount($activity_id)
{
    $data = ActivityModel::find($activity_id)->trips()->count();
    return $data;
}



function dateformat($date)
{
    $data = Carbon::parse($date)->format('F j, Y');
    return $data;
}



function grade_message_trek($id)
{
    $data = TripGradeModel::where('id', $id)->first();
    if ($data) {
        return $data->trip_grade;
    }
    return false;
}

function tripdetail($id)
{
    return TripModel::find($id) ?: false;
}
function tripname($id)
{
    return TripModel::whereKey($id)->value('trip_title') ?: false;
}

function getactivityname($id)
{
    $data = TripModel::find($id)->activities()->first();
    if ($data) {
        return $data;
    }
    return false;
}

function selected($activity_id, $destination_id)
{
    $data = DestinationActivityrelModel::where(['activity_id' => $activity_id, 'destination_id' => $destination_id])->first();
    if ($data) {
        return $data;
    }
    return false;
}

function has_postimage($id)
{
    $data = PostImageModel::where('post_id', $id)->count();
    return $data;
}

function posttypeById($id)
{
    $data = PostTypeModel::where('id', $id)->first();
    return $data;
}

function posttype_bypostid($id)
{
    $data = PostModel::where('id', $id)->first();
    $value = $data->post_type;
    $posttype = PostTypeModel::where('id', $value)->first();
    return $posttype->uri;
}


function get_postimage($id)
{
    $data = PostImageModel::where('post_id', $id)->get();
    return $data;
}
function get_associatedpost($id)
{
    $data = AssociatedPostModel::where('post_id', $id)->get();
    return $data;
}
function get_triplist($id)
{
    $data=ActivityModel::find($id)->trips()->where('status','1')->orderBy('ordering','asc')->get();
    return $data;
}

// Sangam helper function
function calculate_days($start, $end){
    $days = Carbon::parse($start)->diffInDays(Carbon::parse($end), false);
    return $days;
}

function generate_unique_uri($model, $data)
{
    $originalData = $data;
    $counter = 1;

    while ($model::where('uri', $data)->exists()) {
        $data = $originalData . '-' . $counter;
        $counter++;
    }

    return $data;
}


//By Sangam Starts

function get_experience_type($trip)
{
    $data = $trip->activities->first();
    $experience = null;
    if($data){
        $experience = $data->title;
    }
    return $experience;
}

function post_parent_by_postId($id)
{
    $child = PostModel::where(['id' => $id])->first();
    if ($child && $child->post_parent) {
        $parent = PostModel::where(['id' => $child->post_parent])->first();
        return $parent;
    }
    return false;
}
function is_empty_teamcategory($id){
    $data = TeamModel::where(['team_category'=>$id])->count();
    if( $data > 0){
      return true;
    }
    return false;
  }

//By Sangam Ends
