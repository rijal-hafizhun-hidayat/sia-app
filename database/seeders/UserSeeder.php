<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nama_depan' => Str::random(5),
            'nama_lengkap' => Str::random(10),
            'username' => 'admin',
            'password' => Hash::make('password'),
            'role' => 1
        ]);
    }
}
