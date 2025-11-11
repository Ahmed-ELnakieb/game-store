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
    }
}
