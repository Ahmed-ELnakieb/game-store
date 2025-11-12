<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create test user for purchase testing
        User::updateOrCreate(
            ['username' => 'user'],
            [
                'firstname' => 'Test',
                'lastname' => 'User',
                'email' => 'user@test.com',
                'password' => Hash::make('000'),
                'email_verified_at' => now(),
                'status' => 1,
                'phone' => '+1234567890',
                'country' => 'US',
            ]
        );

        $this->command->info('✓ Test user created: username=user, password=000');

        // Create 10 demo users for reviews
        $demoUsers = [
            ['name' => 'John Smith', 'email' => 'john@example.com'],
            ['name' => 'Sarah Johnson', 'email' => 'sarah@example.com'],
            ['name' => 'Mike Wilson', 'email' => 'mike@example.com'],
            ['name' => 'Emily Brown', 'email' => 'emily@example.com'],
            ['name' => 'David Lee', 'email' => 'david@example.com'],
            ['name' => 'Lisa Anderson', 'email' => 'lisa@example.com'],
            ['name' => 'James Taylor', 'email' => 'james@example.com'],
            ['name' => 'Maria Garcia', 'email' => 'maria@example.com'],
            ['name' => 'Robert Martinez', 'email' => 'robert@example.com'],
            ['name' => 'Jennifer Davis', 'email' => 'jennifer@example.com'],
        ];

        foreach ($demoUsers as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                [
                    'firstname' => explode(' ', $userData['name'])[0],
                    'lastname' => explode(' ', $userData['name'])[1],
                    'username' => strtolower(str_replace(' ', '', $userData['name'])) . rand(100, 999),
                    'password' => Hash::make('password123'),
                    'email_verified_at' => now(),
                    'status' => 1,
                ]
            );
        }

        $this->command->info('✓ Created 10 demo users for reviews');
    }
}
