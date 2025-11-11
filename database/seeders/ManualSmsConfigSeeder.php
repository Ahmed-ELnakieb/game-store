<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManualSmsConfigSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
  0 => [
    'id' => 1,
    'action_method' => 'GET',
    'action_url' => 'https://rest.nexmo.com/sms/json',
    'header_data' => NULL,
    'param_data' => NULL,
    'form_data' => NULL,
    'created_at' => '2024-08-08 14:12:56',
    'updated_at' => '2025-03-03 10:05:00',
  ],
];

        DB::table('manual_sms_configs')->insert($data);
    }
}
