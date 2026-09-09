<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;

class MultiItineraryModel extends Model
{
    protected $table = 'cl_multi_itineraries';

    protected $fillable = [
        'trip_detail_id',

        // Season / itinerary-variant level
        'season',
        'itinerary_no',
        'itinerary_title',
        'itinerary_description',
        'itinerary_status',

        // Day level
        'day_ordering',
        'day_label',
        'day_title',
        'day_date',
        'max_altitude',
        'accommodation',
        'meals',
        'activities',
        'day_content',
    ];

    public function trip()
    {
        return $this->belongsTo(TripModel::class, 'trip_detail_id');
    }
}
