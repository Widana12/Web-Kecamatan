<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $table = 'galleries';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function gallery_category()
    {
        return $this->belongsTo(GalleryCategory::class, 'category_id');
    }

    public function user_create()
    {
        return $this->belongsTo(User::class, 'create_by');
    }

    public function user_publish()
    {
        return $this->belongsTo(User::class, 'publish_by');
    }

    public function gallery_images()
    {
        return $this->hasMany(GalleryImage::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
