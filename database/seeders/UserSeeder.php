<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::create([
            'role_id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin')
        ]);
        User::create([
            'role_id' => 1,
            'name' => 'admin 1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin1')
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'Robert Charis',
            'email' => 'robert@gmail.com',
            'password' => Hash::make('RobertCharis')
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'SandiGail',
            'email' => 'sandi@gmail.com',
            'password' => Hash::make('SandiGail')
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'Hulk Buster',
            'email' => 'hulk@gmail.com',
            'password' => Hash::make('HulkBuster')
        ]);
    }
}
