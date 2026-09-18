<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class Certificates extends Model
{
    protected $table = 'cl_team_certificates';
    protected $fillable = [
        'team_id',
        'title',
        'ordering',
        'image',
        'type'
    ];
}
