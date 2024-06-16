<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'nip' => '234567891012345678',
                'nama' => 'Admin',
                'email' => 'admin@urproj.com',
                'role' => 'admin',
                'jabatan' => 'Admin',
                'unit_kerja' => 'Admin',
                'password' => bcrypt('password'),
            ],
            [
                'nip' => '345678910123456789',
                'nama' => 'Pegawai',
                'email' => 'pegawai@urproj.com',
                'role' => 'pegawai',
                'jabatan' => 'Pegawai',
                'unit_kerja' => 'Pegawai',
                'password' => bcrypt('password'),
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
