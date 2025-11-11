<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaintenanceSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('maintenance_modes')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('maintenance_modes')->insert(
            array (
  0 => 
  array (
    'id' => 1,
    'heading' => 'The website under maintenance!',
    'description' => '<p>We are currently undergoing scheduled maintenance to improve our services and enhance your user experience. During this time, our website/system will be temporarily unavailable.
</p><p><br></p><p>
We apologize for any inconvenience this may cause and appreciate your patience. Please rest assured that we are working diligently to complete the maintenance as quickly as possible.</p>',
    'image' => 'maintenanceMode/3jXAnm42OZuYy3kVDcHKUjW3gyiG8eSo96rlgg19.png',
    'image_driver' => 'local',
    'created_at' => '2023-10-04 01:44:32',
    'updated_at' => '2024-02-05 06:00:13',
  ),
)
        );
    }
}
