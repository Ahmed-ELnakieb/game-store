<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('contents')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = array (
  0 => 
  array (
    'id' => 1,
    'name' => 'topup',
    'type' => 'single',
    'media' => NULL,
    'created_at' => '2024-10-30 15:36:32',
    'updated_at' => '2024-10-30 15:36:32',
  ),
  1 => 
  array (
    'id' => 2,
    'name' => 'promotion',
    'type' => 'single',
    'media' => NULL,
    'created_at' => '2024-10-30 15:36:57',
    'updated_at' => '2024-10-30 15:36:57',
  ),
  2 => 
  array (
    'id' => 3,
    'name' => 'card',
    'type' => 'single',
    'media' => NULL,
    'created_at' => '2024-10-30 15:37:12',
    'updated_at' => '2024-10-30 15:37:12',
  ),
  3 => 
  array (
    'id' => 4,
    'name' => 'blog',
    'type' => 'single',
    'media' => NULL,
    'created_at' => '2024-10-30 15:37:39',
    'updated_at' => '2024-10-30 15:37:39',
  ),
  4 => 
  array (
    'id' => 5,
    'name' => 'feature',
    'type' => 'single',
    'media' => '{"image":{"path":"contents\\/Cdx1KY09K4F9rBFqdhedzLPshYwdFN.webp","driver":"local"}}',
    'created_at' => '2024-10-30 15:38:51',
    'updated_at' => '2024-10-30 15:46:28',
  ),
  5 => 
  array (
    'id' => 6,
    'name' => 'feature',
    'type' => 'multiple',
    'media' => NULL,
    'created_at' => '2024-10-30 15:39:09',
    'updated_at' => '2024-10-30 15:39:09',
  ),
  6 => 
  array (
    'id' => 7,
    'name' => 'feature',
    'type' => 'multiple',
    'media' => NULL,
    'created_at' => '2024-10-30 15:39:17',
    'updated_at' => '2024-10-30 15:39:17',
  ),
  7 => 
  array (
    'id' => 8,
    'name' => 'feature',
    'type' => 'multiple',
    'media' => NULL,
    'created_at' => '2024-10-30 15:39:25',
    'updated_at' => '2024-10-30 15:39:25',
  ),
  8 => 
  array (
    'id' => 9,
    'name' => 'feature',
    'type' => 'multiple',
    'media' => NULL,
    'created_at' => '2024-10-30 15:39:34',
    'updated_at' => '2024-10-30 15:39:34',
  ),
  9 => 
  array (
    'id' => 10,
    'name' => 'contact',
    'type' => 'single',
    'media' => '{"my_link":"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d193595.15830869428!2d-74.119763973046!3d40.69766374874431!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1668508535036!5m2!1sen!2sbd"}',
    'created_at' => '2024-10-30 15:42:44',
    'updated_at' => '2024-10-30 15:42:44',
  ),
  10 => 
  array (
    'id' => 11,
    'name' => 'authentication',
    'type' => 'single',
    'media' => '{"image":{"path":"contents\\/hys5bKhxaVRtiHJiU0i6L41txuSB7L.webp","driver":"local"}}',
    'created_at' => '2024-10-30 15:45:40',
    'updated_at' => '2025-01-06 07:52:28',
  ),
  11 => 
  array (
    'id' => 12,
    'name' => 'footer',
    'type' => 'single',
    'media' => NULL,
    'created_at' => '2024-10-31 08:06:54',
    'updated_at' => '2024-10-31 08:06:54',
  ),
  12 => 
  array (
    'id' => 13,
    'name' => 'social',
    'type' => 'single',
    'media' => '{"my_link":"https:\\/\\/t.me\\/radeownND","icon":"fab fa-telegram"}',
    'created_at' => '2024-10-31 08:28:38',
    'updated_at' => '2024-12-12 11:25:41',
  ),
  13 => 
  array (
    'id' => 14,
    'name' => 'social',
    'type' => 'multiple',
    'media' => '{"my_link":"https:\\/\\/t.me\\/hokqq2","icon":"fab fa-telegram"}',
    'created_at' => '2024-10-31 08:29:10',
    'updated_at' => '2024-10-31 08:29:10',
  ),
  14 => 
  array (
    'id' => 15,
    'name' => 'social',
    'type' => 'multiple',
    'media' => '{"my_link":"https:\\/\\/youtube.com\\/@honorofkings-de6wi?si=ib2D-3wqZui5fmql","icon":"fab fa-youtube"}',
    'created_at' => '2024-10-31 08:29:37',
    'updated_at' => '2024-10-31 08:29:37',
  ),
  15 => 
  array (
    'id' => 16,
    'name' => 'social',
    'type' => 'multiple',
    'media' => '{"my_link":"https:\\/\\/youtu.be\\/06kU28upGgQ?si=XNlnJj4ruRzoi4iv","icon":"fab fa-youtube"}',
    'created_at' => '2024-10-31 08:30:03',
    'updated_at' => '2024-10-31 08:30:03',
  ),
  16 => 
  array (
    'id' => 17,
    'name' => 'dark_hero',
    'type' => 'single',
    'media' => '{"background_image":{"path":"contents\\/T9N6xELscfNdfjGBCw0cjx4WN0UV1x.webp","driver":"local"}}',
    'created_at' => '2024-12-09 08:32:41',
    'updated_at' => '2024-12-09 09:01:32',
  ),
  17 => 
  array (
    'id' => 18,
    'name' => 'dark_hero',
    'type' => 'multiple',
    'media' => '{"background_image":{"path":"contents\\/1RyB0xiKtBF3NDX5FpPiIZoWgG1ycx.webp","driver":"local"}}',
    'created_at' => '2024-12-09 08:34:35',
    'updated_at' => '2024-12-09 08:34:35',
  ),
  18 => 
  array (
    'id' => 19,
    'name' => 'dark_hero',
    'type' => 'multiple',
    'media' => '{"background_image":{"path":"contents\\/7e3mDBGEdorqr1dTbOrSKkiLq2LpRN.webp","driver":"local"}}',
    'created_at' => '2024-12-09 08:35:36',
    'updated_at' => '2024-12-09 08:35:36',
  ),
  19 => 
  array (
    'id' => 20,
    'name' => 'dark_about',
    'type' => 'single',
    'media' => '{"image":{"path":"contents\\/lMM57KaXtbpmvXen0Jh7hEZcHS5gwh.webp","driver":"local"},"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-10 14:52:52',
    'updated_at' => '2024-12-10 14:52:53',
  ),
  20 => 
  array (
    'id' => 21,
    'name' => 'dark_exclusive_card',
    'type' => 'single',
    'media' => '{"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-11 06:40:58',
    'updated_at' => '2024-12-11 06:40:58',
  ),
  21 => 
  array (
    'id' => 22,
    'name' => 'dark_campaign',
    'type' => 'single',
    'media' => '{"image":{"path":"contents\\/6GGZRzmom2TXnCdXas8jAIS4Gg0gaE.webp","driver":"local"}}',
    'created_at' => '2024-12-11 07:26:17',
    'updated_at' => '2024-12-11 07:26:17',
  ),
  22 => 
  array (
    'id' => 23,
    'name' => 'dark_top_up',
    'type' => 'single',
    'media' => '{"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-11 12:48:25',
    'updated_at' => '2024-12-11 12:48:25',
  ),
  23 => 
  array (
    'id' => 69,
    'name' => 'dark_special_offer',
    'type' => 'single',
    'media' => '{"button_link":"\\/cards"}',
    'created_at' => '2025-02-11 10:00:00',
    'updated_at' => '2025-02-11 10:00:00',
  ),
  24 => 
  array (
    'id' => 24,
    'name' => 'dark_why_chose_us',
    'type' => 'single',
    'media' => '{"image":{"path":"contents\\/84LB2IifH0m75yVzOsBkT8g0jdu3Ly.webp","driver":"local"}}',
    'created_at' => '2024-12-11 13:10:15',
    'updated_at' => '2024-12-11 13:10:15',
  ),
  24 => 
  array (
    'id' => 25,
    'name' => 'dark_why_chose_us',
    'type' => 'multiple',
    'media' => NULL,
    'created_at' => '2024-12-11 13:16:53',
    'updated_at' => '2024-12-11 13:16:53',
  ),
  25 => 
  array (
    'id' => 26,
    'name' => 'dark_why_chose_us',
    'type' => 'multiple',
    'media' => NULL,
    'created_at' => '2024-12-11 13:17:13',
    'updated_at' => '2024-12-11 13:17:13',
  ),
  26 => 
  array (
    'id' => 27,
    'name' => 'dark_why_chose_us',
    'type' => 'multiple',
    'media' => NULL,
    'created_at' => '2024-12-11 13:17:31',
    'updated_at' => '2024-12-11 13:17:31',
  ),
  27 => 
  array (
    'id' => 28,
    'name' => 'dark_testimonial',
    'type' => 'single',
    'media' => '{"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-11 13:36:29',
    'updated_at' => '2024-12-11 13:36:29',
  ),
  28 => 
  array (
    'id' => 29,
    'name' => 'dark_testimonial',
    'type' => 'multiple',
    'media' => '{"image":{"path":"contents\\/piyw5Pi9eJz4Mgm4SCsW3l3er48SMh.webp","driver":"local"}}',
    'created_at' => '2024-12-11 13:37:29',
    'updated_at' => '2024-12-11 13:37:29',
  ),
  29 => 
  array (
    'id' => 30,
    'name' => 'dark_testimonial',
    'type' => 'multiple',
    'media' => '{"image":{"path":"contents\\/ATovNLppZpliN5gJgAh5KQATtxJrH2.webp","driver":"local"}}',
    'created_at' => '2024-12-11 13:38:22',
    'updated_at' => '2024-12-11 13:38:22',
  ),
  30 => 
  array (
    'id' => 31,
    'name' => 'dark_testimonial',
    'type' => 'multiple',
    'media' => '{"image":{"path":"contents\\/tHdBtmmNTK9nTLZ6fKzcf1tvO01sR8.webp","driver":"local"}}',
    'created_at' => '2024-12-11 13:38:38',
    'updated_at' => '2024-12-11 13:38:38',
  ),
  31 => 
  array (
    'id' => 32,
    'name' => 'dark_blog',
    'type' => 'single',
    'media' => '{"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-11 14:05:29',
    'updated_at' => '2024-12-11 14:05:29',
  ),
  32 => 
  array (
    'id' => 33,
    'name' => 'footer',
    'type' => 'multiple',
    'media' => '{"my_link":"https:\\/\\/t.me\\/radeownND","icon":"fab fa-telegram"}',
    'created_at' => '2024-12-12 09:33:04',
    'updated_at' => '2024-12-12 09:34:52',
  ),
  33 => 
  array (
    'id' => 34,
    'name' => 'footer',
    'type' => 'multiple',
    'media' => '{"my_link":"https:\\/\\/t.me\\/hokqq2","icon":"fab fa-telegram"}',
    'created_at' => '2024-12-12 09:33:29',
    'updated_at' => '2024-12-12 09:35:10',
  ),
  34 => 
  array (
    'id' => 35,
    'name' => 'footer',
    'type' => 'multiple',
    'media' => '{"my_link":"https:\\/\\/youtube.com\\/@honorofkings-de6wi?si=ib2D-3wqZui5fmql","icon":"fab fa-youtube"}',
    'created_at' => '2024-12-12 09:33:59',
    'updated_at' => '2024-12-12 09:35:24',
  ),
  35 => 
  array (
    'id' => 36,
    'name' => 'footer',
    'type' => 'multiple',
    'media' => '{"my_link":"https:\\/\\/youtu.be\\/06kU28upGgQ?si=XNlnJj4ruRzoi4iv","icon":"fab fa-youtube"}',
    'created_at' => '2024-12-12 09:34:26',
    'updated_at' => '2024-12-12 09:35:35',
  ),
  36 => 
  array (
    'id' => 37,
    'name' => 'dark_contact',
    'type' => 'single',
    'media' => '{"image":{"path":"contents\\/CVDLOSZavcxz3wDsI3GxsMtfEXfA8K.webp","driver":"local"}}',
    'created_at' => '2024-12-12 12:26:07',
    'updated_at' => '2024-12-12 12:26:07',
  ),
  37 => 
  array (
    'id' => 38,
    'name' => 'light_blog',
    'type' => 'single',
    'media' => '{"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-19 06:32:45',
    'updated_at' => '2024-12-19 06:32:45',
  ),
  38 => 
  array (
    'id' => 39,
    'name' => 'light_testimonial',
    'type' => 'single',
    'media' => '{"image":{"path":"contents\\/4gqHFkWDUadeys8AgvX6VSkEQA6nri.webp","driver":"local"}}',
    'created_at' => '2024-12-19 07:00:58',
    'updated_at' => '2024-12-19 07:00:59',
  ),
  39 => 
  array (
    'id' => 40,
    'name' => 'light_testimonial',
    'type' => 'multiple',
    'media' => '{"image":{"path":"contents\\/8RLcIrdj2RjVotIVz08tM10VtYYvsW.webp","driver":"local"}}',
    'created_at' => '2024-12-19 07:02:49',
    'updated_at' => '2024-12-19 07:02:49',
  ),
  40 => 
  array (
    'id' => 41,
    'name' => 'light_testimonial',
    'type' => 'multiple',
    'media' => '{"image":{"path":"contents\\/LY3WLtDV4MvmNvLDTAEp1uRurXO6TO.webp","driver":"local"}}',
    'created_at' => '2024-12-19 07:03:34',
    'updated_at' => '2024-12-19 07:03:34',
  ),
  41 => 
  array (
    'id' => 42,
    'name' => 'light_testimonial',
    'type' => 'multiple',
    'media' => '{"image":{"path":"contents\\/WBZpY2fvziMwONoXmR7Om3ijBcPVos.webp","driver":"local"}}',
    'created_at' => '2024-12-19 07:04:02',
    'updated_at' => '2024-12-19 07:04:02',
  ),
  42 => 
  array (
    'id' => 43,
    'name' => 'light_why_chose_us',
    'type' => 'single',
    'media' => '{"image":{"path":"contents\\/HWURlhW8c3iFLufTglFdZieYpzVL6X.webp","driver":"local"},"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-19 07:52:24',
    'updated_at' => '2024-12-19 07:52:24',
  ),
  43 => 
  array (
    'id' => 44,
    'name' => 'light_why_chose_us',
    'type' => 'multiple',
    'media' => NULL,
    'created_at' => '2024-12-19 07:53:00',
    'updated_at' => '2024-12-19 07:53:00',
  ),
  44 => 
  array (
    'id' => 45,
    'name' => 'light_why_chose_us',
    'type' => 'multiple',
    'media' => NULL,
    'created_at' => '2024-12-19 07:53:52',
    'updated_at' => '2024-12-19 07:53:52',
  ),
  45 => 
  array (
    'id' => 46,
    'name' => 'light_why_chose_us',
    'type' => 'multiple',
    'media' => NULL,
    'created_at' => '2024-12-19 07:54:09',
    'updated_at' => '2024-12-19 07:54:09',
  ),
  46 => 
  array (
    'id' => 47,
    'name' => 'light_why_chose_us',
    'type' => 'multiple',
    'media' => NULL,
    'created_at' => '2024-12-19 07:54:25',
    'updated_at' => '2024-12-19 07:54:25',
  ),
  47 => 
  array (
    'id' => 48,
    'name' => 'light_top_up',
    'type' => 'single',
    'media' => '{"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-19 08:10:40',
    'updated_at' => '2024-12-19 08:10:40',
  ),
  48 => 
  array (
    'id' => 49,
    'name' => 'light_campaign',
    'type' => 'single',
    'media' => '{"image":{"path":"contents\\/y7bByQCD00PaLoVgupnnHgdgsciitx.webp","driver":"local"}}',
    'created_at' => '2024-12-19 08:56:18',
    'updated_at' => '2024-12-19 08:56:26',
  ),
  49 => 
  array (
    'id' => 50,
    'name' => 'light_about',
    'type' => 'single',
    'media' => '{"image":{"path":"contents\\/8vVjw7LOSskVOiGKOGi5vAAxmP7ZGN.webp","driver":"local"},"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-19 09:32:06',
    'updated_at' => '2024-12-19 09:32:06',
  ),
  50 => 
  array (
    'id' => 51,
    'name' => 'light_brand',
    'type' => 'multiple',
    'media' => '{"icon":"fa-regular fa-star-of-life"}',
    'created_at' => '2024-12-19 09:42:15',
    'updated_at' => '2024-12-19 09:42:15',
  ),
  51 => 
  array (
    'id' => 52,
    'name' => 'light_brand',
    'type' => 'multiple',
    'media' => '{"icon":"fa-regular fa-star-of-life"}',
    'created_at' => '2024-12-19 09:42:30',
    'updated_at' => '2024-12-19 09:42:30',
  ),
  52 => 
  array (
    'id' => 53,
    'name' => 'light_brand',
    'type' => 'multiple',
    'media' => '{"icon":"fa-regular fa-star-of-life"}',
    'created_at' => '2024-12-19 09:42:39',
    'updated_at' => '2024-12-19 09:42:39',
  ),
  53 => 
  array (
    'id' => 54,
    'name' => 'light_brand',
    'type' => 'multiple',
    'media' => '{"icon":"fa-regular fa-star-of-life"}',
    'created_at' => '2024-12-19 09:42:56',
    'updated_at' => '2024-12-19 09:42:56',
  ),
  54 => 
  array (
    'id' => 55,
    'name' => 'light_brand',
    'type' => 'multiple',
    'media' => '{"icon":"fa-regular fa-star-of-life"}',
    'created_at' => '2024-12-19 09:43:28',
    'updated_at' => '2024-12-19 09:43:28',
  ),
  55 => 
  array (
    'id' => 56,
    'name' => 'light_brand',
    'type' => 'multiple',
    'media' => '{"icon":"fa-regular fa-star-of-life"}',
    'created_at' => '2024-12-19 09:43:52',
    'updated_at' => '2024-12-19 09:43:52',
  ),
  56 => 
  array (
    'id' => 57,
    'name' => 'light_brand',
    'type' => 'multiple',
    'media' => '{"icon":"fa-regular fa-star-of-life"}',
    'created_at' => '2024-12-19 09:44:20',
    'updated_at' => '2024-12-19 09:44:20',
  ),
  57 => 
  array (
    'id' => 58,
    'name' => 'light_brand',
    'type' => 'multiple',
    'media' => '{"icon":"fa-regular fa-star-of-life"}',
    'created_at' => '2024-12-19 09:44:33',
    'updated_at' => '2024-12-19 09:44:33',
  ),
  58 => 
  array (
    'id' => 59,
    'name' => 'light_exclusive_card',
    'type' => 'single',
    'media' => '{"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-19 09:55:58',
    'updated_at' => '2024-12-19 09:55:58',
  ),
  59 => 
  array (
    'id' => 60,
    'name' => 'light_trending_item',
    'type' => 'single',
    'media' => NULL,
    'created_at' => '2024-12-19 11:27:27',
    'updated_at' => '2024-12-19 11:27:27',
  ),
  60 => 
  array (
    'id' => 62,
    'name' => 'light_hero',
    'type' => 'multiple',
    'media' => '{"image":{"path":"contents\\/ARPiIA2P0wFohNFwMVdk4MAvSG8CbS.webp","driver":"local"},"image_two":{"path":"contents\\/FvVwW5GOQqTUFaOfjkNPrgxfJozoyD.webp","driver":"local"},"image_three":{"path":"contents\\/Ux0tO9vqDoBtSylUaUi932y7X05u1T.webp","driver":"local"},"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-19 12:36:10',
    'updated_at' => '2024-12-19 12:36:11',
  ),
  61 => 
  array (
    'id' => 63,
    'name' => 'light_hero',
    'type' => 'multiple',
    'media' => '{"image":{"path":"contents\\/dQxsVMHsh5KqmuB3PBdGRYZ0X6n18j.webp","driver":"local"},"image_two":{"path":"contents\\/qzpDPvZPiIip8mLa8q9mNb5L1XtG5r.webp","driver":"local"},"image_three":{"path":"contents\\/toUw3FfQl6toAhAuelFIKIJtDdToQD.webp","driver":"local"},"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-19 12:40:25',
    'updated_at' => '2024-12-19 12:40:25',
  ),
  62 => 
  array (
    'id' => 64,
    'name' => 'light_contact',
    'type' => 'single',
    'media' => NULL,
    'created_at' => '2024-12-19 12:59:28',
    'updated_at' => '2024-12-19 12:59:28',
  ),
  63 => 
  array (
    'id' => 65,
    'name' => 'light_buy_game_id',
    'type' => 'single',
    'media' => '{"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-29 07:14:06',
    'updated_at' => '2024-12-29 07:14:06',
  ),
  64 => 
  array (
    'id' => 66,
    'name' => 'dark_buy_game_id',
    'type' => 'single',
    'media' => '{"button_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-12-29 14:46:50',
    'updated_at' => '2024-12-29 14:46:50',
  ),
  65 => 
  array (
    'id' => 67,
    'name' => 'app_page',
    'type' => 'single',
    'media' => '{"image":{"path":"contents\\/kdkGyFBVnw1qD4C09mAckdHPMnSz4S.webp","driver":"local"}}',
    'created_at' => '2025-02-04 11:33:49',
    'updated_at' => '2025-02-04 11:33:49',
  ),
);

        foreach (array_chunk($data, 50) as $chunk) {
            DB::table('contents')->insert($chunk);
        }
    }
}
