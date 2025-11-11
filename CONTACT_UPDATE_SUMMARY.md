# Contact Details Update Summary

## Overview
Updated all contact details across the codebase to replace old social links with new contact information.

## New Contact Details Applied

### Email
- **New Email**: bubblegumm545432@gmail.com
- **Replaced**: demo@example.com, example@gmail.com, support@gmail.com

### Phone
- **New Phone**: +8801762343843
- **Replaced**: +45345847431324, 354-4156745674, +15255 5552489

### Telegram
- **Telegram Personal**: https://t.me/radeownND
- **Telegram Group**: https://t.me/hokqq2

### YouTube
- **YouTube Channel**: https://youtube.com/@honorofkings-de6wi?si=ib2D-3wqZui5fmql
- **YouTube Video**: https://youtu.be/06kU28upGgQ?si=XNlnJj4ruRzoi4iv

## Files Updated

### 1. Database Seeders

#### ContentSeeder.php
- Updated social links (IDs 13-16) from Facebook/Twitter/LinkedIn/Instagram to Telegram/YouTube
- Updated footer social links (IDs 33-36) with new Telegram and YouTube URLs
- Changed icons from `fab fa-facebook-f`, `fab fa-twitter`, `fab fa-linkedin`, `fab fa-instagram` to `fab fa-telegram` and `fab fa-youtube`

#### ContentDetailSeeder.php
- Updated social link names (IDs 14-16, 33-36) to reflect new platforms:
  - "Twitter" → "Telegram Personal"
  - "Linkedin" → "Telegram Group" / "YouTube Channel"
  - "Instagram" → "YouTube Video" / "YouTube Channel"
  - "Facebook" → "Telegram Personal"
- Updated all email addresses in contact forms and footer sections (IDs 10, 12, 13, 37, 64)
- Changed from demo@example.com and example@gmail.com to bubblegumm545432@gmail.com

#### BasicControlSeeder.php
- Updated sender_email from 'support@gmail.com' to 'bubblegumm545432@gmail.com'
- Updated sender_email_name from 'Bug Admin' to 'Gamers Arena'

#### NotificationSeeder.php
- Updated all 27 notification template email_from fields
- Changed from 'support@gmail.com' to 'bubblegumm545432@gmail.com'

## Social Media Icons Updated

### Old Icons (Removed)
- `fab fa-facebook-f` (Facebook)
- `fab fa-twitter` (Twitter)
- `fab fa-linkedin` (LinkedIn)
- `fab fa-instagram` (Instagram)

### New Icons (Added)
- `fab fa-telegram` (Telegram - for both personal and group)
- `fab fa-youtube` (YouTube - for both channel and video)

## Next Steps

To apply these changes to your database:

1. **Backup your database** before running seeders
   ```bash
   # Create a backup of your database
   php artisan backup:run
   # OR manually export your database using phpMyAdmin or mysqldump
   ```

2. Run the seeders to update the database:
   ```bash
   php artisan db:seed --class=BasicControlSeeder
   php artisan db:seed --class=ContentSeeder
   php artisan db:seed --class=ContentDetailSeeder
   php artisan db:seed --class=NotificationSeeder
   ```

3. **Clear cache** to ensure changes are reflected:
   ```bash
   php artisan cache:clear
   php artisan config:clear
   php artisan view:clear
   php artisan route:clear
   ```

4. **Verify the changes** in:
   - Website footer (social links should show Telegram and YouTube)
   - Contact page (email should be bubblegumm545432@gmail.com)
   - Email notifications (sender email should be bubblegumm545432@gmail.com)
   - Admin panel settings (check basic controls)
   - Social media icons in header/footer

5. **Test email functionality**:
   - Send a test email to verify the new sender address works
   - Check spam folder if emails don't arrive
   - Configure SMTP settings if needed

## Important Notes

- All old social media links (Facebook, Twitter, LinkedIn, Instagram) have been completely replaced
- The new contact details are now consistently applied across all seeders
- Email notifications will now be sent from bubblegumm545432@gmail.com
- Social icons in the UI will need Font Awesome icons for Telegram and YouTube to display properly
- Make sure Font Awesome is loaded in your frontend to display the new icons:
  - `fab fa-telegram` for Telegram
  - `fab fa-youtube` for YouTube
- No hardcoded social links were found in view files or config files
- All changes are in the database seeders only

## Verification Checklist

After running the seeders, verify:
- [ ] Footer displays Telegram and YouTube links instead of old social media
- [ ] Contact forms show the new email address
- [ ] Email notifications are sent from bubblegumm545432@gmail.com
- [ ] Social icons render correctly (Telegram and YouTube icons)
- [ ] All contact information is consistent across the site
- [ ] Admin panel shows updated contact details
