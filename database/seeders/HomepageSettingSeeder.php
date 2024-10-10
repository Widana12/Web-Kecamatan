<?php

namespace Database\Seeders;

use App\Models\OpeningHeadmaster;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class HomepageSettingSeeder extends Seeder
{
    public function run()
    {
        Slider::create([
            'token' => Str::random(20),
            'title' => 'PSB Tahun Ajaran 2023/2024',
            'sub_title1' => 'Informasi Penerimaan Siswa Baru',
            'sub_title2' => 'Untuk informasi dan pendaftaran klik tombol di bawah ini',
            'button_name' => 'PSB 2023/2024',
            'button_link' => '/psb',
            'background' => 'defaultSlider.jpg',
        ]);

        Slider::create([
            'token' => Str::random(20),
            'title' => 'SD Santa Ursula Bandung',
            'sub_title1' => 'Selamat Datang di Website',
            'sub_title2' => '~ Entrepreneurship is Our Mindset ~',
            'button_name' => 'TENTANG KAMI',
            'button_link' => '/profil-sekolah',
            'background' => 'defaultSlider.jpg',
        ]);

        Slider::create([
            'token' => Str::random(20),
            'title' => '6 Nilai Serviam',
            'sub_title1' => 'Serviam',
            'sub_title2' => 'Nilai-nilai yang menjadi landasan utama sekolah',
            'button_name' => 'SELENGKAPNYA',
            'button_link' => '/6-nilai-serviam',
            'background' => 'defaultSlider.jpg',
        ]);

        Slider::create([
            'token' => Str::random(20),
            'title' => 'Entrepreneurship is Our Mindset',
            'sub_title1' => 'Entrepreneurship',
            'sub_title2' => 'Entrepreneurship menjadi filosofi pembelajaran di sekolah',
            'button_name' => 'SELENGKAPNYA',
            'button_link' => '/entrepreneurship',
            'background' => 'defaultSlider.jpg',
        ]);

        OpeningHeadmaster::create([
            'opening_content' => 'Sebagai sekolah Ursulin, TBTK Santa Ursula Bandung membekali generasi muda untuk menjawab tantangan abad 21 dengan menerapkan metode pembelajaran entrepreneurship. Proses Pembelajaran entrepreneurship membentuk siswa menjadi seorang pemimpin masa depan yang mandiri dan pantang menyerah. Kegiatan pembentukan karakter menjadi fokus utama dalam pembelajaran di TBTK Santa Ursula Bandung. Jadilah pemimpin yang mandiri dan pantang menyerah bersama TBTK Santa Ursula Bandung<br><br>Tidaklah Cukup Untuk Memulai Bila Tanpa Ketahanan.<br> -- Prakata Regula Santa Angela',
            'headmaster_image' => 'defaultHeadmaster.jpg',
            'headmaster_name' => 'Lucia Ika Linawati, S. Pd., M.Hum',
            'headmaster_content' => 'Puji dan syukur kita panjatkan kepada Tuhan karena kemurahan-Nya kita dipertemukan oleh Tuhan sebagai keluarga besar TBTK Santa Ursula. Keterampilan abad 21 yang meliput Learning Skill (Keterampilan Belajar) meliputi berfikir kritis, kreatif, inovatif, komunikatif, dan kolaboratif. Lalu Literacy Skill (Keterampilan Berliterasi) meliputi kemampuan untuk memilah, dan mengolah informasi. Dan yang terakhir Life Skill (Keterampilan Hidup) yang meliputi berjiwa kepemimpinan, adaptif, fleksibel, dan interaksi sosial.<br>Tema tahun ajaran ini adalah Building Future Resilient and Independent Leader. Bahwa pemimpin resilient adalah individu yang memiliki kemauan untuk mendorong dirinya dan tertempa oleh pengalaman yang beragam. yang membuatnya memiliki daya juang  yang baik, alias cepat bangkit dari keterpurukan. tema ini merupakan harapan kami para guru dan harapan kita bersama  untuk mewujudkan nilai-nilai serviam yang ditanamkan di sekolah ini pada tahun pelajaran ini.<br>Mari kita menjadi pribadi yang mandiri dan pantang menyerah dalam berproses di sekolah ini,  menguatkan karakter jujur, bertanggung jawab, dan menghargai. Bapak-ibu guru tentu akan menjadi partner kalian dalam  berproses dan bertumbuh di TBTK Santa Ursula.'
        ]);

        Testimonial::create([
            'token' => Str::random(20),
            'name' => 'Silvester Rangga',
            'sub_name' => 'Alumni Angkatan 2010',
            'content' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam, voluptatum!',
            'image' => 'defaultTestimonial.png'
        ]);

        Testimonial::create([
            'token' => Str::random(20),
            'name' => 'Cecep Supriatna',
            'sub_name' => 'Alumni Angkatan 2013',
            'content' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quis, tempora.',
            'image' => 'defaultTestimonial.png'
        ]);

        Testimonial::create([
            'token' => Str::random(20),
            'name' => 'Atep Rizal',
            'sub_name' => 'Alumni Angkatan 2000',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatum, illo?',
            'image' => 'defaultTestimonial.png'
        ]);

        Testimonial::create([
            'token' => Str::random(20),
            'name' => 'D. Aldo',
            'sub_name' => 'Alumni Angkatan 2020',
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, commodi.',
            'image' => 'defaultTestimonial.png'
        ]);
    }
}
