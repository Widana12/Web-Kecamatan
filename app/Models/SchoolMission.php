<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolMission extends Model
{
    protected $table = 'school_missions';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'token';
    }
}
