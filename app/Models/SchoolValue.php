<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolValue extends Model
{
    protected $table = 'school_values';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'token';
    }
}
