<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TripReview extends Model
{
    protected $table = 'trip_reviews';
    protected $fillable = ['trip_id', 'trip_title', 'full_name', 'title', 'country', 'email', 'rating', 'image', 'message', 'status', 'contact','consent','usefulness'];

    public function trips()
    {
        return $this->belongsTo('App\Models\Travels\TripModel', 'trip_id');
    }
    public function images()
    {
        return $this->hasMany(TripReviewImage::class,'review_id');
    }
}
