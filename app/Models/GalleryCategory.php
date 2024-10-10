<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    use Sluggable;

    protected $table = 'gallery_categories';
    protected $guarded = ['id'];

    public function galeries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
