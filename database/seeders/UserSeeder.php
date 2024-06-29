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
            'nama' => 'admin',
            'password' => Hash::make('admin'),
            'role_id' => 1,
            'email' => 'admin@gmail.com',
            'remember_token' => Str::random(60),
        ]);
        
        // User::create([
        //     'nama' => 'laura',
        //     'password' => Hash::make('laura'),
        //     'role_id' => 2,
        //     'remember_token' => Str::random(60),
        // ]);

        // User::create([
        //     'nama' => 'SMA N 3 Purwokerto',
        //     'password' => Hash::make('SMA N 3 Purwokerto'),
        //     'role_id' => 2,
        //     'remember_token' => Str::random(60),
        // ]);
    }
}
