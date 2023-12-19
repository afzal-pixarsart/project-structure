<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user  = User::create([
            'name'=> 'Ali',
            'email' => 'ali@gmail.com',
            'password'=> '123456789',
            'type' => 'admin',
        ]);
        $user->assignRole('admin');
    }
}
