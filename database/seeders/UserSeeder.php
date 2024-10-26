<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Location;
use App\Models\DesignerLevel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // clear
        User::truncate();

        // Seed
        User::factory()
        ->create([
            'username' => 'demo',
            'email' => 'demo@demo.com',
            'password' => Hash::make('password'), // password
        ]);
    }
}
