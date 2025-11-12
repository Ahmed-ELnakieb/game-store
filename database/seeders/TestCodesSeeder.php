<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestCodesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $serviceId = 1; // Drone View Only service
        
        // Duration IDs: 2 = 3 Days, 3 = 7 Days, 5 = 30 Days
        $durations = [
            2 => '3D',
            3 => '7D',
            5 => '30D'
        ];
        
        $totalAdded = 0;
        
        foreach ($durations as $durationId => $prefix) {
            // Random number of codes between 2 and 5
            $count = rand(2, 5);
            
            for ($i = 0; $i < $count; $i++) {
                DB::table('codes')->insert([
                    'codeable_type' => 'App\Models\CardService',
                    'codeable_id' => $serviceId,
                    'duration_id' => $durationId,
                    'passcode' => $prefix . '-' . strtoupper(substr(md5(rand()), 0, 12)),
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
                $totalAdded++;
            }
            
            $this->command->info("Added {$count} codes for duration ID {$durationId} ({$prefix})");
        }
        
        $this->command->info("Total test codes added: {$totalAdded}");
    }
}
