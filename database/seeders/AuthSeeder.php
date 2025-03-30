<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {             
       
        if (!User::where('email', 'superadmin@admin.com')->exists()) {
            User::create([
                'name' => 'Super Admin',
                'email' => 'superadmin@admin.com',
                'role' => 'super admin',
                'password' => bcrypt('password'),
            ]);
        }
    }
}
