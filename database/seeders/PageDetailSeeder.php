<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageDetailSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('page_details')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $data = array (
  0 => 
  array (
    'id' => 1,
    'page_id' => 1,
    'language_id' => 1,
    'name' => 'Home',
    'content' => '<p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[light_hero]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[light_exclusive_card]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[light_brand]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[light_about]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[light_campaign]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[light_top_up]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[light_why_chose_us]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[light_buy_game_id]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[light_testimonial]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[light_blog]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p>',
    'sections' => '["light_hero","light_exclusive_card","light_brand","light_about","light_campaign","light_top_up","light_why_chose_us","light_buy_game_id","light_testimonial","light_blog"]',
    'created_at' => '2024-10-30 14:50:33',
    'updated_at' => '2025-03-05 01:59:16',
  ),
  1 => 
  array (
    'id' => 2,
    'page_id' => 2,
    'language_id' => 1,
    'name' => 'Blog',
    'content' => '<div class="custom-block" contenteditable="false"><div class="custom-block-content">[[light_blog]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p>',
    'sections' => '["light_blog"]',
    'created_at' => '2024-10-30 16:13:51',
    'updated_at' => '2024-12-18 08:01:49',
  ),
  2 => 
  array (
    'id' => 3,
    'page_id' => 3,
    'language_id' => 1,
    'name' => 'Contact',
    'content' => '<div class="custom-block" contenteditable="false"><div class="custom-block-content">[[light_contact]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p>',
    'sections' => '["light_contact"]',
    'created_at' => '2024-10-30 16:14:10',
    'updated_at' => '2024-12-18 08:04:25',
  ),
  3 => 
  array (
    'id' => 4,
    'page_id' => 4,
    'language_id' => 1,
    'name' => 'Privacy &amp; Policy',
    'content' => '<h3>Our Privacy Policy</h3><h3></h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We are committed to protecting your privacy. This Privacy Policy explains how we collect, use, and share your personal information when you visit or make a purchase from our website.</p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>Personal Information We Collect</h5><h3></h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">When you visit our website, we collect certain information about your device, including your IP address, browser type, and operating system. We also collect information about the pages you visit on our website, the links you click, and the products you view or purchase. We collect this information using cookies and other tracking technologies. For more information about cookies, please see the "Cookies" section below.</p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>How We Use Your Personal Information</h5><h3></h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We use the information we collect from you to:</p><ul><li>Process your orders and fulfill your requests</li><li>Communicate with you about your orders, products, and services</li><li>Provide you with targeted advertising and marketing</li><li>Improve our website and products</li><li>Comply with applicable laws and regulations</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br><br></p><h5>Sharing Your Personal Information</h5><h3></h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We share your personal information with third parties to help us with the purposes listed above. For example, we use Shopify to power our online store. You can read more about how Shopify uses your personal information here: https://www.shopify.com/legal/privacy. We also use Google Analytics to track website traffic. You can read more about how Google uses your personal information You can opt-out of Google Analytics tracking. Finally, we may share your personal information to comply with applicable laws and regulations, to respond to a subpoena, search warrant or other lawful request for information we receive, or to protect our rights.</p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br><br></p><h5>Contact Us</h5><h3></h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">If you have any questions about this Privacy Policy, please contact us at [email protected]</p>',
    'sections' => NULL,
    'created_at' => '2024-10-30 16:18:19',
    'updated_at' => '2024-10-30 16:18:19',
  ),
  4 => 
  array (
    'id' => 5,
    'page_id' => 5,
    'language_id' => 1,
    'name' => 'Terms &amp; Conditions',
    'content' => '<h3>Our Terms &amp; Conditions</h3><h3></h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">By accessing or using TalkWave, you agree to these Terms &amp; Conditions and our Privacy Policy. If you do not agree, do not use our platform.</p><p style="color:rgb(26,26,26);font-family:\'DM Sans\', sans-serif;font-size:16px;"><br></p><h5>Use of Service</h5><h3></h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">You must create an account to use TalkWave. Provide accurate information and keep your login credentials secure. You agree not to misuse TalkWave, including spamming, hacking, or violating any laws.</p><h5><br></h5><h5>Communication of Service</h5><h3></h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">Use TalkWave for lawful communication purposes only. We do not monitor your messages but may act if violations are reported. You are responsible for the content you share. Do not infringe on copyrights or distribute harmful material.</p><h5><br></h5><h5>Data Privacy</h5><h3></h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We collect and use personal information as outlined in our Privacy Policy. Your data security is important to us. Integrations with third-party services may require sharing information as per their terms.</p><h5><br></h5><h5>How We Use Your Personal Information</h5><h3></h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We use the information we collect from you to:</p><ul><li>Process your orders and fulfill your requests</li><li>Communicate with you about your orders, products, and services</li><li>Provide you with targeted advertising and marketing</li><li>Improve our website and products</li><li>Comply with applicable laws and regulations</li></ul><p style="color:rgb(26,26,26);font-family:\'DM Sans\', sans-serif;font-size:16px;"><br><br></p><h5>Sharing Your Personal Information</h5><h3></h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We share your personal information with third parties to help us with the purposes listed above. For example, we use Shopify to power our online store. You can read more about how Shopify uses your personal information here: https://www.shopify.com/legal/privacy. We also use Google Analytics to track website traffic. You can read more about how Google uses your personal information You can opt-out of Google Analytics tracking. Finally, we may share your personal information to comply with applicable laws and regulations, to respond to a subpoena, search warrant or other lawful request for information we receive, or to protect our rights.</p><p style="color:rgb(26,26,26);font-family:\'DM Sans\', sans-serif;font-size:16px;"><br><br></p><h5>Contact Us</h5><h3></h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">If you have any questions about this Privacy Policy, please contact us at [email protected]</p>',
    'sections' => NULL,
    'created_at' => '2024-10-30 16:18:48',
    'updated_at' => '2024-10-30 16:18:48',
  ),
  5 => 
  array (
    'id' => 6,
    'page_id' => 6,
    'language_id' => 1,
    'name' => 'Developer',
    'content' => '<div class="custom-block" contenteditable="false"><div class="custom-block-content">[[light_docx]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p>',
    'sections' => '["light_docx"]',
    'created_at' => '2024-11-13 07:07:02',
    'updated_at' => '2024-12-18 14:47:55',
  ),
  6 => 
  array (
    'id' => 8,
    'page_id' => 7,
    'language_id' => 1,
    'name' => 'Home',
    'content' => '<div class="custom-block" contenteditable="false"><div class="custom-block-content">[[dark_hero]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[dark_exclusive_card]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[dark_about]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[dark_campaign]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[dark_top_up]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[dark_why_chose_us]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[dark_buy_game_id]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[dark_testimonial]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><div class="custom-block" contenteditable="false"><div class="custom-block-content">[[dark_blog]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p>',
    'sections' => '["dark_hero","dark_exclusive_card","dark_about","dark_campaign","dark_top_up","dark_why_chose_us","dark_buy_game_id","dark_testimonial","dark_blog"]',
    'created_at' => '2024-12-08 13:44:19',
    'updated_at' => '2024-12-15 08:27:25',
  ),
  7 => 
  array (
    'id' => 9,
    'page_id' => 8,
    'language_id' => 1,
    'name' => 'Contact',
    'content' => '<div class="custom-block" contenteditable="false"><div class="custom-block-content">[[dark_contact]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p>',
    'sections' => '["dark_contact"]',
    'created_at' => '2024-12-12 12:38:21',
    'updated_at' => '2024-12-15 08:27:40',
  ),
  8 => 
  array (
    'id' => 10,
    'page_id' => 9,
    'language_id' => 1,
    'name' => 'Card',
    'content' => NULL,
    'sections' => NULL,
    'created_at' => '2024-12-12 12:53:41',
    'updated_at' => '2024-12-12 12:53:41',
  ),
  9 => 
  array (
    'id' => 11,
    'page_id' => 10,
    'language_id' => 1,
    'name' => 'Top Up',
    'content' => NULL,
    'sections' => NULL,
    'created_at' => '2024-12-12 12:53:49',
    'updated_at' => '2024-12-12 12:53:49',
  ),
  10 => 
  array (
    'id' => 12,
    'page_id' => 13,
    'language_id' => 1,
    'name' => 'Blogs',
    'content' => NULL,
    'sections' => NULL,
    'created_at' => '2024-12-12 13:28:41',
    'updated_at' => '2024-12-12 13:28:41',
  ),
  11 => 
  array (
    'id' => 13,
    'page_id' => 11,
    'language_id' => 1,
    'name' => 'Cards',
    'content' => NULL,
    'sections' => NULL,
    'created_at' => '2024-12-12 13:28:54',
    'updated_at' => '2024-12-12 13:28:54',
  ),
  12 => 
  array (
    'id' => 14,
    'page_id' => 14,
    'language_id' => 1,
    'name' => 'Privacy And Policy',
    'content' => '<h1>Privacy Policy</h1><p><br></p><p>Effective Date: 14-12-2024</p><p>At Gamers Arena, your privacy is important to us. This Privacy Policy outlines the types of information we collect, how we use it, and the measures we take to protect your data.</p><h2>1. Information We Collect</h2><h3>a. Personal Information</h3><p>We may collect personal information such as:</p><ul><li>Name</li><li>Email address</li><li>Date of birth</li><li>Payment information (for purchases or subscriptions)</li></ul><h3>b. Non-Personal Information</h3><p>We collect non-personal information, including:</p><ul><li>IP address</li><li>Browser type</li><li>Operating system</li><li>Device information</li><li>Game preferences and interaction data</li></ul><h3>c. Cookies and Tracking Technologies</h3><p>We use cookies, web beacons, and similar technologies to:</p><ul><li>Enhance your experience</li><li>Analyze website traffic</li><li>Personalize content and ads</li></ul><h2>2. How We Use Your Information</h2><p>The information we collect is used to:</p><ul><li>Provide and improve our services</li><li>Process transactions</li><li>Communicate updates, promotions, or notifications</li><li>Customize user experiences</li><li>Ensure security and prevent fraud</li></ul><h2>3. Sharing Your Information</h2><p>We do not sell your personal information. However, we may share your data:</p><ul><li>With trusted partners who assist in providing our services</li><li>For legal compliance or to protect our rights</li><li>In case of a merger, acquisition, or asset sale</li></ul><h2>4. Third-Party Services</h2><p>Our website may include links to third-party services or games. We are not responsible for the privacy practices of these external websites.</p><h2>5. Data Security</h2><p>We implement robust security measures to protect your data from unauthorized access, alteration, or disclosure. However, no method of electronic transmission is completely secure.</p><h2>6. Your Rights</h2><p>Depending on your location, you may have the following rights:</p><ul><li>Access your personal information</li><li>Request correction of inaccurate data</li><li>Delete your data</li><li>Opt-out of marketing communications</li><li>Restrict or object to certain processing activities</li></ul><p>To exercise these rights, contact us at [Insert Contact Email].</p><h2>7. Children’s Privacy</h2><p>Gamers Arena is not directed toward children under 13, and we do not knowingly collect personal information from them. If we discover that we have inadvertently collected data from a child, we will delete it promptly.</p><h2>8. Changes to This Policy</h2><p>We may update this Privacy Policy from time to time. The revised policy will be effective immediately upon posting. Please review it periodically.</p><h2>9. Contact Us</h2><p>If you have any questions about this Privacy Policy or our data practices, please contact us at:</p><ul><li><strong>Email:</strong> [Insert Email Address]</li><li><strong>Address:</strong> [Insert Physical Address]</li></ul>',
    'sections' => NULL,
    'created_at' => '2024-12-12 14:50:20',
    'updated_at' => '2024-12-14 06:58:09',
  ),
  13 => 
  array (
    'id' => 15,
    'page_id' => 15,
    'language_id' => 1,
    'name' => 'Terms And Conditions',
    'content' => '<h1><span style="font-size:24px;">Terms and Conditions</span></h1><p>Effective Date: 14-12-2024</p><p>Welcome to Gamers Arena! These Terms and Conditions ("Terms") govern your use of our website and services. By accessing or using Gamers Arena, you agree to be bound by these Terms. If you do not agree, please refrain from using our platform.</p><h2><span style="font-size:18px;">1. Acceptance of Terms</span></h2><p>By accessing Gamers Arena, you:</p><ul><li>Confirm that you have read, understood, and agree to these Terms.</li><li>Agree to comply with all applicable laws and regulations.</li><li>Understand that these Terms constitute a legally binding agreement.</li></ul><h2><span style="font-size:18px;">2. Eligibility</span></h2><p>To use Gamers Arena, you must:</p><ul><li>Be at least 13 years old. If you are under 18, you must have parental or guardian consent.</li><li>Ensure that your use of the platform does not violate any laws applicable to you.</li></ul><h2><span style="font-size:18px;">3. User Accounts</span></h2><h3><span style="font-size:18px;">a. Account Creation</span></h3><p>You may need to register for an account to access certain features. You agree to:</p><ul><li>Provide accurate and truthful information.</li><li>Keep your login credentials secure and confidential.</li></ul><h3><span style="font-size:18px;">b. Account Suspension or Termination</span></h3><p>We reserve the right to suspend or terminate your account for:</p><ul><li>Breach of these Terms.</li><li>Engaging in prohibited activities.</li><li>Providing false information during registration.</li></ul><h2><span style="font-size:18px;">4. Use of Services</span></h2><p>You agree to use Gamers Arena for lawful purposes only. You are prohibited from:</p><ul><li>Uploading harmful, offensive, or illegal content.</li><li>Attempting to disrupt the functionality of the platform.</li><li>Impersonating other users or entities.</li><li>Engaging in spamming, phishing, or other fraudulent activities.</li></ul><h2><span style="font-size:18px;">5. Intellectual Property</span></h2><ul><li>All content, trademarks, and materials on Gamers Arena are owned by or licensed to us.</li><li>You may not reproduce, distribute, or modify our content without prior written permission.</li><li>Any content you submit (e.g., comments or posts) grants us a non-exclusive, royalty-free license to use it.</li></ul><h2><span style="font-size:18px;">6. Purchases and Payments</span></h2><p>If you make purchases on Gamers Arena, you agree to:</p><ul><li>Provide valid and up-to-date payment information.</li><li>Abide by any specific terms related to transactions.</li><li>Accept that all purchases are subject to our refund policy.</li></ul><h2><span style="font-size:18px;">7. Content and Community Guidelines</span></h2><p>You agree that:</p><ul><li>Any content you post or share does not violate third-party rights, laws, or our guidelines.</li><li>We reserve the right to remove or edit content deemed inappropriate or in violation of these Terms.</li></ul><h2><span style="font-size:18px;">8. Limitation of Liability</span></h2><p>To the maximum extent permitted by law:</p><ul><li>Gamers Arena is provided "as is" without warranties of any kind.</li><li>We are not liable for any damages, including loss of data, revenue, or opportunities arising from your use of our platform.</li></ul><h2><span style="font-size:18px;">9. Privacy Policy</span></h2><p>Your use of Gamers Arena is also governed by our <a href="#">Privacy Policy</a>, which explains how we collect, use, and protect your data.</p><h2><span style="font-size:18px;">10. Modifications to Terms</span></h2><p>We may update these Terms periodically. By continuing to use the platform after updates, you accept the revised Terms.</p><h2><span style="font-size:18px;">11. Governing Law</span></h2><p>These Terms are governed by the laws of [Your Country/Region]. Any disputes will be resolved exclusively in the courts of [Your Jurisdiction].</p><h2><span style="font-size:18px;">12. Contact Information</span></h2><p>If you have questions or concerns regarding these Terms, please contact us at:</p><ul><li><strong>Email:</strong> [Insert Email Address]</li><li><strong>Address:</strong> [Insert Physical Address]</li></ul>',
    'sections' => NULL,
    'created_at' => '2024-12-14 06:46:17',
    'updated_at' => '2024-12-14 06:59:43',
  ),
  14 => 
  array (
    'id' => 16,
    'page_id' => 16,
    'language_id' => 1,
    'name' => 'Developer',
    'content' => '<div class="custom-block" contenteditable="false"><div class="custom-block-content">[[dark_docx]]</div>
                    <span class="delete-block">×</span>
                    <span class="up-block">↑</span>
                    <span class="down-block">↓</span></div><p><br></p>',
    'sections' => '["dark_docx"]',
    'created_at' => '2024-12-15 14:08:09',
    'updated_at' => '2024-12-15 14:08:09',
  ),
  15 => 
  array (
    'id' => 17,
    'page_id' => 18,
    'language_id' => 1,
    'name' => 'Cards',
    'content' => NULL,
    'sections' => NULL,
    'created_at' => '2024-12-18 13:27:47',
    'updated_at' => '2024-12-18 13:27:47',
  ),
  16 => 
  array (
    'id' => 18,
    'page_id' => 19,
    'language_id' => 1,
    'name' => 'Top Up',
    'content' => NULL,
    'sections' => NULL,
    'created_at' => '2024-12-18 13:27:59',
    'updated_at' => '2024-12-18 13:27:59',
  ),
  17 => 
  array (
    'id' => 19,
    'page_id' => 20,
    'language_id' => 1,
    'name' => 'Cookie Policy',
    'content' => '<p><span style="font-weight:bolder;"><span style="font-size:24px;">Cookie Policy for Gemars Haven</span></span></p><p>Last Updated: 21-12-2024</p><h3>1. Introduction</h3><p><span style="font-size:14px;"><b>Gemars Haven</b></span>("we", "us", or "our") uses cookies and similar tracking technologies on our website [<a href="http://www.adzilla.com/">www.gamers.com</a>] ("Site"). This Cookie Policy explains what cookies are, how we use them, the types of cookies we use, and your choices regarding cookies.</p><p>By using our Site, you agree to the use of cookies as outlined in this policy. If you do not agree, you may disable cookies through your browser settings.</p><h3>2. What are Cookies?</h3><p>Cookies are small text files stored on your device (computer, tablet, or mobile) by your web browser. They help websites remember information about your visit, such as your preferences and other settings, so that your next visit can be more efficient and personalized.</p><h3>3. How We Use Cookies</h3><p>We use cookies to:</p><ul><li><span style="font-weight:bolder;">Enhance User Experience</span>: Remember your preferences and settings.</li><li><span style="font-weight:bolder;">Analytics</span>: Collect information about how visitors use our Site to improve its functionality.</li><li><span style="font-weight:bolder;">Advertising</span>: Deliver personalized ads based on your interests and browsing behavior.</li><li><span style="font-weight:bolder;">Security and Authentication</span>: Ensure the security of our Site and verify your login credentials.</li></ul><h3>4. Types of Cookies We Use</h3><p>We use both <span style="font-weight:bolder;">session cookies</span> (which expire when you close your browser) and <span style="font-weight:bolder;">persistent cookies</span> (which remain on your device for a set period or until you delete them). The types of cookies we may use include:</p><ul><li><span style="font-weight:bolder;">Essential Cookies</span>: Necessary for the Site to function properly (e.g., enabling navigation and access to secure areas).</li><li><span style="font-weight:bolder;">Performance Cookies</span>: Collect information about how visitors interact with our Site (e.g., pages visited, time spent, and errors encountered).</li><li><span style="font-weight:bolder;">Functionality Cookies</span>: Remember your choices (e.g., language preferences) to provide a more personalized experience.</li><li><span style="font-weight:bolder;">Targeting/Advertising Cookies</span>: Track your online activity to help deliver relevant advertisements or limit the number of times you see an ad.</li></ul><h3>5. Third-Party Cookies</h3><p>We may allow third-party service providers to place cookies on your device for advertising, analytics, and other purposes. These third parties may use cookies to collect information about your online activities across different websites.</p><p>Some of our key third-party providers include:</p><ul><li><span style="font-weight:bolder;">Google Analytics</span></li><li><span style="font-weight:bolder;">Facebook Pixel</span></li><li><span style="font-weight:bolder;">DoubleClick</span></li></ul><p>Please review their respective privacy policies for more details on how they use your data.</p><h3>6. Your Choices Regarding Cookies</h3><p>You have the following options to manage cookies:</p><ul><li><span style="font-weight:bolder;">Browser Settings</span>: You can set your browser to refuse cookies or alert you when cookies are being sent. However, some features of our Site may not function properly without cookies.</li><li><span style="font-weight:bolder;">Opt-Out Tools</span>: You can opt-out of targeted advertising through tools like the <a>Network Advertising Initiative</a> or <a href="https://www.youronlinechoices.com/">Your Online Choices</a>.</li></ul><h3>7. Changes to this Cookie Policy</h3><p>We may update this Cookie Policy from time to time. Any changes will be posted on this page with an updated "Last Updated" date. Your continued use of our Site after changes have been made signifies your acceptance of the revised policy.</p><h3>8. Contact Us</h3><p>If you have any questions or concerns about our use of cookies, please contact us at:</p><p><span style="font-weight:bolder;">Gamers Haven Support Team</span><br>Email: <a>support@gamersHaven.com</a><br>Phone: [Your Phone Number]<br>Address: [Your Company Address]</p>',
    'sections' => NULL,
    'created_at' => '2024-12-21 12:35:04',
    'updated_at' => '2024-12-21 12:35:04',
  ),
  18 => 
  array (
    'id' => 20,
    'page_id' => 21,
    'language_id' => 1,
    'name' => 'Cookie Policy',
    'content' => '<p><span style="font-weight:bolder;"><span style="font-size:24px;">Cookie Policy for Gemars Haven</span></span></p><p>Last Updated: 21-12-2024</p><h3>1. Introduction</h3><p><span style="font-weight:bolder;">Gemars Haven</span>("we", "us", or "our") uses cookies and similar tracking technologies on our website [<a href="http://www.adzilla.com/">www.gamers.com</a>] ("Site"). This Cookie Policy explains what cookies are, how we use them, the types of cookies we use, and your choices regarding cookies.</p><p>By using our Site, you agree to the use of cookies as outlined in this policy. If you do not agree, you may disable cookies through your browser settings.</p><h3>2. What are Cookies?</h3><p>Cookies are small text files stored on your device (computer, tablet, or mobile) by your web browser. They help websites remember information about your visit, such as your preferences and other settings, so that your next visit can be more efficient and personalized.</p><h3>3. How We Use Cookies</h3><p>We use cookies to:</p><ul><li><span style="font-weight:bolder;">Enhance User Experience</span>: Remember your preferences and settings.</li><li><span style="font-weight:bolder;">Analytics</span>: Collect information about how visitors use our Site to improve its functionality.</li><li><span style="font-weight:bolder;">Advertising</span>: Deliver personalized ads based on your interests and browsing behavior.</li><li><span style="font-weight:bolder;">Security and Authentication</span>: Ensure the security of our Site and verify your login credentials.</li></ul><h3>4. Types of Cookies We Use</h3><p>We use both <span style="font-weight:bolder;">session cookies</span> (which expire when you close your browser) and <span style="font-weight:bolder;">persistent cookies</span> (which remain on your device for a set period or until you delete them). The types of cookies we may use include:</p><ul><li><span style="font-weight:bolder;">Essential Cookies</span>: Necessary for the Site to function properly (e.g., enabling navigation and access to secure areas).</li><li><span style="font-weight:bolder;">Performance Cookies</span>: Collect information about how visitors interact with our Site (e.g., pages visited, time spent, and errors encountered).</li><li><span style="font-weight:bolder;">Functionality Cookies</span>: Remember your choices (e.g., language preferences) to provide a more personalized experience.</li><li><span style="font-weight:bolder;">Targeting/Advertising Cookies</span>: Track your online activity to help deliver relevant advertisements or limit the number of times you see an ad.</li></ul><h3>5. Third-Party Cookies</h3><p>We may allow third-party service providers to place cookies on your device for advertising, analytics, and other purposes. These third parties may use cookies to collect information about your online activities across different websites.</p><p>Some of our key third-party providers include:</p><ul><li><span style="font-weight:bolder;">Google Analytics</span></li><li><span style="font-weight:bolder;">Facebook Pixel</span></li><li><span style="font-weight:bolder;">DoubleClick</span></li></ul><p>Please review their respective privacy policies for more details on how they use your data.</p><h3>6. Your Choices Regarding Cookies</h3><p>You have the following options to manage cookies:</p><ul><li><span style="font-weight:bolder;">Browser Settings</span>: You can set your browser to refuse cookies or alert you when cookies are being sent. However, some features of our Site may not function properly without cookies.</li><li><span style="font-weight:bolder;">Opt-Out Tools</span>: You can opt-out of targeted advertising through tools like the <a>Network Advertising Initiative</a> or <a href="https://www.youronlinechoices.com/">Your Online Choices</a>.</li></ul><h3>7. Changes to this Cookie Policy</h3><p>We may update this Cookie Policy from time to time. Any changes will be posted on this page with an updated "Last Updated" date. Your continued use of our Site after changes have been made signifies your acceptance of the revised policy.</p><h3>8. Contact Us</h3><p>If you have any questions or concerns about our use of cookies, please contact us at:</p><p><span style="font-weight:bolder;">Gamers Haven Support Team</span><br>Email: <a>support@gamersHaven.com</a><br>Phone: [Your Phone Number]<br>Address: [Your Company Address]</p>',
    'sections' => NULL,
    'created_at' => '2024-12-21 13:08:53',
    'updated_at' => '2024-12-21 13:08:53',
  ),
  19 => 
  array (
    'id' => 21,
    'page_id' => 23,
    'language_id' => 1,
    'name' => 'Buy ID',
    'content' => NULL,
    'sections' => NULL,
    'created_at' => '2024-12-29 09:11:28',
    'updated_at' => '2024-12-29 12:29:25',
  ),
  20 => 
  array (
    'id' => 22,
    'page_id' => 22,
    'language_id' => 1,
    'name' => 'Buy ID',
    'content' => NULL,
    'sections' => NULL,
    'created_at' => '2024-12-29 12:29:09',
    'updated_at' => '2024-12-29 12:29:09',
  ),
  21 => 
  array (
    'id' => 43,
    'page_id' => 25,
    'language_id' => 1,
    'name' => 'Google',
    'content' => NULL,
    'sections' => NULL,
    'created_at' => '2025-01-06 14:16:59',
    'updated_at' => '2025-01-06 14:16:59',
  ),
  22 => 
  array (
    'id' => 44,
    'page_id' => 26,
    'language_id' => 1,
    'name' => 'Google',
    'content' => NULL,
    'sections' => NULL,
    'created_at' => '2025-01-06 14:22:49',
    'updated_at' => '2025-01-06 14:22:49',
  ),
);

        foreach (array_chunk($data, 50) as $chunk) {
            DB::table('page_details')->insert($chunk);
        }
    }
}
