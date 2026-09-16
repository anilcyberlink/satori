<?php

namespace App\Models\Destinations;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasSeo;

class DestinationModel extends Model
{
    use HasSeo;
    protected $table = 'cl_trip_destinations';
    protected $fillable = ['title', 'uri', 'content', 'thumbnail', 'ordering', 'status', 'banner', 'video', 'brief'];

    public function trips()
    {
        return $this->belongsToMany('App\Models\Travels\TripModel', 'cl_trip_destination_rel', 'destination_id', 'trip_id');
    }
    public function activities()
    {
        return $this->belongsToMany('App\Models\Travels\ActivityModel', 'destination_activity_rel', 'destination_id', 'activity_id');
    }
}
