<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\CardService;
use App\Models\Category;
use App\Models\ServiceDuration;
use App\Models\ServicePricing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameHacksWithPricingSeeder extends Seeder
{
    public function run()
    {
        try {
            // Get or create category
            $category = Category::firstOrCreate(
                ['name' => 'Game Hacks'],
                [
                    'status' => 1,
                    'sort_by' => 1
                ]
            );

            // Create service durations if they don't exist
            $durations = [
                ['name' => '1 Day', 'days' => 1, 'status' => 1, 'sort_by' => 1],
                ['name' => '3 Days', 'days' => 3, 'status' => 1, 'sort_by' => 2],
                ['name' => '7 Days', 'days' => 7, 'status' => 1, 'sort_by' => 3],
                ['name' => '30 Days', 'days' => 30, 'status' => 1, 'sort_by' => 4],
            ];

            foreach ($durations as $duration) {
                ServiceDuration::firstOrCreate(
                    ['name' => $duration['name']],
                    $duration
                );
            }

            // Define games with realistic hack types
            $games = [
                [
                    'name' => 'Honor of Kings (HOK)',
                    'slug' => 'honor-of-kings',
                    'image' => 'game/hok.jpg',
                    'has_hacks' => true,
                    'hacks' => [
                        [
                            'name' => 'Drone View Only',
                            'pricing' => [
                                ['duration' => '3 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 10, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 30, 'discount' => 0],
                            ]
                        ],
                        [
                            'name' => 'Drone View + Map Hack',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                        [
                            'name' => 'Full Edition (All Features)',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                        [
                            'name' => 'Aim Assist',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                    ]
                ],
                [
                    'name' => 'Mobile Legends (MLBB)',
                    'slug' => 'mobile-legends',
                    'image' => 'game/mlbb.jpg',
                    'has_hacks' => true,
                    'hacks' => [
                        [
                            'name' => 'Drone View Only',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                        [
                            'name' => 'Drone View + Map Hack',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                        [
                            'name' => 'Full Edition (All Features)',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                        [
                            'name' => 'Skin Changer',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                        [
                            'name' => 'Auto Skill',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                    ]
                ],
                [
                    'name' => 'PUBG Mobile',
                    'slug' => 'pubg-mobile',
                    'image' => 'game/pubg.jpg',
                    'has_hacks' => true,
                    'hacks' => [
                        [
                            'name' => 'Wall Hack (ESP)',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                        [
                            'name' => 'Aimbot',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                        [
                            'name' => 'No Recoil',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                        [
                            'name' => 'Speed Hack',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                        [
                            'name' => 'Full Edition (All Features)',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                        [
                            'name' => 'Magic Bullet',
                            'pricing' => [
                                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
                            ]
                        ],
                    ]
                ],
                [
                    'name' => 'Call of Duty Mobile (CODM)',
                    'slug' => 'call-of-duty-mobile',
                    'image' => 'game/pubg.jpg', // Using PUBG image as placeholder for CODM
                    'has_hacks' => false,
                ],
                [
                    'name' => 'League of Legends: Wild Rift',
                    'slug' => 'wild-rift',
                    'image' => 'game/wildrift.jpg',
                    'has_hacks' => false,
                ],
            ];

            foreach ($games as $gameData) {
                // Create or update game card
                $imageData = null;
                if (isset($gameData['image'])) {
                    $imageData = (object)[
                        'image_driver' => 'local',
                        'image' => $gameData['image'],
                        'preview_driver' => 'local',
                        'preview' => $gameData['image'],
                    ];
                }
                
                $card = Card::updateOrCreate(
                    ['name' => $gameData['name']],
                    [
                        'category_id' => $category->id,
                        'status' => 1,
                        'trending' => 1,
                        'instant_delivery' => 1,
                        'image' => $imageData,
                        'sort_by' => Card::max('sort_by') + 1,
                    ]
                );

                $this->command->info("Created/Updated game: {$gameData['name']}");

                // Create hacks if game has them
                if ($gameData['has_hacks'] && isset($gameData['hacks'])) {
                    $randomImages = ['1.jpeg', '2.jpeg', '3.jpeg', '4.jpeg', '5.jpeg'];
                    
                    foreach ($gameData['hacks'] as $index => $hackData) {
                        // Assign a random image to each hack
                        $imageIndex = $index % count($randomImages);
                        $imagePath = 'card-service/' . $randomImages[$imageIndex];
                        
                        $service = CardService::updateOrCreate(
                            [
                                'card_id' => $card->id,
                                'name' => $hackData['name']
                            ],
                            [
                                'price' => 0, // Base price, actual pricing is in service_pricing table
                                'discount' => 0,
                                'discount_type' => 'flat',
                                'status' => 1,
                                'image' => $imagePath,
                                'image_driver' => 'local',
                                'sort_by' => $index + 1,
                            ]
                        );

                        $this->command->info("  - Created hack: {$hackData['name']}");

                        // Create pricing for each duration
                        if (isset($hackData['pricing'])) {
                            foreach ($hackData['pricing'] as $pricingData) {
                                $duration = ServiceDuration::where('name', $pricingData['duration'])->first();
                                
                                if ($duration) {
                                    ServicePricing::updateOrCreate(
                                        [
                                            'card_service_id' => $service->id,
                                            'duration_id' => $duration->id,
                                        ],
                                        [
                                            'price' => $pricingData['price'],
                                            'discount' => $pricingData['discount'],
                                            'discount_type' => 'flat',
                                            'stock_count' => 999999, // Unlimited (large number)
                                            'status' => 1,
                                        ]
                                    );

                                    $this->command->info("    * Added pricing: {$pricingData['duration']} - \${$pricingData['price']}");
                                }
                            }
                        }
                    }
                } else {
                    $this->command->info("  - No hacks for this game");
                }
            }

            $this->command->info("\n✓ Successfully seeded games with hacks and pricing!");
            
        } catch (\Exception $e) {
            $this->command->error("Error: " . $e->getMessage());
            $this->command->error("Line: " . $e->getLine());
            $this->command->error("File: " . $e->getFile());
            throw $e;
        }
    }
}
