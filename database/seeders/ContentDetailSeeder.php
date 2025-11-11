<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentDetailSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('content_details')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = array (
  0 => 
  array (
    'id' => 1,
    'content_id' => 1,
    'language_id' => 1,
    'description' => '{"heading":"Popular Top Up"}',
    'created_at' => '2024-10-30 15:36:32',
    'updated_at' => '2024-10-30 15:36:32',
  ),
  1 => 
  array (
    'id' => 2,
    'content_id' => 2,
    'language_id' => 1,
    'description' => '{"heading":"More currently trending offers","sub_heading":"Don\'t miss out \\u2013 grab them while you still have the chance!"}',
    'created_at' => '2024-10-30 15:36:57',
    'updated_at' => '2024-10-30 15:36:57',
  ),
  2 => 
  array (
    'id' => 3,
    'content_id' => 3,
    'language_id' => 1,
    'description' => '{"heading":"Latest Card"}',
    'created_at' => '2024-10-30 15:37:12',
    'updated_at' => '2024-10-30 15:37:12',
  ),
  3 => 
  array (
    'id' => 4,
    'content_id' => 4,
    'language_id' => 1,
    'description' => '{"heading":"Popular Blog","button_name":"Explore More"}',
    'created_at' => '2024-10-30 15:37:39',
    'updated_at' => '2024-10-30 15:37:39',
  ),
  4 => 
  array (
    'id' => 5,
    'content_id' => 5,
    'language_id' => 1,
    'description' => '{"heading":"What G2BUlP Can Provide","sub_heading":"Dynamically deliver multidisciplinary infrastructures via revolution process products deliverables premium after just in time scenarios."}',
    'created_at' => '2024-10-30 15:38:51',
    'updated_at' => '2024-10-30 15:38:51',
  ),
  5 => 
  array (
    'id' => 6,
    'content_id' => 6,
    'language_id' => 1,
    'description' => '{"heading":"Multiple Payment Methods","sub_heading":"Completely synergize B2C paradigms through researched technology. Credibly term high-impact imperatives."}',
    'created_at' => '2024-10-30 15:39:09',
    'updated_at' => '2024-10-30 15:39:09',
  ),
  6 => 
  array (
    'id' => 7,
    'content_id' => 7,
    'language_id' => 1,
    'description' => '{"heading":"Promotions for various Region","sub_heading":"Completely synergize B2C paradigms through researched technology. Credibly term high-impact imperatives."}',
    'created_at' => '2024-10-30 15:39:17',
    'updated_at' => '2024-10-30 15:39:17',
  ),
  7 => 
  array (
    'id' => 8,
    'content_id' => 8,
    'language_id' => 1,
    'description' => '{"heading":"Protection of user privacy","sub_heading":"Completely synergize B2C paradigms through researched technology. Credibly term high-impact imperatives."}',
    'created_at' => '2024-10-30 15:39:25',
    'updated_at' => '2024-10-30 15:39:25',
  ),
  8 => 
  array (
    'id' => 9,
    'content_id' => 9,
    'language_id' => 1,
    'description' => '{"heading":"Protection of user privacy","sub_heading":"Completely synergize B2C paradigms through researched technology. Credibly term high-impact imperatives."}',
    'created_at' => '2024-10-30 15:39:34',
    'updated_at' => '2024-10-30 15:39:34',
  ),
  9 => 
  array (
    'id' => 10,
    'content_id' => 10,
    'language_id' => 1,
    'description' => '{"phone":"+8801762343843","email":"bubblegumm545432@gmail.com","address":"22 Baker Street, London","contact_heading":"Contact Information","contact_sub_heading":"Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days. We will be happy to answer your questions.","message_heading":"We\\u2019re always here for you","message_sub_heading":"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia blanditiis consequuntur rem, sit itaque impedit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam consequatur Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi, perferendis?"}',
    'created_at' => '2024-10-30 15:42:44',
    'updated_at' => '2024-10-30 15:42:44',
  ),
  10 => 
  array (
    'id' => 11,
    'content_id' => 11,
    'language_id' => 1,
    'description' => '{"login_page_heading":"Welcome back!","login_page_sub_heading":"Hey Enter your details to get sign in to your account","register_page_heading":"Welcome back!","register_page_sub_heading":"Hey Enter your details to get sign in to your account"}',
    'created_at' => '2024-10-30 15:45:40',
    'updated_at' => '2024-10-30 15:45:40',
  ),
  11 => 
  array (
    'id' => 12,
    'content_id' => 12,
    'language_id' => 1,
    'description' => '{"newsletter_text":"Subscribe Newsletter","newsletter_button":"Subscribe","message":"Need to get in touch with us ? Please contact with us with email.","footer_email":"bubblegumm545432@gmail.com","footer_location":"ONLINE STORE, United States","footer_phone":"+8801762343843","copyright_text_one":"Copyright \\u00a92024","copyright_text_two":"All Rights Reserved!","app_store_link":"https:\\/\\/bugfinder.net\\/","google_store_link":"https:\\/\\/bugfinder.net\\/"}',
    'created_at' => '2024-10-31 08:06:54',
    'updated_at' => '2024-12-19 13:26:33',
  ),
  12 => 
  array (
    'id' => 13,
    'content_id' => 13,
    'language_id' => 1,
    'description' => '{"footer_email":"bubblegumm545432@gmail.com","footer_location":"Online Store, United States","footer_phone":"+8801762343843"}',
    'created_at' => '2024-10-31 08:28:38',
    'updated_at' => '2024-12-12 11:25:41',
  ),
  13 => 
  array (
    'id' => 14,
    'content_id' => 14,
    'language_id' => 1,
    'description' => '{"name":"Telegram Personal"}',
    'created_at' => '2024-10-31 08:29:10',
    'updated_at' => '2024-10-31 08:29:10',
  ),
  14 => 
  array (
    'id' => 15,
    'content_id' => 15,
    'language_id' => 1,
    'description' => '{"name":"Telegram Group"}',
    'created_at' => '2024-10-31 08:29:37',
    'updated_at' => '2024-10-31 08:29:37',
  ),
  15 => 
  array (
    'id' => 16,
    'content_id' => 16,
    'language_id' => 1,
    'description' => '{"name":"YouTube Channel"}',
    'created_at' => '2024-10-31 08:30:03',
    'updated_at' => '2024-10-31 08:30:03',
  ),
  16 => 
  array (
    'id' => 17,
    'content_id' => 17,
    'language_id' => 1,
    'description' => '{"trend_title":"Trending Hacks","trend_sub_title":"Don\'t miss out\\u2014grab yours now!"}',
    'created_at' => '2024-12-09 08:32:42',
    'updated_at' => '2024-12-09 09:01:32',
  ),
  17 => 
  array (
    'id' => 18,
    'content_id' => 18,
    'language_id' => 1,
    'description' => '{"title":"Honor of Kings Radeon Hack","sub_title":"Premium ESP & Aimbot - Undetected","description":"Dominate Honor of Kings with our advanced Radeon hack. Features ESP, aimbot, and skill prediction for ultimate victory!","kew-text":"Get HOK Hack","button_link":"/card/details/honor-of-kings-hok","box_type":"dark-moderate-blue-box"}',
    'created_at' => '2025-02-10 10:00:00',
    'updated_at' => '2025-02-10 14:30:00',
  ),
  18 => 
  array (
    'id' => 19,
    'content_id' => 19,
    'language_id' => 1,
    'description' => '{"title":"Mobile Legends MLBB Radeon Hack","sub_title":"Instant Delivery - Undetected 2025","description":"Master every match with our MLBB Radeon hack. Advanced map hack, hero ESP, and skill prediction included!","kew-text":"Buy MLBB Hack","button_link":"/card/details/mobile-legends-mlbb","box_type":"very-light-blue-box"}',
    'created_at' => '2025-02-10 10:15:00',
    'updated_at' => '2025-02-10 14:25:00',
  ),
  19 => 
  array (
    'id' => 20,
    'content_id' => 20,
    'language_id' => 1,
    'description' => '{"title":"About Our Game Hacks","description":"<div style=\\"color: rgb(8, 8, 8);\\"><pre style=\\"font-family:\'JetBrains Mono\',monospace;font-size:11.3pt;\\">We are a premier digital marketplace specializing in advanced game hacks and cheats for popular mobile games like Honor of Kings (HOK), Mobile Legends, PUBG Mobile, and more. Our platform offers gamers cutting-edge tools to enhance their gameplay experience with features like Drone View, ESP, Aimbot, and Map Hack.<br><br>Whether you\'re looking to dominate in ranked matches or simply explore new gameplay possibilities, we deliver safe, reliable, and regularly updated hacks tailored to your gaming needs. Our hacks are designed by experienced developers who understand the gaming community and prioritize both performance and safety.<br><br>Every hack we offer goes through rigorous testing to ensure stability and compatibility with the latest game versions. We continuously monitor game updates and security patches to keep our hacks undetected and fully functional.\\r\\n\\r\\n<div><pre style=\\"font-family:\'JetBrains Mono\',monospace;font-size:11.3pt;\\">We stand out with our advanced anti-ban protection, 24/7 customer support, regular updates for the latest game versions, and competitive pricing with flexible subscription options. Our dedicated support team is always ready to assist you with installation, configuration, or any issues you might encounter.<br><br>Join thousands of satisfied gamers who trust us as their ultimate destination for premium game hacks. Experience the difference that professional-grade hacks can make in your gaming journey. Whether you\'re a casual player or a competitive gamer, we have the perfect solution for you.<\\/pre><\\/div><\\/pre><\\/div>","button":"Get Key Now","button_link":"\\/cards"}',
    'created_at' => '2024-12-10 14:52:53',
    'updated_at' => '2024-12-10 14:52:53',
  ),
  20 => 
  array (
    'id' => 21,
    'content_id' => 21,
    'language_id' => 1,
    'description' => '{"title":"Exclusive Game Hacks","sub_title":"Don\'t miss our limited-time offers!  Discover current deals today!","button":"Explore More","button_link":"/cards"}',
    'created_at' => '2024-12-11 06:40:58',
    'updated_at' => '2024-12-22 07:46:02',
  ),
  21 => 
  array (
    'id' => 22,
    'content_id' => 22,
    'language_id' => 1,
    'description' => '{"heading":"Flash Deal","title":"Flash Sale offers","sub_title":"Don\'t miss out \\u2013 grab them while you still have the chance!"}',
    'created_at' => '2024-12-11 07:26:17',
    'updated_at' => '2024-12-11 07:26:17',
  ),
  22 => 
  array (
    'id' => 23,
    'content_id' => 23,
    'language_id' => 1,
    'description' => '{"title":"Game Top-Up Offers! \\ud83d\\udd25","sub_title":"Don\'t miss our limited-time offers! Discover current deals today!","button":"Explore More","button_link":"/cards"}',
    'created_at' => '2024-12-11 12:48:25',
    'updated_at' => '2024-12-22 07:46:28',
  ),
  23 => 
  array (
    'id' => 24,
    'content_id' => 24,
    'language_id' => 1,
    'description' => '{"title":"Experience the Difference with Us","sub_title":"Delivering quality, reliability, and innovation every step of the way."}',
    'created_at' => '2024-12-11 13:10:15',
    'updated_at' => '2024-12-11 13:10:15',
  ),
  24 => 
  array (
    'id' => 25,
    'content_id' => 25,
    'language_id' => 1,
    'description' => '{"title":"Affordable Pricing","description":"Enjoy premium services without breaking the bank. We offer competitive rates tailored to your budget"}',
    'created_at' => '2024-12-11 13:16:53',
    'updated_at' => '2024-12-11 13:16:53',
  ),
  25 => 
  array (
    'id' => 26,
    'content_id' => 26,
    'language_id' => 1,
    'description' => '{"title":"Exceptional Support","description":"Our dedicated team is available 24\\/7 to assist you, ensuring a seamless experience from start to finish."}',
    'created_at' => '2024-12-11 13:17:13',
    'updated_at' => '2024-12-11 13:17:13',
  ),
  26 => 
  array (
    'id' => 27,
    'content_id' => 27,
    'language_id' => 1,
    'description' => '{"title":"Featured Game Hacks","button":"View All Hacks","button_link":"/cards"}',
    'created_at' => '2024-12-11 13:17:31',
    'updated_at' => '2024-12-11 13:17:31',
  ),
  27 => 
  array (
    'id' => 28,
    'content_id' => 28,
    'language_id' => 1,
    'description' => '{"title":"Featured Game Hacks","button":"View All Hacks","button_link":"/cards"}',
    'created_at' => '2024-12-11 13:36:29',
    'updated_at' => '2024-12-11 13:36:29',
  ),
  28 => 
  array (
    'id' => 29,
    'content_id' => 29,
    'language_id' => 1,
    'description' => '{"name":"Jim Morison","location":"London, UK","review":"When I bought Gamers Arena, that time I already have a big number of my own customers and followers on social media. When I just launched my first-ever digital gaming online market I can\'t express the feeling that every customer loved my site and my sale wasn\\u2019t this high ever before.","rating":"5"}',
    'created_at' => '2024-12-11 13:37:29',
    'updated_at' => '2024-12-11 13:37:29',
  ),
  29 => 
  array (
    'id' => 30,
    'content_id' => 30,
    'language_id' => 1,
    'description' => '{"name":"Jim Morison","location":"London, UK","review":"When I bought Gamers Arena, that time I already have a big number of my own customers and followers on social media. When I just launched my first-ever digital gaming online market I can\'t express the feeling that every customer loved my site and my sale wasn\\u2019t this high ever before.","rating":"5"}',
    'created_at' => '2024-12-11 13:38:22',
    'updated_at' => '2024-12-11 13:38:22',
  ),
  30 => 
  array (
    'id' => 31,
    'content_id' => 31,
    'language_id' => 1,
    'description' => '{"name":"Jim Morison","location":"London, UK","review":"When I bought Gamers Arena, that time I already have a big number of my own customers and followers on social media. When I just launched my first-ever digital gaming online market I can\'t express the feeling that every customer loved my site and my sale wasn\\u2019t this high ever before.","rating":"5"}',
    'created_at' => '2024-12-11 13:38:38',
    'updated_at' => '2024-12-11 13:38:38',
  ),
  31 => 
  array (
    'id' => 32,
    'content_id' => 32,
    'language_id' => 1,
    'description' => '{"title":"Updated Blogs Post","button":"Explore More"}',
    'created_at' => '2024-12-11 14:05:29',
    'updated_at' => '2024-12-11 14:05:29',
  ),
  32 => 
  array (
    'id' => 33,
    'content_id' => 33,
    'language_id' => 1,
    'description' => '{"name":"Telegram Personal"}',
    'created_at' => '2024-12-12 09:33:04',
    'updated_at' => '2024-12-12 09:33:04',
  ),
  33 => 
  array (
    'id' => 34,
    'content_id' => 34,
    'language_id' => 1,
    'description' => '{"name":"Telegram Group"}',
    'created_at' => '2024-12-12 09:33:29',
    'updated_at' => '2024-12-12 09:33:29',
  ),
  34 => 
  array (
    'id' => 35,
    'content_id' => 35,
    'language_id' => 1,
    'description' => '{"name":"YouTube Channel"}',
    'created_at' => '2024-12-12 09:33:59',
    'updated_at' => '2024-12-12 09:33:59',
  ),
  35 => 
  array (
    'id' => 36,
    'content_id' => 36,
    'language_id' => 1,
    'description' => '{"name":"YouTube Video"}',
    'created_at' => '2024-12-12 09:34:26',
    'updated_at' => '2024-12-12 09:34:26',
  ),
  36 => 
  array (
    'id' => 37,
    'content_id' => 37,
    'language_id' => 1,
    'description' => '{"title":"Keep In Touch With Us.","sub_title":"Neque convallis a cras semper auctor. Libero id faucibus nisl tincidunt egetnvallis.","form_title":"Send a Message","form_sub_title":"Let\'s Ask Your Questions","email":"bubblegumm545432@gmail.com","location":"Online Store","phone":"+8801762343843","button":"Send a massage"}',
    'created_at' => '2024-12-12 12:26:07',
    'updated_at' => '2024-12-12 12:27:01',
  ),
  37 => 
  array (
    'id' => 38,
    'content_id' => 38,
    'language_id' => 1,
    'description' => '{"title":"Updated Blogs Post","button":"view all"}',
    'created_at' => '2024-12-19 06:32:45',
    'updated_at' => '2024-12-19 06:32:45',
  ),
  38 => 
  array (
    'id' => 39,
    'content_id' => 39,
    'language_id' => 1,
    'description' => '{"title":"What\'s our Customer say","sub_title":"GEMOT is my go-to platform for game top-ups and gift cards. Their service is always quick, and the  process is hassle-free. Highly recommended!"}',
    'created_at' => '2024-12-19 07:00:59',
    'updated_at' => '2024-12-19 07:00:59',
  ),
  39 => 
  array (
    'id' => 40,
    'content_id' => 40,
    'language_id' => 1,
    'description' => '{"name":"Jim Morison","location":"London, UK","review":"Gamers Arena is a paradise for gamers! I discovered amazing tips, connected with fellow gamers, and leveled up my skills like never before!","rating":"5"}',
    'created_at' => '2024-12-19 07:02:49',
    'updated_at' => '2024-12-19 07:02:49',
  ),
  40 => 
  array (
    'id' => 41,
    'content_id' => 41,
    'language_id' => 1,
    'description' => '{"name":"Jim Morison","location":"London, UK","review":"Thanks to Gamers Arena, I found my perfect gaming community. The tournaments and discussions here are next-level. Truly a gamer\'s haven!","rating":"5"}',
    'created_at' => '2024-12-19 07:03:34',
    'updated_at' => '2024-12-19 07:03:34',
  ),
  41 => 
  array (
    'id' => 42,
    'content_id' => 42,
    'language_id' => 1,
    'description' => '{"name":"Jim Morison","location":"London, UK","review":"From the latest game reviews to strategies, Gamers Arena has it all. It\\u2019s my go-to hub for everything gaming!","rating":"5"}',
    'created_at' => '2024-12-19 07:04:02',
    'updated_at' => '2024-12-19 07:04:02',
  ),
  42 => 
  array (
    'id' => 43,
    'content_id' => 43,
    'language_id' => 1,
    'description' => '{"title":"Experience the Difference with Us","sub_title":"Delivering quality, reliability, and innovation every step of the way.","button":"learn more"}',
    'created_at' => '2024-12-19 07:52:24',
    'updated_at' => '2024-12-19 07:52:24',
  ),
  43 => 
  array (
    'id' => 44,
    'content_id' => 44,
    'language_id' => 1,
    'description' => '{"title":"Affordable Pricing","description":"Enjoy premium services without breaking the bank. We offer competitive rates tailored to your budget"}',
    'created_at' => '2024-12-19 07:53:00',
    'updated_at' => '2024-12-19 07:53:00',
  ),
  44 => 
  array (
    'id' => 45,
    'content_id' => 45,
    'language_id' => 1,
    'description' => '{"title":"Exceptional Support","description":"Our dedicated team is available 24\\/7 to assist you, ensuring a seamless experience from start to finish."}',
    'created_at' => '2024-12-19 07:53:52',
    'updated_at' => '2024-12-19 07:53:52',
  ),
  45 => 
  array (
    'id' => 46,
    'content_id' => 46,
    'language_id' => 1,
    'description' => '{"title":"Trusted by Thousands","description":"Join a community of happy customers who trust us for our reliability and outstanding results."}',
    'created_at' => '2024-12-19 07:54:09',
    'updated_at' => '2024-12-19 07:54:09',
  ),
  46 => 
  array (
    'id' => 47,
    'content_id' => 47,
    'language_id' => 1,
    'description' => '{"title":"Instant Delivery","description":"Get purchases instantly! Our system ensures your in-game  currency or digital products are just a click away."}',
    'created_at' => '2024-12-19 07:54:25',
    'updated_at' => '2024-12-19 07:54:25',
  ),
  47 => 
  array (
    'id' => 48,
    'content_id' => 48,
    'language_id' => 1,
    'description' => '{"title":"Game Top-Up Offers! \\ud83d\\udd25","sub_title":"Don\'t miss our limited-time offers! Discover current deals today!","button":"view all"}',
    'created_at' => '2024-12-19 08:10:40',
    'updated_at' => '2024-12-22 07:57:45',
  ),
  48 => 
  array (
    'id' => 49,
    'content_id' => 49,
    'language_id' => 1,
    'description' => '{"heading":"Flash Deal","title":"Flash Sale offers","sub_title":"Don\'t miss out \\u2013 grab them while you still have the chance!"}',
    'created_at' => '2024-12-19 08:56:18',
    'updated_at' => '2024-12-19 08:56:18',
  ),
  49 => 
  array (
    'id' => 50,
    'content_id' => 50,
    'language_id' => 1,
    'description' => '{"title":"About Our Game Hacks","description":"<div style=\\"\\"><pre style=\\"\\"><pre style=\\"font-family: &quot;JetBrains Mono&quot;, monospace; font-size: 11.3pt; color: rgb(8, 8, 8);\\">We are a premier digital marketplace specializing in advanced game hacks and cheats for popular mobile games like Honor of Kings (HOK), Mobile Legends, PUBG Mobile, and more. Our platform offers gamers cutting-edge tools to enhance their gameplay experience with features like Drone View, ESP, Aimbot, and Map Hack.<br><br>Whether you\'re looking to dominate in ranked matches or simply explore new gameplay possibilities, we deliver safe, reliable, and regularly updated hacks tailored to your gaming needs. Our hacks are designed by experienced developers who understand the gaming community and prioritize both performance and safety.<br><br>Every hack we offer goes through rigorous testing to ensure stability and compatibility with the latest game versions. We continuously monitor game updates and security patches to keep our hacks undetected and fully functional.\\r\\n\\r\\n<div><pre style=\\"font-family: &quot;JetBrains Mono&quot;, monospace; font-size: 11.3pt;\\">We stand out with our advanced anti-ban protection, 24/7 customer support, regular updates for the latest game versions, and competitive pricing with flexible subscription options. Our dedicated support team is always ready to assist you with installation, configuration, or any issues you might encounter.<br><br>Join thousands of satisfied gamers who trust us as their ultimate destination for premium game hacks. Experience the difference that professional-grade hacks can make in your gaming journey. Whether you\'re a casual player or a competitive gamer, we have the perfect solution for you.<\\/pre><\\/div><\\/pre><\\/pre><\\/div>","button":"Get Key Now","button_link":"\\/cards"}',
    'created_at' => '2024-12-19 09:32:06',
    'updated_at' => '2024-12-21 12:55:57',
  ),
  50 => 
  array (
    'id' => 51,
    'content_id' => 51,
    'language_id' => 1,
    'description' => '{"item":"Game Top-Up"}',
    'created_at' => '2024-12-19 09:42:15',
    'updated_at' => '2024-12-19 09:42:15',
  ),
  51 => 
  array (
    'id' => 52,
    'content_id' => 52,
    'language_id' => 1,
    'description' => '{"item":"Digital Vouchers"}',
    'created_at' => '2024-12-19 09:42:30',
    'updated_at' => '2024-12-19 09:42:30',
  ),
  52 => 
  array (
    'id' => 53,
    'content_id' => 53,
    'language_id' => 1,
    'description' => '{"item":"In-Game Currency"}',
    'created_at' => '2024-12-19 09:42:39',
    'updated_at' => '2024-12-19 09:42:39',
  ),
  53 => 
  array (
    'id' => 54,
    'content_id' => 54,
    'language_id' => 1,
    'description' => '{"item":"Exclusive Deals"}',
    'created_at' => '2024-12-19 09:42:56',
    'updated_at' => '2024-12-19 09:42:56',
  ),
  54 => 
  array (
    'id' => 55,
    'content_id' => 55,
    'language_id' => 1,
    'description' => '{"item":"Gift Cards"}',
    'created_at' => '2024-12-19 09:43:28',
    'updated_at' => '2024-12-19 09:43:28',
  ),
  55 => 
  array (
    'id' => 56,
    'content_id' => 56,
    'language_id' => 1,
    'description' => '{"item":"Membership Codes"}',
    'created_at' => '2024-12-19 09:43:52',
    'updated_at' => '2024-12-19 09:43:52',
  ),
  56 => 
  array (
    'id' => 57,
    'content_id' => 57,
    'language_id' => 1,
    'description' => '{"item":"Promo Bundles"}',
    'created_at' => '2024-12-19 09:44:20',
    'updated_at' => '2024-12-19 09:44:20',
  ),
  57 => 
  array (
    'id' => 58,
    'content_id' => 58,
    'language_id' => 1,
    'description' => '{"item":"Special Gaming Offers"}',
    'created_at' => '2024-12-19 09:44:33',
    'updated_at' => '2024-12-19 09:44:33',
  ),
  58 => 
  array (
    'id' => 59,
    'content_id' => 59,
    'language_id' => 1,
    'description' => '{"title":"Exclusive Game Hacks","sub_title":"Don\'t miss our limited-time offers! Discover current deals today!","button":"view all","button_link":"/cards"}',
    'created_at' => '2024-12-19 09:55:58',
    'updated_at' => '2024-12-22 07:49:11',
  ),
  59 => 
  array (
    'id' => 60,
    'content_id' => 60,
    'language_id' => 1,
    'description' => '{"title":"Card Items","sub_title":"Don\'t miss out\\u2014grab yours now!"}',
    'created_at' => '2024-12-19 11:27:27',
    'updated_at' => '2024-12-22 08:00:08',
  ),
  60 => 
  array (
    'id' => 62,
    'content_id' => 62,
    'language_id' => 1,
    'description' => '{"title":"25% Off Get Unlimited Offer","sub_title":"Relive the Shattering Cataclysm Arrives","description":"Exchange skins get new once with best conditions","button":"know more"}',
    'created_at' => '2024-12-19 12:36:11',
    'updated_at' => '2024-12-19 12:36:11',
  ),
  61 => 
  array (
    'id' => 63,
    'content_id' => 63,
    'language_id' => 1,
    'description' => '{"title":"25% Off Get Unlimited Offer","sub_title":"Relive the Shattering Cataclysm Arrives","description":"Exchange skins get new once with best conditions","button":"know more"}',
    'created_at' => '2024-12-19 12:40:25',
    'updated_at' => '2024-12-19 12:40:25',
  ),
  62 => 
  array (
    'id' => 64,
    'content_id' => 64,
    'language_id' => 1,
    'description' => '{"title":"Contact Information","sub_title":"Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days. We will be happy to answer your questions.","form_title":"We\\u2019re always here for you","form_sub_title":"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia blanditiis consequuntur rem, sit itaque impedit. Lorem ipsum dolor sit amet consectetur  adipisicing elit. Quam consequatur Lorem ipsum dolor sit, amet consectetur  adipisicing elit. Sequi, perferendis?","email":"bubblegumm545432@gmail.com","location":"Online Store","phone":"+8801762343843","button":"Send a massage"}',
    'created_at' => '2024-12-19 12:59:28',
    'updated_at' => '2024-12-19 12:59:28',
  ),
  63 => 
  array (
    'id' => 65,
    'content_id' => 65,
    'language_id' => 1,
    'description' => '{"title":"Buy Game IDs! \\ud83c\\udfae","sub_title":"Exclusive Limited-Time Offers Just for You!","button":"view all","button_link":"/cards"}',
    'created_at' => '2024-12-29 07:14:06',
    'updated_at' => '2024-12-29 07:14:06',
  ),
  64 => 
  array (
    'id' => 66,
    'content_id' => 66,
    'language_id' => 1,
    'description' => '{"title":"Buy Game IDs! \\ud83c\\udfae","sub_title":"Exclusive Limited-Time Offers Just for You!","button":"Explore more","button_link":"/cards"}',
    'created_at' => '2024-12-29 14:46:50',
    'updated_at' => '2024-12-29 14:47:28',
  ),
  65 => 
  array (
    'id' => 135,
    'content_id' => 67,
    'language_id' => 1,
    'description' => '{"heading":"Enjoy the Game","sub_heading":"GAMESHOP UNIVERSE","button_name":"Shop Now"}',
    'created_at' => '2025-02-04 11:33:49',
    'updated_at' => '2025-02-04 11:33:49',
  ),
);

        foreach (array_chunk($data, 50) as $chunk) {
            DB::table('content_details')->insert($chunk);
        }
    }
}
