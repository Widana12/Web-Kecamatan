<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $table = 'posts';
    protected $guarded = ['id'];
    protected $dates = ['deleted_at'];

    public function post_category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id');
    }

    public function user_create()
    {
        return $this->belongsTo(User::class, 'create_by');
    }

    public function user_publish()
    {
        return $this->belongsTo(User::class, 'publish_by');
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
