<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OpeningHeadmaster extends Model
{
    protected $table = 'opening_headmaster';
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'id';
    }
}
