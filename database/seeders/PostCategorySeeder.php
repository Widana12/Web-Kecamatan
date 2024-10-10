<?php

namespace Database\Seeders;

use App\Models\PostCategory;
use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    public function run()
    {
        PostCategory::create([
            'name' => 'Nilai Serviam',
            'slug' => 'nilai-serviam'
        ]);

        PostCategory::create([
            'name' => 'Entrepreneurship',
            'slug' => 'entrepreneurship'
        ]);

        PostCategory::create([
            'name' => 'Pendidikan',
            'slug' => 'pendidikan'
        ]);

        PostCategory::create([
            'name' => 'Tulisan Siswa',
            'slug' => 'tulisan-siswa'
        ]);

        PostCategory::create([
            'name' => 'Opini',
            'slug' => 'opini'
        ]);

        PostCategory::create([
            'name' => 'Kegiatan',
            'slug' => 'kegiatan'
        ]);
    }
}
