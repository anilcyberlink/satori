<?php
namespace App\Models\Travels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PastTripImageModel extends Model
{
    use HasFactory;
    protected $table = 'cl_past_trip_images';
    protected $fillable = ['past_trip_id','name','position','country','image','category'];
    
    public function pastTrip()
    {
        return $this->belongsTo(PastTripModel::class,'past_trip_id');
    }
}
