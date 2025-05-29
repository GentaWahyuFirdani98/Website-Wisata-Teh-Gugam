<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PengunjungSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama' => 'danar',
            'email' => 'danar@mail.com',
            'password' => Hash::make('1'),
            'role' => 'pengunjung',
        ]);
    }
}
