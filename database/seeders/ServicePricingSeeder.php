<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\CardService;
use App\Models\ServiceDuration;
use App\Models\ServicePricing;
use Illuminate\Database\Seeder;

class ServicePricingSeeder extends Seeder
{
    /**
     * Seed service pricing for all hacks
     */
    public function run(): void
    {
        $this->command->info("Seeding service pricing...");

        // Define pricing structure for each game's hacks
        $pricingStructure = [
            'Honor of Kings (HOK)' => [
                'Drone View Only' => [
                    ['duration' => '3 Days', 'price' => 5],
                    ['duration' => '7 Days', 'price' => 10],
                    ['duration' => '30 Days', 'price' => 30],
                ],
                'Drone View + Map Hack' => [
                    ['duration' => '1 Day', 'price' => 2],
                    ['duration' => '7 Days', 'price' => 5],
                    ['duration' => '30 Days', 'price' => 15],
                ],
                'Full Edition (All Features)' => [
                    ['duration' => '1 Day', 'price' => 2],
                    ['duration' => '7 Days', 'price' => 5],
                    ['duration' => '30 Days', 'price' => 15],
                ],
            ],
            'Mobile Legends (MLBB)' => [
                'Drone View Only' => [
                    ['duration' => '1 Day', 'price' => 2],
                    ['duration' => '7 Days', 'price' => 5],
                    ['duration' => '30 Days', 'price' => 15],
                ],
                'Drone View + Map Hack' => [
                    ['duration' => '1 Day', 'price' => 2],
                    ['duration' => '7 Days', 'price' => 5],
                    ['duration' => '30 Days', 'price' => 15],
                ],
                'Full Edition (All Features)' => [
                    ['duration' => '1 Day', 'price' => 2],
                    ['duration' => '7 Days', 'price' => 5],
                    ['duration' => '30 Days', 'price' => 15],
                ],
                'Skin Changer' => [
                    ['duration' => '1 Day', 'price' => 2],
                    ['duration' => '7 Days', 'price' => 5],
                    ['duration' => '30 Days', 'price' => 15],
                ],
                'Auto Skill' => [
                    ['duration' => '1 Day', 'price' => 2],
                    ['duration' => '7 Days', 'price' => 5],
                    ['duration' => '30 Days', 'price' => 15],
                ],
            ],
            'PUBG Mobile' => [
                'Wall Hack (ESP)' => [
                    ['duration' => '1 Day', 'price' => 2],
                    ['duration' => '7 Days', 'price' => 5],
                    ['duration' => '30 Days', 'price' => 15],
                ],
                'Aimbot' => [
                    ['duration' => '1 Day', 'price' => 2],
                    ['duration' => '7 Days', 'price' => 5],
                    ['duration' => '30 Days', 'price' => 15],
                ],
                'No Recoil' => [
                    ['duration' => '1 Day', 'price' => 2],
                    ['duration' => '7 Days', 'price' => 5],
                    ['duration' => '30 Days', 'price' => 15],
                ],
                'Speed Hack' => [
                    ['duration' => '1 Day', 'price' => 2],
                    ['duration' => '7 Days', 'price' => 5],
                    ['duration' => '30 Days', 'price' => 15],
                ],
                'Full Edition (All Features)' => [
                    ['duration' => '1 Day', 'price' => 2],
                    ['duration' => '7 Days', 'price' => 5],
                    ['duration' => '30 Days', 'price' => 15],
                ],
                'Magic Bullet' => [
                    ['duration' => '1 Day', 'price' => 2],
                    ['duration' => '7 Days', 'price' => 5],
                    ['duration' => '30 Days', 'price' => 15],
                ],
            ],
        ];

        foreach ($pricingStructure as $gameName => $hacks) {
            $card = Card::where('name', $gameName)->first();
            
            if (!$card) {
                $this->command->warn("Game not found: {$gameName}. Skipping...");
                continue;
            }

            $this->command->info("\nAdding pricing for: {$gameName}");

            foreach ($hacks as $hackName => $pricing) {
                $service = CardService::where('card_id', $card->id)
                    ->where('name', $hackName)
                    ->first();
                
                if (!$service) {
                    $this->command->warn("  Service not found: {$hackName}. Skipping...");
                    continue;
                }

                foreach ($pricing as $priceData) {
                    $duration = ServiceDuration::where('name', $priceData['duration'])->first();
                    
                    if (!$duration) {
                        $this->command->warn("    Duration not found: {$priceData['duration']}. Skipping...");
                        continue;
                    }

                    ServicePricing::updateOrCreate(
                        [
                            'card_service_id' => $service->id,
                            'duration_id' => $duration->id,
                        ],
                        [
                            'price' => $priceData['price'],
                            'discount' => 0,
                            'discount_type' => 'flat',
                            'stock_count' => 999999,
                            'status' => 1,
                        ]
                    );

                    $this->command->info("  ✓ {$hackName} - {$priceData['duration']}: \${$priceData['price']}");
                }
            }
        }

        $this->command->info("\n✓ Service pricing seeded successfully!");

        // Seed Gift Card Pricing
        $this->command->info("\nSeeding gift card pricing...");

        $giftCardPricing = [
            'Free Fire Hack' => [
                'ESP Only' => 3,
                'Aimbot + ESP' => 5,
                'Full Edition' => 8,
            ],
            'Genshin Impact Hack' => [
                'Basic Edition' => 4,
                'Advanced Edition' => 7,
                'Full Edition' => 10,
            ],
            'Valorant Hack' => [
                'ESP Only' => 5,
                'Aimbot + ESP' => 8,
                'Full Edition' => 12,
            ],
        ];

        foreach ($giftCardPricing as $cardName => $services) {
            $card = \App\Models\Card::where('name', $cardName)->first();
            
            if (!$card) {
                continue;
            }

            $this->command->info("\nAdding pricing for: {$cardName}");

            foreach ($services as $serviceName => $price) {
                $service = \App\Models\CardService::where('card_id', $card->id)
                    ->where('name', $serviceName)
                    ->first();

                if (!$service) {
                    continue;
                }

                // Get Lifetime duration
                $duration = \App\Models\ServiceDuration::where('name', 'Lifetime')->first();
                
                if (!$duration) {
                    $duration = \App\Models\ServiceDuration::create([
                        'name' => 'Lifetime',
                        'days' => 0,
                        'code' => 'lifetime',
                        'status' => 1,
                        'sort_order' => 99,
                    ]);
                }

                \App\Models\ServicePricing::updateOrCreate(
                    [
                        'card_service_id' => $service->id,
                        'duration_id' => $duration->id,
                    ],
                    [
                        'price' => $price,
                        'discount' => 0,
                        'discount_type' => 'flat',
                        'status' => 1,
                    ]
                );

                $this->command->info("  ✓ {$serviceName}: \${$price}");
            }
        }

        $this->command->info("\n✓ Gift card pricing seeded successfully!");
    }
}
