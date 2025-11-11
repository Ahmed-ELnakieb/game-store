# Git Configuration for Uploads

## What's Ignored

The `.gitignore` file is configured to ignore uploaded images while keeping the folder structure:

```gitignore
/public/assets/upload/*
!/public/assets/upload/.gitkeep
```

## What This Means

### ✅ Tracked (Committed to Git)
- `public/assets/upload/.gitkeep` - Empty file to preserve folder structure
- All other public files and folders

### ❌ Not Tracked (Ignored)
- `public/assets/upload/game/` - All game images
- `public/assets/upload/card-service/` - All hack images
- `public/assets/upload/random/` - All random images
- Any other files/folders in `public/assets/upload/`

## Benefits

1. **Clean Repository** - No large image files in git history
2. **Faster Clones** - Repository stays small
3. **Environment-Specific** - Each server manages its own uploads
4. **Folder Structure Preserved** - The upload directory exists after clone

## Setup on New Environment

After cloning the repository:

```bash
# The folder structure already exists (via .gitkeep)
# Just add your images:
cp your-images/* public/assets/upload/game/
cp hack-images/* public/assets/upload/card-service/
```

Or run the seeder which will create the necessary images:

```bash
php artisan db:seed --class=GameHacksWithPricingSeeder
```

## Checking Git Status

To verify what's being tracked:

```bash
# Check if a file is ignored
git check-ignore -v public/assets/upload/game/hok.jpg
# Output: .gitignore:20:/public/assets/upload/*

# Check if .gitkeep is tracked
git check-ignore -v public/assets/upload/.gitkeep
# Output: (should show it's NOT ignored)

# See untracked files
git status public/assets/upload/
```

## Important Notes

- **Never commit** large image files to git
- **Always backup** `public/assets/upload/` separately (not in git)
- **Use deployment scripts** to sync images between environments
- **Consider cloud storage** (S3, etc.) for production uploads

## Deployment Checklist

When deploying to a new server:

1. ✅ Clone repository
2. ✅ Run `composer install`
3. ✅ Copy `.env` file
4. ✅ Run migrations: `php artisan migrate`
5. ✅ Run seeders: `php artisan db:seed`
6. ✅ Copy/upload images to `public/assets/upload/`
7. ✅ Set permissions: `chmod -R 775 public/assets/upload/`
8. ✅ Clear cache: `php artisan optimize:clear`

## Backup Strategy

### What to Backup
- Database (SQL dump)
- `public/assets/upload/` folder (images)
- `.env` file (configuration)

### What NOT to Backup
- `vendor/` folder (reinstall via composer)
- `node_modules/` folder (reinstall via npm)
- Cache files
- Log files

## Troubleshooting

### Images not showing after clone?
```bash
# Check if folder exists
ls -la public/assets/upload/

# If empty, run seeder or copy images
php artisan db:seed --class=GameHacksWithPricingSeeder
```

### Accidentally committed images?
```bash
# Remove from git but keep locally
git rm --cached -r public/assets/upload/game/
git commit -m "Remove uploaded images from git"
```

### Need to share images with team?
Use a separate method:
- Cloud storage (Google Drive, Dropbox)
- Shared network drive
- Deployment scripts with rsync
- CDN for production
