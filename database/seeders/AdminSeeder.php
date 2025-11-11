<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$oJjedvDptyOeFa42S55bY.1vR065RK4wZAUAuVDBPVg4fS7bANY1u',
            'image' => 'adminProfileImage/P8667idwGvCpWBeeVKAodCjWumgVvk.webp',
            'image_driver' => 'local',
            'phone' => '+1 2125554567',
            'address' => '13th Street. 47 W 13th St, New York',
            'role_id' => null,
            'admin_access' => null,
            'last_login' => '2025-03-09 10:43:16',
            'last_seen' => '2025-03-09 12:02:06',
            'status' => 1,
            'remember_token' => null,
            'created_at' => null,
            'updated_at' => '2025-03-09 08:02:06',
        ]);
    }
}
