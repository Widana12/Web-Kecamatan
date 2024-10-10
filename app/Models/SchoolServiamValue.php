<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolServiamValue extends Model
{
    protected $table = 'school_serviam_values';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'token';
    }
}
