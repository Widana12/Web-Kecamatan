<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    protected $table = 'gallery_images';
    protected $guarded = ['id'];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'gallery_id');
    }

    public function getRouteKeyName()
    {
        return 'token';
    }
}
