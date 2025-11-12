<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DownloadFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $files = [
            // Honor of Kings (HOK)
            [
                'card_id' => 1,
                'name' => 'HOK Hack Tool v2.5',
                'description' => 'Advanced hack tool for Honor of Kings with ESP, Aimbot, and Skin Changer features.',
                'file_url' => 'https://mega.nz/file/example-hok-hack',
                'auth_username' => 'hok_user',
                'auth_password' => 'hok2024',
                'requires_auth' => true,
                'file_type' => 'hack',
                'icon' => 'fa-shield-alt',
                'file_size' => 52428800, // 50MB
                'version' => '2.5.0',
                'status' => true,
            ],
            [
                'card_id' => 1,
                'name' => 'HOK Game Client',
                'description' => 'Official Honor of Kings game client installer.',
                'file_url' => 'https://mega.nz/file/example-hok-game',
                'auth_username' => 'hok_user',
                'auth_password' => 'hok2024',
                'requires_auth' => true,
                'file_type' => 'game',
                'icon' => 'fa-gamepad',
                'file_size' => 2147483648, // 2GB
                'version' => '1.0.0',
                'status' => true,
            ],
            [
                'card_id' => 1,
                'name' => 'HOK Setup Guide',
                'description' => 'Complete installation and configuration guide for HOK hack.',
                'file_url' => 'https://drive.google.com/file/example-hok-guide',
                'auth_username' => 'hok_user',
                'auth_password' => 'hok2024',
                'requires_auth' => false,
                'file_type' => 'guide',
                'icon' => 'fa-book',
                'file_size' => 5242880, // 5MB
                'version' => '1.0',
                'status' => true,
            ],

            // Mobile Legends (MLBB)
            [
                'card_id' => 2,
                'name' => 'MLBB Injector Pro',
                'description' => 'Professional injector for Mobile Legends with anti-ban protection.',
                'file_url' => 'https://mega.nz/file/example-mlbb-injector',
                'auth_username' => 'mlbb_pro',
                'auth_password' => 'mlbb2024',
                'requires_auth' => true,
                'file_type' => 'hack',
                'icon' => 'fa-syringe',
                'file_size' => 41943040, // 40MB
                'version' => '3.2.1',
                'status' => true,
            ],
            [
                'card_id' => 2,
                'name' => 'MLBB Skin Unlocker',
                'description' => 'Unlock all skins and heroes in Mobile Legends.',
                'file_url' => 'https://mediafire.com/file/example-mlbb-skins',
                'auth_username' => 'mlbb_pro',
                'auth_password' => 'mlbb2024',
                'requires_auth' => true,
                'file_type' => 'tool',
                'icon' => 'fa-palette',
                'file_size' => 31457280, // 30MB
                'version' => '2.0.5',
                'status' => true,
            ],

            // PUBG Mobile
            [
                'card_id' => 3,
                'name' => 'PUBG ESP Hack',
                'description' => 'ESP wallhack for PUBG Mobile with item and player detection.',
                'file_url' => 'https://mega.nz/file/example-pubg-esp',
                'auth_username' => 'pubg_elite',
                'auth_password' => 'pubg2024',
                'requires_auth' => true,
                'file_type' => 'hack',
                'icon' => 'fa-crosshairs',
                'file_size' => 67108864, // 64MB
                'version' => '4.1.0',
                'status' => true,
            ],
            [
                'card_id' => 3,
                'name' => 'PUBG Recoil Control',
                'description' => 'No recoil script for all weapons in PUBG Mobile.',
                'file_url' => 'https://drive.google.com/file/example-pubg-recoil',
                'auth_username' => 'pubg_elite',
                'auth_password' => 'pubg2024',
                'requires_auth' => true,
                'file_type' => 'tool',
                'icon' => 'fa-bullseye',
                'file_size' => 10485760, // 10MB
                'version' => '1.5.2',
                'status' => true,
            ],

            // Call of Duty Mobile (CODM)
            [
                'card_id' => 4,
                'name' => 'CODM Aimbot Pro',
                'description' => 'Advanced aimbot with customizable settings for Call of Duty Mobile.',
                'file_url' => 'https://mega.nz/file/example-codm-aimbot',
                'auth_username' => 'codm_master',
                'auth_password' => 'codm2024',
                'requires_auth' => true,
                'file_type' => 'hack',
                'icon' => 'fa-target',
                'file_size' => 73400320, // 70MB
                'version' => '5.0.3',
                'status' => true,
            ],
            [
                'card_id' => 4,
                'name' => 'CODM Mod Menu',
                'description' => 'Complete mod menu with multiple features for CODM.',
                'file_url' => 'https://mediafire.com/file/example-codm-mod',
                'auth_username' => 'codm_master',
                'auth_password' => 'codm2024',
                'requires_auth' => true,
                'file_type' => 'hack',
                'icon' => 'fa-bars',
                'file_size' => 94371840, // 90MB
                'version' => '3.8.0',
                'status' => true,
            ],

            // League of Legends: Wild Rift
            [
                'card_id' => 5,
                'name' => 'Wild Rift Script',
                'description' => 'Auto-play script with advanced AI for Wild Rift.',
                'file_url' => 'https://mega.nz/file/example-wildrift-script',
                'auth_username' => 'wr_legend',
                'auth_password' => 'wildrift2024',
                'requires_auth' => true,
                'file_type' => 'hack',
                'icon' => 'fa-robot',
                'file_size' => 36700160, // 35MB
                'version' => '2.3.1',
                'status' => true,
            ],

            // Free Fire Hack
            [
                'card_id' => 6,
                'name' => 'Free Fire Mega Mod',
                'description' => 'All-in-one mod for Free Fire with unlimited features.',
                'file_url' => 'https://mega.nz/file/example-freefire-mega',
                'auth_username' => 'ff_king',
                'auth_password' => 'freefire2024',
                'requires_auth' => true,
                'file_type' => 'hack',
                'icon' => 'fa-fire',
                'file_size' => 83886080, // 80MB
                'version' => '6.2.0',
                'status' => true,
            ],
            [
                'card_id' => 6,
                'name' => 'Free Fire Headshot Tool',
                'description' => 'Auto headshot tool for Free Fire.',
                'file_url' => 'https://drive.google.com/file/example-ff-headshot',
                'auth_username' => 'ff_king',
                'auth_password' => 'freefire2024',
                'requires_auth' => true,
                'file_type' => 'tool',
                'icon' => 'fa-skull',
                'file_size' => 20971520, // 20MB
                'version' => '1.9.0',
                'status' => true,
            ],

            // Genshin Impact Hack
            [
                'card_id' => 7,
                'name' => 'Genshin Primogem Generator',
                'description' => 'Generate unlimited primogems for Genshin Impact.',
                'file_url' => 'https://mega.nz/file/example-genshin-primo',
                'auth_username' => 'genshin_god',
                'auth_password' => 'genshin2024',
                'requires_auth' => true,
                'file_type' => 'hack',
                'icon' => 'fa-gem',
                'file_size' => 52428800, // 50MB
                'version' => '3.5.0',
                'status' => true,
            ],
            [
                'card_id' => 7,
                'name' => 'Genshin Auto Farm Bot',
                'description' => 'Automated farming bot for resources and materials.',
                'file_url' => 'https://mediafire.com/file/example-genshin-bot',
                'auth_username' => 'genshin_god',
                'auth_password' => 'genshin2024',
                'requires_auth' => true,
                'file_type' => 'tool',
                'icon' => 'fa-tractor',
                'file_size' => 41943040, // 40MB
                'version' => '2.1.3',
                'status' => true,
            ],

            // Valorant Hack
            [
                'card_id' => 8,
                'name' => 'Valorant Triggerbot',
                'description' => 'Advanced triggerbot for Valorant with customizable delay.',
                'file_url' => 'https://mega.nz/file/example-valorant-trigger',
                'auth_username' => 'val_pro',
                'auth_password' => 'valorant2024',
                'requires_auth' => true,
                'file_type' => 'hack',
                'icon' => 'fa-bolt',
                'file_size' => 62914560, // 60MB
                'version' => '4.3.2',
                'status' => true,
            ],
            [
                'card_id' => 8,
                'name' => 'Valorant Radar Hack',
                'description' => 'External radar showing all enemy positions.',
                'file_url' => 'https://drive.google.com/file/example-valorant-radar',
                'auth_username' => 'val_pro',
                'auth_password' => 'valorant2024',
                'requires_auth' => true,
                'file_type' => 'hack',
                'icon' => 'fa-radar',
                'file_size' => 31457280, // 30MB
                'version' => '2.7.1',
                'status' => true,
            ],
        ];

        foreach ($files as $file) {
            \App\Models\DownloadFile::create($file);
        }

        $this->command->info('Download files seeded successfully!');
    }
}
