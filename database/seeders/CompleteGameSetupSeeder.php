<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CompleteGameSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * This seeder sets up:
     * - Service durations (1, 3, 7, 30 days)
     * - Games: HOK, MLBB, PUBG, CODM, Wild Rift
     * - Hacks for HOK, MLBB, PUBG (Radeon, Adreno, Mali)
     * - Pricing for all hacks
     * - Discount coupons
     */
    public function run()
    {
        $this->command->info("Starting complete game setup...\n");
        
        // Seed games with hacks and pricing
        $this->call(GameHacksWithPricingSeeder::class);
        
        $this->command->info("\n");
        
        // Seed discount coupons
        $this->call(DiscountCouponSeeder::class);
        
        $this->command->info("\n========================================");
        $this->command->info("✓ Complete game setup finished!");
        $this->command->info("========================================\n");
        
        $this->command->info("Games created:");
        $this->command->info("  1. Honor of Kings (HOK)");
        $this->command->info("     - Drone View Only, Drone View + Map Hack, Full Edition, Aim Assist");
        $this->command->info("  2. Mobile Legends (MLBB)");
        $this->command->info("     - Drone View Only, Drone View + Map Hack, Full Edition, Skin Changer, Auto Skill");
        $this->command->info("  3. PUBG Mobile");
        $this->command->info("     - Wall Hack (ESP), Aimbot, No Recoil, Speed Hack, Full Edition, Magic Bullet");
        $this->command->info("  4. Call of Duty Mobile (CODM) - no hacks");
        $this->command->info("  5. League of Legends: Wild Rift - no hacks");
        
        $this->command->info("\nPricing structure:");
        $this->command->info("  HOK Drone View Only: 3 days ($5), 7 days ($10), 30 days ($30)");
        $this->command->info("  All other hacks: 1 day ($2), 7 days ($5), 30 days ($15)");
        
        $this->command->info("\nDiscount coupons created:");
        $this->command->info("  - WELCOME10 (10% off)");
        $this->command->info("  - SAVE5 ($5 off)");
        $this->command->info("  - MEGA20 (20% off)");
        $this->command->info("  - FIRSTBUY (15% off)");
        $this->command->info("  - VIP50 (50% off)");
        $this->command->info("  - UNLIMITED5 (5% off, unlimited use)");
    }
}
