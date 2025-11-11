<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            [
                'notifyable_id' => 1,
                'notifyable_type' => 'App\Models\Admin',
                'template_email_key' => json_encode(['ADMIN_MAIL']),
                'template_sms_key' => json_encode(['ADMIN_SMS']),
                'template_in_app_key' => json_encode(['ADMIN_NOTIFICATION']),
                'template_push_key' => json_encode(['ADMIN_PUSH']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('notification_settings')->insert($settings);
    }
}
