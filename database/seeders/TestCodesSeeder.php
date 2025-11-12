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
        // Get all card services
        $services = DB::table('card_services')->select('id', 'name')->get();
        
        // Duration IDs: 2 = 3 Days, 3 = 7 Days, 5 = 30 Days
        $durations = [
            2 => '3D',
            3 => '7D',
            5 => '30D'
        ];
        
        $totalAdded = 0;
        
        foreach ($services as $service) {
            $this->command->info("Adding codes for: {$service->name}");
            
            foreach ($durations as $durationId => $prefix) {
                // Random number of codes between 1 and 2
                $count = rand(1, 2);
                
                for ($i = 0; $i < $count; $i++) {
                    DB::table('codes')->insert([
                        'codeable_type' => 'App\Models\CardService',
                        'codeable_id' => $service->id,
                        'duration_id' => $durationId,
                        'passcode' => $prefix . '-' . strtoupper(substr(md5(rand()), 0, 12)),
                        'status' => 1,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                    $totalAdded++;
                }
                
                $this->command->info("  - Added {$count} code(s) for {$prefix}");
            }
        }
        
        $this->command->info("Total test codes added: {$totalAdded}");
    }
}
