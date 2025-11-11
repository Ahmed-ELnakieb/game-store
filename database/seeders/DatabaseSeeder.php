<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AdminSeeder::class,
            BasicControlSeeder::class,
            FileStorageSeeder::class,
            GatewaySeeder::class,
            ManualSmsConfigSeeder::class,
            PayoutMethodSeeder::class,
            PageSeeder::class,
            LanguageSeeder::class,
            MaintenanceSeeder::class,
            NotificationSeeder::class,
            NotificationSettingsSeeder::class,
            BlogCategorySeeder::class,
            BlogSeeder::class,
            BlogDetailSeeder::class,
            CategorySeeder::class,
            CurrencySeeder::class,
            ManageMenuSeeder::class,
            ContentSeeder::class,
            ContentDetailSeeder::class,
            PageDetailSeeder::class,
            ServiceDurationSeeder::class,
            CardSeeder::class, // Game cards (HOK, MLBB, PUBG, etc.)
            CardServiceSeeder::class, // Hacks for each game
            ServicePricingSeeder::class, // Pricing for all hacks
            ReviewSeeder::class, // Reviews for game hacks
            DiscountCouponSeeder::class, // Discount coupons
        ]);
    }
}
