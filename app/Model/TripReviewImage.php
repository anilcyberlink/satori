<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TripReviewImage extends Model
{
    protected $table = 'trip_review_images';
    protected $fillable = [
        'review_id',
        'image',
    ];

    public function review()
    {
        return $this->belongsTo(TripReview::class, 'review_id');
    }
}
