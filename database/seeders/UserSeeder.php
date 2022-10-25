<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superadmin = \App\Models\User::factory()->create([
            'email' => 'superadmin@test.com',
            'password' => Hash::make('superadmin@test.com'),
        ]);
        $superadmin->assignRole('Super Admin');

        $admin = \App\Models\User::factory()->create([
            'email' => 'admin@test.com',
            'password' => Hash::make('admin@test.com'),
        ]);
        $admin->assignRole('Admin');

        \App\Models\User::factory()->create([
            'email' => 'test@test.com',
            'password' => Hash::make('test@test.com'),
        ]);
    }
}
