<?php

namespace App\Models\Travels;

use Illuminate\Database\Eloquent\Model;
use App\Models\Travels\TripModel;

class PackageService extends Model
{
    protected $table = 'cl_package_services';
    protected $fillable = [
        'trip_detail_id',
        'service',
        'price_1',
        'price_2',
        'description',
    ];

    protected $casts = [
        'price_1' => 'decimal:2',
        'price_2' => 'decimal:2',
    ];

    public function trip()
    {
        return $this->belongsTo(TripModel::class, 'trip_detail_id');
    }
}
