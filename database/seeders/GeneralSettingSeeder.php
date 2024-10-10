<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use App\Models\Link;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GeneralSettingSeeder extends Seeder
{
    public function run()
    {
        GeneralSetting::create([
            'meta_description' => 'SD Santa Ursula adalah sekolah Katolik yang berada di Kota Bandung di bawah naungan Yayasan Prasama Bhakti',
            'meta_keywords' => 'sd, santa ursula, ursula, sekolah, katolik, yayasan, prasama bhakti, sekolah bandung, bandung, mars serviam',
            'meta_author' => 'SD Santa Ursula Bandung',
            'modal_image' => 'psb-modal.jpg',
            'modal_link' => 'https://psb.santaursula-bdg.sch.id/',
            'modal_active' => 1,
            'header_logo_white' => 'headerLogoWhite.png',
            'header_logo_black' => 'headerLogoBlack.png',
            'footer_logo' => 'footerLogo.png',
            'footer_content' => 'Jadilah pemimpin yang mandiri dan pantang menyerah bersama SD Santa Ursula Bandung.',
            'facebook_link' => 'https://www.facebook.com/SD-SANTA-URSULA-BANDUNG-72846067540',
            'instagram_link' => 'https://www.instagram.com/sd.santaursulabdg/',
            'youtube_link' => 'https://www.youtube.com/c/OFFICIALSANTAURSULABANDUNG',
            'psb_name' => 'PSB TAHUN PELAJARAN 2023/2024',
            'psb_link' => 'https://psb.santaursula-bdg.sch.id/',
        ]);

        Link::create([
            'token' => Str::random('20'),
            'name' => 'Yayasan Prasama Bhakti',
            'web_link' => 'https://santaursula-bdg.sch.id/'
        ]);

        Link::create([
            'token' => Str::random('20'),
            'name' => 'TB-SD Santa Ursula',
            'web_link' => 'https://sd.santaursula-bdg.sch.id/'
        ]);

        Link::create([
            'token' => Str::random('20'),
            'name' => 'SD Santa Ursula',
            'web_link' => 'https://sd.santaursula-bdg.sch.id/'
        ]);

        Link::create([
            'token' => Str::random('20'),
            'name' => 'PSB Kampus Santa Ursula',
            'web_link' => 'https://psb.santaursula-bdg.sch.id/'
        ]);

        Link::create([
            'token' => Str::random('20'),
            'name' => 'LMS Kampus Santa Ursula',
            'web_link' => 'https://lms.santaursula-bdg.sch.id/'
        ]);
    }
}
