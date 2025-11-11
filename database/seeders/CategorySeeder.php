<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            // Games Category - All game hacks go here
            [
                'id' => 1,
                'name' => 'Games',
                'icon' => null,
                'type' => 'card',
                'status' => 1,
                'sort_by' => 1,
                'parent_id' => null,
                'active_children' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Gift Cards Category
            [
                'id' => 2,
                'name' => 'Gift Cards',
                'icon' => null,
                'type' => 'card',
                'status' => 1,
                'sort_by' => 2,
                'parent_id' => null,
                'active_children' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
