<?php

namespace Database\Seeders;

use App\Models\SchoolAbout;
use App\Models\SchoolMission;
use App\Models\SchoolServiamValue;
use App\Models\SchoolValue;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AboutSeeder extends Seeder
{
    public function run()
    {
        SchoolAbout::create([
            'name' => 'profile',
            'content' => '<h1>Lorem ipsum dolor sit amet.</h1>
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
            </blockquote>',
            'background' => 'defaultBackground.jpg'
        ]);

        SchoolAbout::create([
            'name' => 'history',
            'content' => '<h1>Lorem ipsum dolor sit amet.</h1>
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
            </blockquote>',
            'background' => 'defaultBackground.jpg'
        ]);

        SchoolAbout::create([
            'name' => 'vision',
            'content' => '<p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam provident repellat dolore id pariatur error. Quasi, obcaecati ipsam ipsum cumque nam cupiditate, voluptatem
                non, repellat beatae ex quas! Quod illo odit ipsa dolore sapiente quas aspernatur vero autem sit voluptate perspiciatis fugit magnam voluptates id voluptatum, maxime
                accusantium laborum omnis.
            </p>',
            'background' => 'defaultBackground.jpg',
            'image' => 'defaultImage.png'
        ]);

        SchoolAbout::create([
            'name' => 'serviam',
            'content' => '<p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Numquam provident repellat dolore id pariatur error. Quasi, obcaecati ipsam ipsum cumque nam cupiditate, voluptatem
                non, repellat beatae ex quas! Quod illo odit ipsa dolore sapiente quas aspernatur vero autem sit voluptate perspiciatis fugit magnam voluptates id voluptatum, maxime
                accusantium laborum omnis.
            </p>',
            'background' => 'defaultBackground.jpg',
            'image' => 'logoServiam.png'
        ]);

        SchoolAbout::create([
            'name' => 'entrepreneurship',
            'content' => '<h1>Lorem ipsum dolor sit amet.</h1>
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
            </blockquote>',
            'background' => 'defaultBackground.jpg'
        ]);

        SchoolMission::create([
            'token' => Str::random(20),
            'name' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.'
        ]);

        SchoolMission::create([
            'token' => Str::random(20),
            'name' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.'
        ]);

        SchoolMission::create([
            'token' => Str::random(20),
            'name' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.'
        ]);

        SchoolMission::create([
            'token' => Str::random(20),
            'name' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.'
        ]);

        SchoolMission::create([
            'token' => Str::random(20),
            'name' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.'
        ]);

        SchoolValue::create([
            'token' => Str::random(20),
            'name' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.'
        ]);

        SchoolValue::create([
            'token' => Str::random(20),
            'name' => 'Lorem ipsum dolor sit amet.',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, ducimus.'
        ]);

        SchoolServiamValue::create([
            'token' => Str::random(20),
            'name' => 'Lorem ipsum dolor sit amet.'
        ]);

        SchoolServiamValue::create([
            'token' => Str::random(20),
            'name' => 'Lorem ipsum dolor sit amet.'
        ]);

        SchoolServiamValue::create([
            'token' => Str::random(20),
            'name' => 'Lorem ipsum dolor sit amet.'
        ]);

        SchoolServiamValue::create([
            'token' => Str::random(20),
            'name' => 'Lorem ipsum dolor sit amet.'
        ]);

        SchoolServiamValue::create([
            'token' => Str::random(20),
            'name' => 'Lorem ipsum dolor sit amet.'
        ]);

        SchoolServiamValue::create([
            'token' => Str::random(20),
            'name' => 'Lorem ipsum dolor sit amet.'
        ]);
    }
}
