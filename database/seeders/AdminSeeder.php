<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'nama' => 'Administrator',
            'email' => 'admin@tehgugam.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);
    }
}
