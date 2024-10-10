<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FacilitySeeder extends Seeder
{
    public function run()
    {
        Facility::create([
            'token' => Str::random(20),
            'title' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, vitae',
            'image' => 'defaultSlider.jpg',
        ]);

        Facility::create([
            'token' => Str::random(20),
            'title' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, vitae',
            'image' => 'defaultSlider.jpg',
        ]);

        Facility::create([
            'token' => Str::random(20),
            'title' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, vitae',
            'image' => 'defaultSlider.jpg',
        ]);

        Facility::create([
            'token' => Str::random(20),
            'title' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, vitae',
            'image' => 'defaultSlider.jpg',
        ]);

        Facility::create([
            'token' => Str::random(20),
            'title' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatem, vitae',
            'image' => 'defaultSlider.jpg',
        ]);
    }
}
