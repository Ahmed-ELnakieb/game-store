<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\CardService;
use App\Models\Category;
use App\Models\ServiceDuration;
use App\Models\ServicePricing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompleteGameHacksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, seed durations
        $this->call(ServiceDurationSeeder::class);

        // Get or create Game Hacks category
        $category = Category::firstOrCreate(
            ['name' => 'Game Hacks', 'type' => 'card'],
            [
                'icon' => 'fas fa-gamepad',
                'status' => 1,
                'sort_by' => 1,
            ]
        );

        // Sample games with their hacks
        $games = [
            [
                'name' => 'PUBG Mobile',
                'slug' => 'pubg-mobile',
                'region' => 'Global',
                'instant_delivery' => 1,
                'note' => 'Instant delivery after payment. Works on all devices.',
                'hacks' => [
                    [
                        'name' => 'Aimbot',
                        'pricing' => [
                            ['duration' => '1D', 'price' => 3.00, 'discount' => 0],
                            ['duration' => '7D', 'price' => 15.00, 'discount' => 10, 'discount_type' => 'percentage'],
                            ['duration' => '30D', 'price' => 40.00, 'discount' => 15, 'discount_type' => 'percentage'],
                        ]
                    ],
                    [
                        'name' => 'Wallhack',
                        'pricing' => [
                            ['duration' => '1D', 'price' => 2.50, 'discount' => 0],
                            ['duration' => '7D', 'price' => 12.00, 'discount' => 0],
                            ['duration' => '30D', 'price' => 35.00, 'discount' => 5.00, 'discount_type' => 'flat'],
                        ]
                    ],
                    [
                        'name' => 'Radar Hack',
                        'pricing' => [
                            ['duration' => '1D', 'price' => 2.00, 'discount' => 0],
                            ['duration' => '7D', 'price' => 10.00, 'discount' => 0],
                            ['duration' => '30D', 'price' => 30.00, 'discount' => 0],
                        ]
                    ],
                ]
            ],
            [
                'name' => 'Call of Duty Mobile',
                'slug' => 'cod-mobile',
                'region' => 'Global',
                'instant_delivery' => 1,
                'note' => 'Premium hacks with anti-ban protection.',
                'hacks' => [
                    [
                        'name' => 'Aimbot Pro',
                        'pricing' => [
                            ['duration' => '1D', 'price' => 4.00, 'discount' => 0],
                            ['duration' => '7D', 'price' => 20.00, 'discount' => 15, 'discount_type' => 'percentage'],
                            ['duration' => '30D', 'price' => 50.00, 'discount' => 20, 'discount_type' => 'percentage'],
                        ]
                    ],
                    [
                        'name' => 'ESP Hack',
                        'pricing' => [
                            ['duration' => '1D', 'price' => 3.50, 'discount' => 0],
                            ['duration' => '7D', 'price' => 18.00, 'discount' => 0],
                            ['duration' => '30D', 'price' => 45.00, 'discount' => 10, 'discount_type' => 'percentage'],
                        ]
                    ],
                ]
            ],
            [
                'name' => 'Free Fire',
                'slug' => 'free-fire',
                'region' => 'Global',
                'instant_delivery' => 1,
                'note' => 'Safe and undetectable hacks.',
                'hacks' => [
                    [
                        'name' => 'Auto Headshot',
                        'pricing' => [
                            ['duration' => '1D', 'price' => 2.50, 'discount' => 0],
                            ['duration' => '7D', 'price' => 13.00, 'discount' => 0],
                            ['duration' => '30D', 'price' => 38.00, 'discount' => 8.00, 'discount_type' => 'flat'],
                        ]
                    ],
                    [
                        'name' => 'Speed Hack',
                        'pricing' => [
                            ['duration' => '1D', 'price' => 2.00, 'discount' => 0],
                            ['duration' => '7D', 'price' => 11.00, 'discount' => 0],
                            ['duration' => '30D', 'price' => 32.00, 'discount' => 0],
                        ]
                    ],
                ]
            ],
        ];

        // Get all durations
        $durations = ServiceDuration::all()->keyBy('code');

        foreach ($games as $gameData) {
            echo "Creating game: {$gameData['name']}\n";

            // Create game card
            $card = Card::create([
                'category_id' => $category->id,
                'name' => $gameData['name'],
                'slug' => $gameData['slug'],
                'region' => $gameData['region'],
                'instant_delivery' => $gameData['instant_delivery'],
                'note' => $gameData['note'],
                'status' => 1,
                'image' => json_encode([
                    'image' => 'default.png',
                    'image_driver' => 'local',
                    'preview' => 'default.png',
                    'preview_driver' => 'local',
                ]),
            ]);

            // Create hacks for this game
            foreach ($gameData['hacks'] as $hackData) {
                echo "  Creating hack: {$hackData['name']}\n";

                // Create service without triggering image upload
                $service = new CardService();
                $service->card_id = $card->id;
                $service->name = $hackData['name'];
                $service->status = 1;
                $service->price = 0; // Legacy field
                $service->discount = 0; // Legacy field
                $service->discount_type = 'flat';
                $service->save();

                // Create pricing for each duration
                foreach ($hackData['pricing'] as $pricingData) {
                    $duration = $durations[$pricingData['duration']];
                    
                    echo "    Adding pricing: {$duration->name} - \${$pricingData['price']}\n";

                    ServicePricing::create([
                        'card_service_id' => $service->id,
                        'duration_id' => $duration->id,
                        'price' => $pricingData['price'],
                        'discount' => $pricingData['discount'],
                        'discount_type' => $pricingData['discount_type'] ?? 'flat',
                        'stock_count' => rand(50, 200), // Random stock for demo
                        'status' => 1,
                    ]);
                }
            }
        }

        echo "\n✅ Complete game hacks seeder finished!\n";
        echo "Created:\n";
        echo "  - " . count($games) . " games\n";
        echo "  - " . collect($games)->sum(fn($g) => count($g['hacks'])) . " hack types\n";
        echo "  - Multiple pricing options per hack\n";
    }
}
