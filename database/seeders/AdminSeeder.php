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
            'password' => Hash::make('000'),
            'image' => 'adminProfileImage/P8667idwGvCpWBeeVKAodCjWumgVvk.webp',
            'image_driver' => 'local',
            'phone' => '+1 2125554567',
            'address' => '13th Street. 47 W 13th St, New York',
            'role_id' => null,
            'admin_access' => null,
            'last_login' => null,
            'last_seen' => null,
            'status' => 1,
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
