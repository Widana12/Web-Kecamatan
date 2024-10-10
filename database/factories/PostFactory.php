<?php

namespace Database\Factories;

use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        $faker = Faker::create('id_ID');
        $title = Str::title($faker->sentence());
        $slug = SlugService::createSlug(Post::class, 'slug', $title);
        $content = '<h1>Lorem ipsum dolor sit amet.</h1>
        <h2>Lorem ipsum dolor sit amet.</h2>
        <h3>Lorem ipsum dolor sit amet.</h3>
        <h4>Lorem ipsum dolor sit amet.</h4>
        <h5>Lorem ipsum dolor sit amet.</h5>
        <p>
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sapiente consectetur porro molestiae repellat doloremque praesentium voluptatibus delectus cum! Laboriosam quidem vel
            ullam possimus id nobis laborum, corporis corrupti cum. Vitae, fugiat? Quasi beatae, minima saepe fugiat vel omnis est ducimus possimus placeat ad quisquam, explicabo
            perferendis enim laborum reprehenderit recusandae.
        </p>
        <a href="#">Lorem ipsum dolor sit amet.</a>
        <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia sed nulla maxime excepturi explicabo inventore dolorum vel aspernatur nostrum repellendus aperiam repellat
            provident ratione error harum consequuntur, <a href="#">asperiores voluptate quidem numquam</a> facilis? Deleniti nobis doloribus quisquam rerum quia molestiae ea, unde
            quaerat facere neque porro fuga dolorum laudantium! Explicabo, minima.
        </p>
        <img src="http://web-sd.test/upload/defaultPost.png" alt="Image">
        <ul>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
        </ul>
        <ol>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
            <li>Lorem ipsum dolor sit amet.</li>
        </ol>
        <blockquote>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni veritatis, laudantium optio sint commodi repudiandae tempore suscipit consequuntur rem soluta facilis quod
                sit, ex eaque? Beatae quibusdam perferendis laborum officia omnis fugit dolore! Vitae voluptate eius tenetur maiores odio voluptates animi consectetur facilis deserunt!
                Maxime itaque dignissimos minima explicabo mollitia.
            </p>
            <h1>Lorem ipsum dolor sit amet.</h1>
            <h2>Lorem ipsum dolor sit amet.</h2>
            <h3>Lorem ipsum dolor sit amet.</h3>
            <h4>Lorem ipsum dolor sit amet.</h4>
            <h5>Lorem ipsum dolor sit amet.</h5>
        </blockquote>';
        $isPublish = $faker->numberBetween(0, 1);
        if ($isPublish == 0) {
            return [
                'category_id' => $faker->numberBetween(1, 5),
                'title' => $title,
                'slug' => $slug,
                'image' => 'defaultPost.png',
                'content' => $content,
                'create_by' => $faker->numberBetween(3, 4),
                'isPublish' => $isPublish,
                'publish_by' => null,
                'publish_at' => null
            ];
        } else {
            return [
                'category_id' => $faker->numberBetween(1, 5),
                'title' => $title,
                'slug' => $slug,
                'image' => 'defaultPost.png',
                'content' => $content,
                'create_by' => $faker->numberBetween(3, 4),
                'isPublish' => $isPublish,
                'publish_by' => 2,
                'publish_at' => now()
            ];
        }
    }
}
