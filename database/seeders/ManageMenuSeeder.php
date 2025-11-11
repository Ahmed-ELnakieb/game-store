<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManageMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            [
                'menu_section' => 'header',
                'theme' => 'light',
                'menu_items' => json_encode(['home', 'Card', 'blog', 'Buy', 'contact']),
                'created_at' => '2023-10-16 09:54:10',
                'updated_at' => '2024-12-31 14:31:32',
            ],
            [
                'menu_section' => 'footer',
                'theme' => 'light',
                'menu_items' => json_encode([
                    'useful_link' => ['blog'],
                    'support_link' => ['privacy &amp; policy', 'terms &amp; conditions']
                ]),
                'created_at' => '2023-10-16 09:54:10',
                'updated_at' => '2024-12-18 13:28:56',
            ],
            [
                'menu_section' => 'header',
                'theme' => 'dark',
                'menu_items' => json_encode(['home', 'Card', 'blog', 'Buy', 'contact']),
                'created_at' => '2023-10-16 09:54:10',
                'updated_at' => '2025-02-05 07:16:45',
            ],
            [
                'menu_section' => 'footer',
                'theme' => 'dark',
                'menu_items' => json_encode([
                    'useful_link' => ['blog', 'contact'],
                    'support_link' => ['privacy &amp; policy', 'terms &amp; conditions']
                ]),
                'created_at' => '2023-10-16 09:54:10',
                'updated_at' => '2024-12-14 07:05:51',
            ],
        ];

        \DB::table('manage_menus')->insert($menus);
    }
}
