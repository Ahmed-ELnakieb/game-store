<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
  0 => [
    'id' => 1,
    'name' => 'English',
    'short_name' => 'en',
    'flag' => 'language/yvUi6uKLtH33Nhd4t6mQwMBUAZWzkx.webp',
    'flag_driver' => 'local',
    'status' => 1,
    'rtl' => 0,
    'default_status' => 1,
    'created_at' => '2023-06-17 01:35:53',
    'updated_at' => '2025-03-03 06:06:19',
  ],
];

        DB::table('languages')->insert($data);
    }
}
