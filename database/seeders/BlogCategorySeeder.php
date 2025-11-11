<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Beginners Gamers',
                'slug' => 'beginners-gamers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Top Up',
                'slug' => 'top-up',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gift Card',
                'slug' => 'gift-card',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Announcement',
                'slug' => 'announcement',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        \DB::table('blog_categories')->insert($categories);
    }
}
