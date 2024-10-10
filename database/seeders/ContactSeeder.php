<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    public function run()
    {
        Contact::create([
            'background' => 'defaultBackground.jpg',
            'address' => 'Jl. Bengawan No. 2, Cihapit, Kec. Bandung Wetan, Kota Bandung, Jawa Barat 40114',
            'address_link' => 'https://www.google.com/maps/place/Jl.+Bengawan,+Cihapit,+Kec.+Bandung+Wetan,+Kota+Bandung,+Jawa+Barat+40114/@-6.9128948,107.6332925,19.25z/data=!4m5!3m4!1s0x2e68e7cf5bd8ba8b:0x878f21897823a15e!8m2!3d-6.9128821!4d107.6333238',
            'email' => 'sd@santaursula-bdg.sch.id',
            'phone1' => '(022) 721 1367',
            'phone2' => '0823 7691 9151'
        ]);
    }
}
