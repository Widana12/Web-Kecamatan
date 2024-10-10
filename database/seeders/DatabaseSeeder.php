<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        

        $this->call(GeneralSettingSeeder::class);
        $this->call(HomepageSettingSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(FacilitySeeder::class);
        $this->call(PostCategorySeeder::class);
        $this->call(PostSeeder::class);
        $this->call(GalleryCategorySeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(ContactSeeder::class);
    }
}
