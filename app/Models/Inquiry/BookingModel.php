<?php

namespace App\Models\Inquiry;

use App\Models\Travels\TripModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;

    protected $table = 'cl_trip_booking';

    protected $fillable = [
        'trip_id',
        'trip_title',
        'full_name',
        'email',
        'phone',
        'country',
        'type',
        'total_travellers',
        'arrival_date',
        'departure_date',
        'remark',
        'status',
        'terms_accepted',
    ];

    public function bookTrips()
    {
        return $this->belongsTo(TripModel::class, 'trip_id');
    }

}
