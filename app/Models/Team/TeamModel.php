<?php

namespace App\Models\Team;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\HasSeo;

class TeamModel extends Model
{
    use HasSeo;
    protected $table = 'cl_team';
    protected $fillable = [
        'name',
        'uri',
        'position',
        'team_category',
        'phone',
        'email',
        'description',
        'brief',
        'status',
        'ordering',
        'thumbnail',
        'show_in_home',
        'instagram_url',
        'twitter_url'
    ];

    public function certificates()
    {
        return $this->hasMany('App\Models\Team\Certificates', 'team_id');
    }
    public function extrainfos()
    {
        return $this->hasMany('App\Models\Team\ExtraInfo', 'team_id');
    }
}
