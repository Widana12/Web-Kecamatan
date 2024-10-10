<?php

namespace Database\Factories;

use App\Models\Gallery;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GalleryFactory extends Factory
{
    protected $model = Gallery::class;

    public function definition()
    {
        $faker = Faker::create('id_ID');
        $title = Str::title($faker->sentence());
        $slug = SlugService::createSlug(Gallery::class, 'slug', $title);
        $isPublish = $faker->numberBetween(0, 1);
        if ($isPublish == 0) {
            return [
                'category_id' => $faker->numberBetween(1, 3),
                'title' => $title,
                'slug' => $slug,
                'image' => 'defaultPost.png',
                'create_by' => $faker->numberBetween(3, 4),
                'isPublish' => $isPublish,
                'publish_by' => null,
                'publish_at' => null
            ];
        } else {
            return [
                'category_id' => $faker->numberBetween(1, 3),
                'title' => $title,
                'slug' => $slug,
                'image' => 'defaultPost.png',
                'create_by' => $faker->numberBetween(3, 4),
                'isPublish' => $isPublish,
                'publish_by' => 2,
                'publish_at' => now()
            ];
        }
    }
}
