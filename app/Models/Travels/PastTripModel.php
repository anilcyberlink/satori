<?php
namespace App\Models\Travels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Travels\TripModel;
use App\Models\Travels\PastTripImageModel;

class PastTripModel extends Model
{
    use HasFactory;
    protected $table = 'cl_past_trips';
    protected $fillable = [
        'trip_id',
        'title',
        'uri',
        'status',
        'ordering',
        'sub_title',
        'banner',
    ];
    
    public function trip()
    {
        return $this->belongsTo(TripModel::class,'trip_id');
    }
    public function pastimages()
    {
        return $this->hasMany(PastTripImageModel::class,'past_trip_id');
    }
}
