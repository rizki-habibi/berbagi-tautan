<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@berbagi.com'],
            [
                'name'     => 'Admin BerbagiTautan',
                'email'    => 'admin@berbagi.com',
                'password' => Hash::make('password123'),
            ]
        );
    }
}
