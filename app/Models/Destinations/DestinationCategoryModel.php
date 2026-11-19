<?php

namespace App\Models\Destinations;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasSeo;
use App\Models\Banners\MultiBannerModel;
use App\Models\Destinations\DestinationModel;

class DestinationCategoryModel extends Model
{
    use HasSeo;

    protected $table = 'cl_trip_destination_categories';

    protected $fillable = ['destination_id', 'title', 'uri', 'sub_title', 'brief', 'description', 'ordering', 'status', 'thumbnail', 'banner'];

    public function destination()
    {
        return $this->belongsTo(DestinationModel::class, 'destination_id', 'id');
    }

    public function multiBanners()
    {
        return $this->morphMany(MultiBannerModel::class, 'bannerable');
    }
}
