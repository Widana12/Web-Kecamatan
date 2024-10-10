<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        $super_admin = User::create([
            'token' => Str::random('20'),
            'name' => 'Super Administrator',
            'username' => 'super_admin',
            'slug' => 'super-administrator',
            'password' => '$2y$10$8oplL9uaajW/u3XmzLwhLub9H7cmx4EXm2FzBEc1cyAMYXUSwgkQS',
        ]);
        $super_admin->assignRole('Super Administrator');

        $administrator = User::create([
            'token' => Str::random('20'),
            'name' => 'Administrator',
            'username' => 'administrator',
            'slug' => 'administrator',
            'password' => '$2y$10$v10yHHHChqPsNfVMkbLPPuGsXNt05TQiFORAH2A/5kKjECuCmdvEK', //insieme123!
        ]);
        $administrator->assignRole('Administrator');

        $author_admin = User::create([
            'token' => Str::random('20'),
            'name' => 'Admin',
            'username' => 'admin',
            'slug' => 'admin',
            'password' => '$2y$10$v10yHHHChqPsNfVMkbLPPuGsXNt05TQiFORAH2A/5kKjECuCmdvEK', //insieme123!
        ]);
        $author_admin->assignRole('Author');


        $author_guru = User::create([
            'token' => Str::random('20'),
            'name' => 'Guru',
            'username' => 'guru',
            'slug' => 'guru',
            'password' => '$2y$10$vlmAuG/Fbrf7O8Rl6.XD7udeLNDdD4P5zPo9u3TZi1VpEutVhT3Hi', //insieme123!
        ]);
        $author_guru->assignRole('Author');

        $author_siswa = User::create([
            'token' => Str::random('20'),
            'name' => 'Siswa',
            'username' => 'siswa',
            'slug' => 'siswa',
            'password' => '$2y$10$vlmAuG/Fbrf7O8Rl6.XD7udeLNDdD4P5zPo9u3TZi1VpEutVhT3Hi', //insieme123!
        ]);
        $author_siswa->assignRole('Author');
    }
}
