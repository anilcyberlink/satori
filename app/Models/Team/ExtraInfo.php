<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;

class ExtraInfo extends Model
{
    protected $table = 'cl_team_extrainfos';
    protected $fillable = [
        'team_id',
        'title',
        'description',
        'ordering'
    ];
}
