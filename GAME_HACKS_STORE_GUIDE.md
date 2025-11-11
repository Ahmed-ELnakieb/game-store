# Game Hacks Store - Complete Guide

## Overview
This is a Laravel-based e-commerce platform for selling game hacks/cheats with duration-based pricing. The system supports multiple games, various hack types, and flexible pricing options.

---

## System Architecture

### Core Entities
1. **Cards (Games)** - The main games (HOK, MLBB, PUBG, etc.)
2. **Card Services (Hacks)** - Different hack types for each game
3. **Service Durations** - Time periods (1 day, 7 days, 30 days)
4. **Service Pricing** - Prices for each hack + duration combination
5. **Codes** - Activation keys for purchased hacks
6. **Coupons** - Discount codes

### Database Structure
```
cards (games)
├── id
├── name (e.g., "Honor of Kings")
├── slug
├── image (JSON: {image_driver, image, preview_driver, preview})
├── category_id
└── status

card_services (hacks)
├── id
├── card_id (foreign key to cards)
├── name (e.g., "Drone View Only")
├── image
├── image_driver
└── status

service_durations
├── id
├── name (e.g., "7 Days")
├── days
└── status

service_pricing
├── id
├── card_service_id (foreign key to card_services)
├── duration_id (foreign key to service_durations)
├── price
├── discount
├── discount_type (flat/percentage)
├── stock_count
└── status
```

---

## Current Setup

### Games Available
1. **Honor of Kings (HOK)** - 4 hacks
   - Drone View Only (Premium pricing)
   - Drone View + Map Hack
   - Full Edition (All Features)
   - Aim Assist

2. **Mobile Legends (MLBB)** - 5 hacks
   - Drone View Only
   - Drone View + Map Hack
   - Full Edition (All Features)
   - Skin Changer
   - Auto Skill

3. **PUBG Mobile** - 6 hacks
   - Wall Hack (ESP)
   - Aimbot
   - No Recoil
   - Speed Hack
   - Full Edition (All Features)
   - Magic Bullet

4. **Call of Duty Mobile (CODM)** - No hacks yet
5. **League of Legends: Wild Rift** - No hacks yet

### Pricing Structure
- **HOK Drone View Only**: 3 days ($5), 7 days ($10), 30 days ($30)
- **All other hacks**: 1 day ($2), 7 days ($5), 30 days ($15)

### Discount Coupons
- WELCOME10 - 10% off
- SAVE5 - $5 flat discount
- MEGA20 - 20% off
- FIRSTBUY - 15% off
- VIP50 - 50% off
- UNLIMITED5 - 5% off (unlimited use)

---

## File Locations

### Seeders
- `database/seeders/GameHacksWithPricingSeeder.php` - Main seeder for games, hacks, and pricing
- `database/seeders/DiscountCouponSeeder.php` - Coupon seeder
- `database/seeders/CompleteGameSetupSeeder.php` - Master seeder that runs both

### Controllers
- `app/Http/Controllers/Admin/Module/CardServiceController.php` - Manage hacks
- `app/Http/Controllers/Admin/Module/ServicePricingController.php` - Manage pricing
- `app/Http/Controllers/Frontend/CardController.php` - Frontend game display

### Models
- `app/Models/Card.php` - Game model
- `app/Models/CardService.php` - Hack model
- `app/Models/ServiceDuration.php` - Duration model
- `app/Models/ServicePricing.php` - Pricing model

### Views
- `resources/views/admin/card/service/pricing.blade.php` - Pricing management page
- `resources/views/themes/dark/frontend/card/details.blade.php` - Game details page

### Routes
- `routes/module/admin-module.php` - Admin routes for games, hacks, and pricing

---

## How to Use

### Running the Seeder
```bash
# Run complete setup (games + hacks + pricing + coupons)
php artisan db:seed --class=CompleteGameSetupSeeder

# Or run individually
php artisan db:seed --class=GameHacksWithPricingSeeder
php artisan db:seed --class=DiscountCouponSeeder
```

### Clearing Cache
```bash
php artisan cache:clear
php artisan optimize:clear
```

### Admin Access
1. Navigate to `/admin` (or your configured admin prefix)
2. Go to **Card** section to manage games
3. Click on a game to manage its hacks
4. Click "Manage Pricing" on any hack to set duration-based prices

---

## Adding New Content

### Adding a New Game
Edit `database/seeders/GameHacksWithPricingSeeder.php`:

```php
[
    'name' => 'Your Game Name',
    'slug' => 'your-game-slug',
    'image' => 'game/your-image.jpg', // Place image in public/assets/upload/game/
    'has_hacks' => true,
    'hacks' => [
        [
            'name' => 'Hack Name',
            'pricing' => [
                ['duration' => '1 Day', 'price' => 2, 'discount' => 0],
                ['duration' => '7 Days', 'price' => 5, 'discount' => 0],
                ['duration' => '30 Days', 'price' => 15, 'discount' => 0],
            ]
        ],
    ]
]
```

### Adding a New Hack to Existing Game
Add to the game's `hacks` array in the seeder.

### Adding a New Duration
Edit `database/seeders/GameHacksWithPricingSeeder.php` in the durations array:

```php
['name' => '14 Days', 'days' => 14, 'status' => 1, 'sort_by' => 5],
```

---

## Image Management

### Image Locations
- **Game images**: `public/assets/upload/game/` AND `assets/upload/game/`
- **Hack images**: `public/assets/upload/card-service/` AND `assets/upload/card-service/`
- **Random images**: `public/assets/upload/random/` (source for hack images)

### Image Structure for Games
```json
{
  "image_driver": "local",
  "image": "game/hok.jpg",
  "preview_driver": "local",
  "preview": "game/hok.jpg"
}
```

### Image Structure for Hacks
- `image`: "card-service/1.jpeg"
- `image_driver`: "local"

---

## Important Notes

### Storage Configuration
The Laravel storage 'local' disk points to `assets/upload/` (project root), not `public/assets/upload/`. Images must exist in both locations:
- `public/assets/upload/` - For direct web access
- `assets/upload/` - For Laravel Storage disk

### Image Helper Function
The `getFile($driver, $path)` helper checks if files exist in the Storage disk before returning the URL.

### Pricing Logic
- Each hack can have multiple pricing options (different durations)
- Pricing is stored separately in `service_pricing` table
- The system automatically shows the lowest price on listing pages
- Discounts can be flat amount or percentage

### Code/Key Management
- Activation keys are stored in the `codes` table
- Keys are linked to specific pricing (hack + duration combination)
- Stock count in `service_pricing` tracks available keys

---

## Common Tasks

### Reset and Reseed Games
```bash
# Clear existing data
php artisan tinker --execute="DB::table('service_pricing')->truncate(); DB::table('card_services')->truncate(); DB::table('cards')->truncate();"

# Reseed
php artisan db:seed --class=GameHacksWithPricingSeeder
```

### Add Images for New Game
1. Place image in `public/assets/upload/game/your-image.jpg`
2. Copy to `assets/upload/game/your-image.jpg`
3. Update seeder with image path
4. Run seeder

### Update Pricing
1. Go to Admin → Cards → Select Game → Select Hack → Manage Pricing
2. Or update directly in `service_pricing` table
3. Clear cache after changes

---

## Troubleshooting

### Images Not Showing
- Check if images exist in both `public/assets/upload/` and `assets/upload/`
- Verify image paths in database match actual file locations
- Clear cache: `php artisan cache:clear`

### Pricing Not Displaying
- Ensure `service_pricing` entries exist for the hack
- Check `status` is set to 1 (active)
- Verify `duration_id` matches existing durations

### 500 Error on Homepage
- Check if all games have valid image data
- Ensure no NULL slugs in pages or cards tables
- Check Laravel logs in `storage/logs/`

---

## Next Steps / TODO

### Features to Implement
1. **Activation Key Management**
   - Bulk import keys
   - Auto-assign keys on purchase
   - Key expiration tracking

2. **Advanced Pricing**
   - Bulk discounts
   - Time-limited offers
   - Bundle deals

3. **User Features**
   - Purchase history
   - Active subscriptions
   - Key renewal

4. **Admin Features**
   - Sales analytics
   - Stock alerts
   - Revenue reports

### Content to Add
1. Add hacks for CODM and Wild Rift
2. Add more game images
3. Create hack descriptions
4. Add installation guides

---

## Support & Maintenance

### Regular Maintenance
- Clear cache weekly: `php artisan optimize:clear`
- Check stock levels for popular hacks
- Monitor expired keys
- Review discount code usage

### Backup Important Data
- Database (especially `cards`, `card_services`, `service_pricing`)
- Images in `assets/upload/`
- Configuration files

---

## Technical Details

### Laravel Version
- Laravel 10.x
- PHP 8.3+
- MySQL database

### Key Dependencies
- Yajra DataTables (for admin tables)
- Intervention Image (for image processing)
- Laravel Excel (for import/export)

### Custom Traits
- `app/Traits/Upload.php` - Image upload handling
- `app/Traits/Frontend.php` - Frontend data processing

---

## Contact & Credits

This system was built to manage game hack sales with flexible pricing and duration options. The architecture supports easy expansion for new games, hacks, and pricing models.

For questions or issues, refer to the Laravel logs and this documentation.
