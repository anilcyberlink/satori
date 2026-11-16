<?php

namespace App\Models\Banners;

use Illuminate\Database\Eloquent\Model;

class MultiBannerModel extends Model
{
    protected $table = 'cl_model_banners';

    protected $fillable = [
        'title',
        'image',
        'status',
    ];

    public function bannerable()
    {
        return $this->morphTo();
    }
}
