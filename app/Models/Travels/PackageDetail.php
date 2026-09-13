<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;
use App\Models\Travels\TripModel;

class PackageDetail extends Model
{
    protected $table = 'cl_package_details';

    protected $fillable = [
        'trip_detail_id',
        'service',
        'type',
        'title',
        'details',
        'sort_order',
    ];

    protected $casts = [
        'details' => 'array',
    ];

    public function trip()
    {
        return $this->belongsTo(TripModel::class, 'trip_detail_id');
    }
}
