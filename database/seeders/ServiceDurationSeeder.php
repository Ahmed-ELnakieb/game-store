<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('service_durations')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('service_durations')->insert([
            [
                'name' => '1 Day',
                'days' => 1,
                'code' => '1D',
                'sort_order' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '3 Days',
                'days' => 3,
                'code' => '3D',
                'sort_order' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '7 Days',
                'days' => 7,
                'code' => '7D',
                'sort_order' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '14 Days',
                'days' => 14,
                'code' => '14D',
                'sort_order' => 4,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '30 Days',
                'days' => 30,
                'code' => '30D',
                'sort_order' => 5,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '60 Days',
                'days' => 60,
                'code' => '60D',
                'sort_order' => 6,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => '90 Days',
                'days' => 90,
                'code' => '90D',
                'sort_order' => 7,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
