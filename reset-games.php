<?php

// Reset games and related data
require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use Illuminate\Support\Facades\DB;

echo "Clearing game-related data...\n";

// Clear in correct order (respecting foreign keys)
DB::table('service_pricing')->truncate();
echo "✓ Cleared service_pricing\n";

DB::table('card_services')->truncate();
echo "✓ Cleared card_services\n";

DB::table('cards')->truncate();
echo "✓ Cleared cards\n";

// Don't truncate service_durations as they're reusable
echo "✓ Kept service_durations\n";

// Don't truncate categories as they might be used by other things
echo "✓ Kept categories\n";

echo "\nAll game data cleared successfully!\n";
echo "Now run: php artisan db:seed --class=GameHacksWithPricingSeeder\n";
