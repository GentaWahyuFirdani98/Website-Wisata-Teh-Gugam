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
            'nama' => 'Danar',
            'email' => 'danar@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'pengunjung',
        ]);
    }
}
