<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Gaming',
                'icon' => null,
                'type' => 'game',
                'status' => 1,
                'sort_by' => 1,
                'active_children' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mobile Top Up',
                'icon' => null,
                'type' => 'top_up',
                'status' => 1,
                'sort_by' => 2,
                'active_children' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gift Cards',
                'icon' => null,
                'type' => 'card',
                'status' => 1,
                'sort_by' => 3,
                'active_children' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
