<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\CardService;
use Illuminate\Database\Seeder;

class CardServiceSeeder extends Seeder
{
    /**
     * Seed card services (hacks for each game)
     */
    public function run()
    {
        $this->command->info("Seeding card services (hacks)...");

        $gameHacks = [
            'Honor of Kings (HOK)' => [
                [
                    'name' => 'Drone View Only',
                    'description' => "Features:\n• Drone View (God Camera)\n• Safe to use\n• Supports No Root (using Virtual/Container)\n• Supports Root Mode (SAFE)\n• Supports Kernel Mode (SAFE)\n• Hide hack for recordings\n• Honor Of Kings 64Bit Original",
                ],
                [
                    'name' => 'Drone View + Map Hack',
                    'description' => "Features:\n• MapHack\n• Drone View (God Camera)\n• ESP Player (lines/health/flash++)\n• Show enemy positions\n• Supports No Root (using Virtual/Container)\n• Supports Root Mode (SAFE)\n• Supports Kernel Mode (SAFE)\n• Hide hack for recordings",
                ],
                [
                    'name' => 'Full Edition (All Features)',
                    'description' => "Features:\n• MapHack\n• Drone View (God Camera)\n• ESP Player (lines/health/flash++)\n• ESP Monster\n• Show Cooldown (includes respawn time for all monsters, plus enemy abilities)\n• Supports No Root (using Virtual/Container - under maintenance)\n• Supports Root Mode (SAFE)\n• Supports Kernel Mode (SAFE)\n• Hide hack for recordings\n• Honor Of Kings 64Bit Original (web APK version)",
                ],
            ],
            'Mobile Legends (MLBB)' => [
                [
                    'name' => 'Drone View Only',
                    'description' => "Features:\n• Drone View (God Camera)\n• Enhanced map visibility\n• Supports No Root mode\n• Supports Root Mode (SAFE)\n• Anti-ban protection\n• Hide hack for recordings",
                ],
                [
                    'name' => 'Drone View + Map Hack',
                    'description' => "Features:\n• MapHack (reveal fog of war)\n• Drone View (God Camera)\n• ESP Player (health/position)\n• Show enemy locations\n• Supports No Root mode\n• Supports Root Mode (SAFE)\n• Anti-ban protection",
                ],
                [
                    'name' => 'Full Edition (All Features)',
                    'description' => "Features:\n• MapHack (reveal fog of war)\n• Drone View (God Camera)\n• ESP Player (health/position/skills)\n• ESP Creeps and Jungle\n• Show Cooldowns\n• Skin Changer (all skins unlocked)\n• Auto Skill (smart combo)\n• Supports No Root mode\n• Supports Root Mode (SAFE)\n• Anti-ban protection\n• Hide hack for recordings",
                ],
                [
                    'name' => 'Skin Changer',
                    'description' => "Features:\n• All hero skins unlocked\n• All elite skins available\n• All special skins available\n• Visible to you only\n• Safe to use\n• Supports No Root mode\n• Anti-ban protection",
                ],
                [
                    'name' => 'Auto Skill',
                    'description' => "Features:\n• Auto combo execution\n• Smart skill timing\n• Perfect skill rotation\n• Auto aim for skill shots\n• Customizable combos\n• Supports No Root mode\n• Anti-ban protection",
                ],
            ],
            'PUBG Mobile' => [
                [
                    'name' => 'Wall Hack (ESP)',
                    'description' => "Features:\n• ESP Players (see through walls)\n• ESP Boxes (player boxes)\n• ESP Lines (distance lines)\n• ESP Health (health bars)\n• ESP Names (player names)\n• ESP Distance (show distance)\n• Supports No Root mode\n• Anti-ban protection",
                ],
                [
                    'name' => 'Aimbot',
                    'description' => "Features:\n• Auto aim to head\n• Auto aim to body\n• Aim smoothing (looks natural)\n• Aim FOV (field of view)\n• Target lock\n• Visible check\n• Supports No Root mode\n• Anti-ban protection",
                ],
                [
                    'name' => 'No Recoil',
                    'description' => "Features:\n• Remove weapon recoil\n• Remove weapon spread\n• Perfect accuracy\n• Works with all weapons\n• Adjustable strength\n• Supports No Root mode\n• Anti-ban protection",
                ],
                [
                    'name' => 'Speed Hack',
                    'description' => "Features:\n• Increased movement speed\n• Adjustable speed multiplier\n• Safe speed limits\n• Works in vehicles\n• Supports No Root mode\n• Anti-ban protection",
                ],
                [
                    'name' => 'Full Edition (All Features)',
                    'description' => "Features:\n• ESP (see through walls)\n• Aimbot (auto aim)\n• No Recoil\n• Speed Hack\n• Magic Bullet\n• ESP Items (loot ESP)\n• ESP Vehicles\n• Radar hack\n• All features combined\n• Supports No Root mode\n• Supports Root Mode (SAFE)\n• Anti-ban protection\n• Hide hack for recordings",
                ],
                [
                    'name' => 'Magic Bullet',
                    'description' => "Features:\n• Bullets auto-hit target\n• No need to aim precisely\n• Works through obstacles\n• Adjustable range\n• Supports No Root mode\n• Anti-ban protection",
                ],
            ],
        ];

        $randomImages = ['1.jpeg', '2.jpeg', '3.jpeg', '4.jpeg', '5.jpeg'];
        $imageIndex = 0;

        foreach ($gameHacks as $gameName => $hacks) {
            $card = Card::where('name', $gameName)->first();
            
            if (!$card) {
                $this->command->warn("Game not found: {$gameName}. Skipping...");
                continue;
            }

            $this->command->info("\nAdding hacks for: {$gameName}");

            foreach ($hacks as $index => $hackData) {
                $imagePath = 'card-service/' . $randomImages[$imageIndex % count($randomImages)];
                $imageIndex++;
                
                CardService::updateOrCreate(
                    [
                        'card_id' => $card->id,
                        'name' => $hackData['name']
                    ],
                    [
                        'price' => 0,
                        'discount' => 0,
                        'discount_type' => 'flat',
                        'status' => 1,
                        'image' => $imagePath,
                        'image_driver' => 'local',
                        'description' => $hackData['description'],
                        'sort_by' => $index + 1,
                    ]
                );

                $this->command->info("  ✓ {$hackData['name']}");
            }
        }

        $this->command->info("\n✓ Card services seeded successfully!");

        // Seed Gift Card Services
        $this->command->info("\nSeeding gift card services...");

        $giftCardServices = [
            'Free Fire Hack' => [
                ['name' => 'ESP Only', 'description' => 'Features: ESP/Wallhack, Item ESP, Vehicle ESP. Safe to use with bypass enabled.'],
                ['name' => 'Aimbot + ESP', 'description' => 'Features: Aimbot, ESP/Wallhack, No Recoil. Perfect aim with visibility advantage.'],
                ['name' => 'Full Edition', 'description' => 'Features: All features included - Aimbot, ESP, Speed Hack, Auto Headshot, No Recoil.'],
            ],
            'Genshin Impact Hack' => [
                ['name' => 'Basic Edition', 'description' => 'Features: God Mode, Unlimited Stamina, Speed Hack. Essential features for exploration.'],
                ['name' => 'Advanced Edition', 'description' => 'Features: God Mode, Speed Hack, Auto Collect, Teleport, Damage Multiplier.'],
                ['name' => 'Full Edition', 'description' => 'Features: All features - God Mode, Speed, Teleport, Auto Quest, ESP, Damage Multiplier.'],
            ],
            'Valorant Hack' => [
                ['name' => 'ESP Only', 'description' => 'Features: ESP/Wallhack, Agent ESP, Spike ESP, Radar Hack. Vanguard bypass included.'],
                ['name' => 'Aimbot + ESP', 'description' => 'Features: Aimbot, ESP, Triggerbot, No Recoil. Perfect for competitive play.'],
                ['name' => 'Full Edition', 'description' => 'Features: All features - Aimbot, ESP, Triggerbot, No Recoil, Ability ESP, HWID Spoofer.'],
            ],
        ];

        // Get random images for gift card services
        $randomImages = glob(public_path('assets/upload/random/*.{jpg,jpeg,png,webp}'), GLOB_BRACE);

        foreach ($giftCardServices as $cardName => $services) {
            $card = Card::where('name', $cardName)->first();
            
            if (!$card) {
                $this->command->warn("Card not found: {$cardName}");
                continue;
            }

            $this->command->info("\nAdding services for: {$cardName}");

            foreach ($services as $index => $serviceData) {
                // Pick a random image and copy it to card-service folder
                $randomImage = $randomImages[array_rand($randomImages)];
                $extension = pathinfo($randomImage, PATHINFO_EXTENSION);
                $newImageName = 'card-service/' . slug($serviceData['name']) . '.' . $extension;
                $newImagePath = public_path('assets/upload/' . $newImageName);
                
                // Create card-service directory if it doesn't exist
                if (!file_exists(dirname($newImagePath))) {
                    mkdir(dirname($newImagePath), 0755, true);
                }
                
                // Copy the random image
                copy($randomImage, $newImagePath);

                CardService::updateOrCreate(
                    [
                        'card_id' => $card->id,
                        'name' => $serviceData['name']
                    ],
                    [
                        'description' => $serviceData['description'],
                        'image' => $newImageName,
                        'status' => 1,
                        'sort_by' => $index + 1,
                    ]
                );

                $this->command->info("  ✓ {$serviceData['name']}");
            }
        }

        $this->command->info("\n✓ Gift card services seeded successfully!");
    }
}
