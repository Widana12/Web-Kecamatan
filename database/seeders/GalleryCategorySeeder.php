<?php

namespace Database\Seeders;

use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;

class GalleryCategorySeeder extends Seeder
{
    public function run()
    {
        GalleryCategory::create([
            'name' => 'Kegiatan Sekolah',
            'slug' => 'kegiatan-sekolah'
        ]);

        GalleryCategory::create([
            'name' => 'Jaman Dulu',
            'slug' => 'jaman-dulu'
        ]);

        GalleryCategory::create([
            'name' => 'Dokumentasi',
            'slug' => 'dokumentasi'
        ]);
    }
}
