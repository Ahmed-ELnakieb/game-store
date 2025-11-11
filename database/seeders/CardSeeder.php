<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Seed game cards (HOK, MLBB, PUBG, CODM, Wild Rift)
     */
    public function run()
    {
        $this->command->info("Seeding game cards...");
        
        // Get Game Hacks category
        $category = Category::where('name', 'Game Hacks')->first();
        
        if (!$category) {
            $this->command->error("Game Hacks category not found! Run CategorySeeder first.");
            return;
        }

        $games = [
            [
                'name' => 'Honor of Kings (HOK)',
                'slug' => 'honor-of-kings',
                'image' => 'game/hok.jpg',
                'note' => 'Safe to use with bypass enabled. Make sure to follow the installation guide carefully. Use at your own risk.',
                'description' => "Honor of Kings is a popular MOBA game. Our hacks provide you with advanced features to enhance your gameplay experience.\n\nAll our hacks are:\n• Regularly updated for the latest game version\n• Tested for safety and stability\n• Protected with anti-ban technology\n• Easy to install and use\n• Compatible with both rooted and non-rooted devices\n\nChoose from our range of hacks based on your needs - from basic Drone View to Full Edition with all features included.",
                'guide' => "Installation Guide:\n\n1. Download the hack file after purchase\n2. Extract the files to your device\n3. Follow the specific installation method:\n\nFor No Root Mode:\n• Install Virtual Space or similar container app\n• Clone the game inside the container\n• Apply the hack through the container\n\nFor Root Mode:\n• Grant root access to the hack app\n• Install the module\n• Reboot your device\n• Launch the game\n\nFor Kernel Mode:\n• Flash the kernel module\n• Configure settings\n• Launch the game\n\nImportant Tips:\n• Always use the latest version\n• Don't use multiple hacks simultaneously\n• Test on a secondary account first\n• Keep the hack hidden during recordings\n• Follow all safety guidelines\n\nFor support, contact us through our support channel.",
            ],
            [
                'name' => 'Mobile Legends (MLBB)',
                'slug' => 'mobile-legends',
                'image' => 'game/mlbb.jpg',
                'note' => 'Safe to use with bypass enabled. Always use the latest version for best protection. Use at your own risk.',
                'description' => "Mobile Legends: Bang Bang is one of the most popular mobile MOBA games. Our hacks give you the competitive edge you need.\n\nFeatures across all hacks:\n• MapHack to reveal enemy positions\n• Drone View for better map awareness\n• ESP features for player tracking\n• Skin Changer for cosmetic customization\n• Auto Skill for perfect combos\n• Anti-ban protection built-in\n• Regular updates for new patches\n\nWhether you're a casual player or competitive gamer, we have the right hack for you.",
                'guide' => "Installation Guide:\n\n1. Purchase and download your chosen hack\n2. Backup your game data (recommended)\n3. Choose your installation method:\n\nNo Root Installation:\n• Download Parallel Space or VirtualXposed\n• Clone Mobile Legends inside\n• Install the hack module\n• Launch the game from the virtual space\n\nRoot Installation:\n• Grant root permissions\n• Install the hack module\n• Configure your preferred settings\n• Launch Mobile Legends\n\nConfiguration Tips:\n• Start with basic features\n• Gradually enable advanced features\n• Adjust ESP settings for visibility\n• Configure skin changer preferences\n• Set up auto-skill combos\n\nSafety Recommendations:\n• Use on secondary accounts initially\n• Don't overuse obvious features\n• Keep hack updated\n• Enable anti-detection features\n• Hide hack during streaming\n\nNeed help? Contact our 24/7 support team.",
            ],
            [
                'name' => 'PUBG Mobile',
                'slug' => 'pubg-mobile',
                'image' => 'game/pubg.jpg',
                'note' => 'Safe to use with bypass enabled. Recommended to use on secondary accounts first. Use at your own risk.',
                'description' => "PUBG Mobile is the ultimate battle royale experience. Our hacks help you survive longer and win more matches.\n\nAvailable Features:\n• ESP/Wallhack - See enemies through walls\n• Aimbot - Perfect aim assistance\n• No Recoil - Eliminate weapon recoil\n• Speed Hack - Move faster than opponents\n• Magic Bullet - Bullets auto-hit targets\n• Item ESP - Find the best loot\n• Vehicle ESP - Locate vehicles easily\n\nAll hacks include:\n• Advanced anti-ban protection\n• Bypass for latest security updates\n• Customizable settings\n• Regular updates for new seasons\n• Safe to use with proper configuration\n\nDominate the battlefield with our premium hacks!",
                'guide' => "Installation Guide:\n\n1. Download your purchased hack\n2. Prepare your device:\n\nFor No Root Users:\n• Install a game cloner app (recommended: Parallel Space)\n• Clone PUBG Mobile\n• Install hack in the cloned space\n• Launch from cloner app\n\nFor Root Users:\n• Enable root access\n• Install hack module\n• Grant necessary permissions\n• Configure settings\n• Launch PUBG Mobile\n\nConfiguration Guide:\n• ESP Settings: Adjust colors and distance\n• Aimbot: Set FOV and smoothness\n• No Recoil: Choose weapons to apply\n• Speed Hack: Use safe multipliers (1.5x-2x)\n• Magic Bullet: Set range limits\n\nSafety Guidelines:\n• ALWAYS test on secondary account first\n• Use conservative settings in ranked\n• Don't make it obvious (no flying, teleporting)\n• Update hack before each game session\n• Enable bypass features\n• Disable during tournaments\n\nTroubleshooting:\n• Game crashes: Lower hack settings\n• Detection warning: Update to latest version\n• Features not working: Check compatibility\n\nSupport available 24/7 for any issues.",
            ],
            [
                'name' => 'Call of Duty Mobile (CODM)',
                'slug' => 'call-of-duty-mobile',
                'image' => 'game/pubg.jpg',
                'note' => 'Coming soon! Safe hacks with bypass protection will be available shortly.',
                'description' => "Call of Duty Mobile hacks are currently in development.\n\nPlanned features:\n• ESP/Wallhack\n• Aimbot with customization\n• No Recoil\n• Radar hack\n• And much more!\n\nStay tuned for updates. Subscribe to our newsletter to be notified when CODM hacks are available.",
                'guide' => "Installation guide will be available once the hacks are released.\n\nIn the meantime:\n• Follow our social media for updates\n• Join our Discord community\n• Check back regularly for announcements\n\nExpected release: Coming soon!",
            ],
            [
                'name' => 'League of Legends: Wild Rift',
                'slug' => 'wild-rift',
                'image' => 'game/wildrift.jpg',
                'note' => 'Coming soon! Safe hacks with bypass protection will be available shortly.',
                'description' => "Wild Rift hacks are in active development.\n\nPlanned features:\n• MapHack\n• Drone View\n• ESP for champions and jungle\n• Skill cooldown tracker\n• Auto combo system\n• Skin unlocker\n\nWe're working hard to bring you the best Wild Rift hacks with maximum safety. Subscribe to get notified on release!",
                'guide' => "Installation guide will be provided upon release.\n\nWhat to expect:\n• Easy installation process\n• Multiple installation methods (Root/No Root)\n• Detailed configuration guide\n• Safety tips and best practices\n• 24/7 support\n\nFollow us for updates on the release date!",
            ],
        ];

        foreach ($games as $index => $gameData) {
            $imageData = null;
            if (isset($gameData['image'])) {
                $imageData = (object)[
                    'image_driver' => 'local',
                    'image' => $gameData['image'],
                    'preview_driver' => 'local',
                    'preview' => $gameData['image'],
                ];
            }
            
            Card::updateOrCreate(
                ['name' => $gameData['name']],
                [
                    'category_id' => $category->id,
                    'status' => 1,
                    'trending' => 1,
                    'instant_delivery' => 1,
                    'image' => $imageData,
                    'note' => $gameData['note'],
                    'description' => $gameData['description'],
                    'guide' => $gameData['guide'],
                    'sort_by' => $index + 1,
                ]
            );

            $this->command->info("✓ Created: {$gameData['name']}");
        }

        $this->command->info("\n✓ Game cards seeded successfully!");

        // Seed Gift Cards with random images
        $this->command->info("\nSeeding gift cards...");
        
        $giftCardCategory = Category::where('name', 'Gift Cards')->first();
        
        if (!$giftCardCategory) {
            $this->command->error("Gift Cards category not found!");
            return;
        }

        $giftCards = [
            [
                'name' => 'Free Fire Hack',
                'slug' => 'free-fire-hack',
                'note' => 'Safe to use with bypass enabled. Undetected 2025. Use at your own risk.',
                'description' => "Free Fire hacks provide advanced features to dominate every match.\n\nAvailable Features:\n• ESP/Wallhack - See enemies through walls\n• Aimbot - Perfect aim assistance\n• No Recoil - Eliminate weapon recoil\n• Speed Hack - Move faster than opponents\n• Auto Headshot - Instant kills\n• Item ESP - Find the best loot\n• Vehicle ESP - Locate vehicles easily\n\nAll hacks include:\n• Advanced anti-ban protection\n• Bypass for latest security updates\n• Customizable settings\n• Regular updates for new seasons\n• Safe to use with proper configuration\n• Supports No Root mode\n• Supports Root Mode (SAFE)\n\nDominate Free Fire with our premium hacks!",
                'guide' => "Installation Guide:\n\n1. Download your purchased hack\n2. Prepare your device:\n\nFor No Root Users:\n• Install a game cloner app (recommended: Parallel Space)\n• Clone Free Fire\n• Install hack in the cloned space\n• Launch from cloner app\n\nFor Root Users:\n• Enable root access\n• Install hack module\n• Grant necessary permissions\n• Configure settings\n• Launch Free Fire\n\nConfiguration Guide:\n• ESP Settings: Adjust colors and distance\n• Aimbot: Set FOV and smoothness\n• No Recoil: Choose weapons to apply\n• Speed Hack: Use safe multipliers (1.5x-2x)\n• Auto Headshot: Set range limits\n\nSafety Guidelines:\n• ALWAYS test on secondary account first\n• Use conservative settings in ranked\n• Don't make it obvious\n• Update hack before each game session\n• Enable bypass features\n\nFor support, contact us 24/7.",
            ],
            [
                'name' => 'Genshin Impact Hack',
                'slug' => 'genshin-impact-hack',
                'note' => 'Safe to use with bypass enabled. Always use latest version. Use at your own risk.',
                'description' => "Genshin Impact hacks enhance your adventure in Teyvat.\n\nAvailable Features:\n• God Mode - Invincibility\n• Unlimited Stamina - Never get tired\n• Speed Hack - Fast travel\n• Auto Collect - Gather items automatically\n• Teleport - Move anywhere instantly\n• Damage Multiplier - One-shot enemies\n• ESP - See chests and resources\n• Auto Quest - Complete quests automatically\n\nAll hacks include:\n• Anti-ban protection built-in\n• Regular updates for new patches\n• Customizable settings\n• Safe to use with proper configuration\n• Supports PC and Mobile\n• Hide hack for recordings\n• Easy to install and use\n\nExplore Teyvat with unlimited power!",
                'guide' => "Installation Guide:\n\n1. Purchase and download your chosen hack\n2. Backup your game data (recommended)\n3. Choose your installation method:\n\nFor PC Installation:\n• Extract hack files\n• Run as administrator\n• Inject into game process\n• Configure your settings\n• Launch Genshin Impact\n\nFor Mobile Installation:\n• Download APK mod\n• Enable unknown sources\n• Install modified APK\n• Launch game\n\nConfiguration Tips:\n• Start with basic features\n• Gradually enable advanced features\n• Adjust speed multipliers carefully\n• Configure ESP settings for visibility\n• Set damage multiplier to reasonable levels\n\nSafety Recommendations:\n• Use on secondary accounts initially\n• Don't overuse obvious features\n• Keep hack updated\n• Enable anti-detection features\n• Hide hack during streaming\n\nFor support, contact us 24/7.",
            ],
            [
                'name' => 'Valorant Hack',
                'slug' => 'valorant-hack',
                'note' => 'Undetected 2025. Bypass Vanguard protection. Use at your own risk.',
                'description' => "Valorant hacks give you the competitive edge in every match.\n\nAvailable Features:\n• ESP/Wallhack - See enemies through walls\n• Aimbot - Perfect precision\n• Triggerbot - Auto shoot when on target\n• No Recoil - Perfect spray control\n• Radar Hack - Mini-map ESP\n• Agent ESP - See all agents\n• Spike ESP - Locate spike instantly\n• Ability ESP - See enemy abilities\n\nAll hacks include:\n• Vanguard bypass technology\n• Advanced anti-ban protection\n• Customizable settings\n• Regular updates for new patches\n• HWID spoofer included\n• Safe to use with proper configuration\n• Kernel-level protection\n\nDominate Valorant with undetected hacks!",
                'guide' => "Installation Guide:\n\n1. Download your purchased hack\n2. Prepare your system:\n\nBefore Installation:\n• Disable Windows Defender\n• Disable any antivirus\n• Close Valorant and Riot Vanguard\n• Restart your PC\n\nInstallation Steps:\n• Run loader as administrator\n• Login with your credentials\n• Select Valorant from game list\n• Click 'Inject'\n• Wait for injection confirmation\n• Launch Valorant\n\nConfiguration Guide:\n• ESP Settings: Adjust colors, distance, and visibility\n• Aimbot: Set FOV, smoothness, and target selection\n• Triggerbot: Configure delay and target priority\n• No Recoil: Enable for specific weapons\n• Radar: Customize size and position\n\nSafety Guidelines:\n• ALWAYS use HWID spoofer\n• Test on secondary account first\n• Use conservative settings in competitive\n• Don't rage hack (obvious cheating)\n• Update before each session\n• Enable all anti-detection features\n\nFor support, contact us 24/7.",
            ],
        ];

        // Get random images
        $randomImages = glob(public_path('assets/upload/random/*.{jpg,jpeg,png,webp}'), GLOB_BRACE);
        
        foreach ($giftCards as $index => $cardData) {
            // Pick a random image and copy it to card folder
            $randomImage = $randomImages[array_rand($randomImages)];
            $extension = pathinfo($randomImage, PATHINFO_EXTENSION);
            $newImageName = 'card/' . slug($cardData['name']) . '.' . $extension;
            $newImagePath = public_path('assets/upload/' . $newImageName);
            
            // Create card directory if it doesn't exist
            if (!file_exists(dirname($newImagePath))) {
                mkdir(dirname($newImagePath), 0755, true);
            }
            
            // Copy the random image
            copy($randomImage, $newImagePath);
            
            $imageData = (object)[
                'image_driver' => 'local',
                'image' => $newImageName,
                'preview_driver' => 'local',
                'preview' => $newImageName,
            ];
            
            Card::updateOrCreate(
                ['name' => $cardData['name']],
                [
                    'category_id' => $giftCardCategory->id,
                    'status' => 1,
                    'trending' => 0,
                    'instant_delivery' => 1,
                    'image' => $imageData,
                    'note' => $cardData['note'],
                    'description' => $cardData['description'],
                    'guide' => $cardData['guide'],
                    'sort_by' => $index + 1,
                ]
            );

            $this->command->info("✓ Created: {$cardData['name']} (using {$newImageName})");
        }

        $this->command->info("\n✓ Gift cards seeded successfully!");
        
        // Update category active_children counts
        $this->updateCategoryCounts();
    }
    
    /**
     * Update the active_children count for all categories
     */
    private function updateCategoryCounts()
    {
        $this->command->info("\nUpdating category counts...");
        
        $categories = Category::all();
        
        foreach ($categories as $category) {
            $count = Card::where('category_id', $category->id)
                ->where('status', 1)
                ->count();
            
            $category->update(['active_children' => $count]);
            
            $this->command->info("✓ {$category->name}: {$count} cards");
        }
        
        $this->command->info("✓ Category counts updated!");
    }
}
