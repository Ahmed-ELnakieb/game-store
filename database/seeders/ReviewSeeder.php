<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\TopUp;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('reviews')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Get all users (should be created by UserSeeder)
        $users = User::all();
        
        if ($users->isEmpty()) {
            echo "⚠️  No users found. Please run UserSeeder first.\n";
            return;
        }

        // Get all cards
        $cards = Card::all();
        
        if ($cards->isEmpty()) {
            echo "⚠️  No cards found. Please run CardSeeder first.\n";
            return;
        }

        echo "Creating reviews for {$cards->count()} cards...\n";

        // Sample review comments
        $positiveComments = [
            "Amazing service! Works perfectly and delivery was instant.",
            "Best hack I've ever used. Totally worth the money!",
            "Great quality and very reliable. Highly recommend!",
            "Works like a charm! No issues at all.",
            "Excellent service, fast delivery, and great support.",
            "This is exactly what I needed. 5 stars!",
            "Super fast delivery and the hack works perfectly!",
            "Very satisfied with this purchase. Will buy again!",
            "Outstanding quality! Better than expected.",
            "Instant delivery and works great. Thank you!",
            "Perfect! No complaints whatsoever.",
            "Absolutely love it! Works on all my devices.",
            "Great value for money. Highly recommended!",
            "Fast, reliable, and effective. What more could you ask for?",
            "This exceeded my expectations. Fantastic!",
        ];

        $goodComments = [
            "Good service, works well. Minor delay in delivery.",
            "Pretty good overall. Does what it says.",
            "Works fine, no major issues. Happy with it.",
            "Decent hack, gets the job done.",
            "Good quality for the price. Satisfied.",
            "Works as advertised. Would recommend.",
            "Solid service, no complaints.",
            "Does exactly what I needed. Good purchase.",
        ];

        $averageComments = [
            "It's okay, works but could be better.",
            "Average service. Nothing special but does the job.",
            "Works but had some minor issues initially.",
            "Decent but not the best I've used.",
            "It's alright. Does what it needs to do.",
        ];

        // Create reviews for each card
        foreach ($cards as $card) {
            // Random number of reviews per card (5-15)
            $reviewCount = rand(5, 15);
            
            echo "  Adding {$reviewCount} reviews for: {$card->name}\n";

            $totalRating = 0;

            for ($i = 0; $i < $reviewCount; $i++) {
                // Weighted random rating (more 4-5 stars)
                $rand = rand(1, 100);
                if ($rand <= 60) {
                    $rating = 5; // 60% chance
                    $comment = $positiveComments[array_rand($positiveComments)];
                } elseif ($rand <= 85) {
                    $rating = 4; // 25% chance
                    $comment = $goodComments[array_rand($goodComments)];
                } elseif ($rand <= 95) {
                    $rating = 3; // 10% chance
                    $comment = $averageComments[array_rand($averageComments)];
                } else {
                    $rating = rand(2, 3); // 5% chance
                    $comment = "Could be better. Had some issues.";
                }

                $totalRating += $rating;

                // Random user
                $user = $users->random();

                DB::table('reviews')->insert([
                    'reviewable_type' => 'App\\Models\\Card',
                    'reviewable_id' => $card->id,
                    'user_id' => $user->id,
                    'rating' => $rating,
                    'comment' => $comment,
                    'status' => 1,
                    'created_at' => now()->subDays(rand(1, 60)),
                    'updated_at' => now()->subDays(rand(1, 60)),
                ]);
            }

            // Update card's total_review and avg_rating
            $avgRating = round($totalRating / $reviewCount, 1);
            $card->update([
                'total_review' => $reviewCount,
                'avg_rating' => $avgRating,
            ]);

            echo "    ✓ Average rating: {$avgRating}/5 ({$reviewCount} reviews)\n";
        }

        // Also add reviews for top-ups if they exist
        $topUps = TopUp::all();
        
        if ($topUps->isNotEmpty()) {
            echo "\nCreating reviews for {$topUps->count()} top-ups...\n";

            foreach ($topUps as $topUp) {
                $reviewCount = rand(3, 10);
                echo "  Adding {$reviewCount} reviews for: {$topUp->name}\n";

                $totalRating = 0;

                for ($i = 0; $i < $reviewCount; $i++) {
                    $rand = rand(1, 100);
                    if ($rand <= 60) {
                        $rating = 5;
                        $comment = $positiveComments[array_rand($positiveComments)];
                    } elseif ($rand <= 85) {
                        $rating = 4;
                        $comment = $goodComments[array_rand($goodComments)];
                    } else {
                        $rating = 3;
                        $comment = $averageComments[array_rand($averageComments)];
                    }

                    $totalRating += $rating;
                    $user = $users->random();

                    DB::table('reviews')->insert([
                        'reviewable_type' => 'App\\Models\\TopUp',
                        'reviewable_id' => $topUp->id,
                        'user_id' => $user->id,
                        'rating' => $rating,
                        'comment' => $comment,
                        'status' => 1,
                        'created_at' => now()->subDays(rand(1, 60)),
                        'updated_at' => now()->subDays(rand(1, 60)),
                    ]);
                }

                $avgRating = round($totalRating / $reviewCount, 1);
                $topUp->update([
                    'total_review' => $reviewCount,
                    'avg_rating' => $avgRating,
                ]);

                echo "    ✓ Average rating: {$avgRating}/5 ({$reviewCount} reviews)\n";
            }
        }

        $totalReviews = DB::table('reviews')->count();
        echo "\n✅ Review seeder completed!\n";
        echo "Total reviews created: {$totalReviews}\n";
    }

    /**
     * Create demo users if none exist
     */
    private function createDemoUsers(): void
    {
        $demoUsers = [
            ['name' => 'John Smith', 'email' => 'john@example.com'],
            ['name' => 'Sarah Johnson', 'email' => 'sarah@example.com'],
            ['name' => 'Mike Wilson', 'email' => 'mike@example.com'],
            ['name' => 'Emily Brown', 'email' => 'emily@example.com'],
            ['name' => 'David Lee', 'email' => 'david@example.com'],
            ['name' => 'Lisa Anderson', 'email' => 'lisa@example.com'],
            ['name' => 'James Taylor', 'email' => 'james@example.com'],
            ['name' => 'Maria Garcia', 'email' => 'maria@example.com'],
        ];

        foreach ($demoUsers as $userData) {
            User::create([
                'firstname' => explode(' ', $userData['name'])[0],
                'lastname' => explode(' ', $userData['name'])[1],
                'username' => strtolower(str_replace(' ', '', $userData['name'])) . rand(100, 999),
                'email' => $userData['email'],
                'password' => bcrypt('password123'),
                'email_verified_at' => now(),
                'status' => 1,
            ]);
        }

        echo "✓ Created " . count($demoUsers) . " demo users\n";
    }
}
