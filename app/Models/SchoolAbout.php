<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolAbout extends Model
{
    protected $table = 'school_abouts';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'name';
    }
}
