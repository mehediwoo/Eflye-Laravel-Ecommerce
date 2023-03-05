<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;
use App\Models\AdminAuth;

class AdminAuths extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminAuth::create([
            'name' => 'Mehedi',
            'email' => 'mehedilrs@gmail.com',
            'password' => Hash::make('12345678')
        ]);
    }
}
