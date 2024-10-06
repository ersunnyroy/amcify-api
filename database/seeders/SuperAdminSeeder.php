<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Make sure to import your User model

class SuperAdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'er.sunnyroy@gmail.com', // Change to your desired email
            'password' => bcrypt('Unique@786**'), // Change to your desired password
            'role' => 'super_admin', // Assign the super admin role
        ]);
    }
}
