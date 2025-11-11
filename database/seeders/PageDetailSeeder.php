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
    'content' => '<h3>Privacy & Policy</h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><em>Last Updated: November 11, 2025</em></p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">At <strong>HOKQQCHETO</strong>, your privacy and security are our top priorities. This Privacy Policy outlines how we collect, use, protect, and handle your personal information when you purchase game enhancements, digital products, and gaming services from our platform.</p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>1. Information Collection</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h6>Personal Data</h6><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">When you create an account or make a purchase, we collect:</p><ul><li>Full name and username for account identification</li><li>Email address for order confirmations and product delivery</li><li>Contact number (optional) for account verification</li><li>Payment details (processed securely via encrypted third-party gateways)</li><li>Game-specific information required for service delivery</li><li>Hardware specifications (HWID) for license activation and compatibility</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h6>Automated Data Collection</h6><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">Our systems automatically gather:</p><ul><li>IP address and approximate geographic location</li><li>Device specifications and operating system details</li><li>Web browser type and version</li><li>Transaction history and product usage patterns</li><li>Site navigation data via cookies and analytics tools</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>2. Data Usage</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We utilize your information exclusively for:</p><ul><li>Processing and delivering your purchased products instantly</li><li>Securing transactions and detecting fraudulent activities</li><li>Providing responsive customer support and technical assistance</li><li>Distributing critical product updates and security patches</li><li>Ensuring system compatibility before product activation</li><li>Enhancing user experience and service quality</li><li>Sending promotional content (only with explicit consent)</li><li>Meeting legal and regulatory obligations</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>3. Secure Product Delivery</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">Your security is paramount in our delivery process:</p><ul><li>All digital products are transmitted through encrypted, secure channels</li><li>Game credentials are processed in real-time and never permanently stored</li><li>HWID (Hardware ID) binding ensures your license remains exclusive to your device</li><li>Each license key is uniquely generated and hardware-locked</li><li>Your gaming accounts and sensitive data are never disclosed to third parties</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>4. Information Sharing Policy</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We maintain strict data sharing protocols. Limited information may be shared with:</p><ul><li><strong>Payment Service Providers:</strong> For secure payment processing only</li><li><strong>Technical Partners:</strong> For product functionality (anonymized data exclusively)</li><li><strong>Support Services:</strong> To resolve technical issues efficiently</li><li><strong>Legal Entities:</strong> Only when mandated by law or court order</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><strong>Absolute Guarantee:</strong> We will NEVER sell, rent, or share your game accounts, passwords, or personal gaming information with any third party under any circumstances.</p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>5. Security Measures</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We employ enterprise-grade security protocols:</p><ul><li>Military-grade 256-bit SSL/TLS encryption for all data transmission</li><li>Hardened servers with continuous security monitoring</li><li>End-to-end encrypted product delivery infrastructure</li><li>Multi-factor authentication (2FA) for enhanced account protection</li><li>Regular penetration testing and security audits</li><li>Automated threat detection and prevention systems</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>6. Cookies & Analytics</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We utilize cookies and similar technologies to:</p><ul><li>Maintain secure login sessions across your visits</li><li>Preserve shopping cart contents between sessions</li><li>Analyze traffic patterns and optimize site performance</li><li>Deliver personalized content and recommendations</li><li>Measure marketing campaign effectiveness</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><em>Note: While you can disable cookies through browser settings, this may limit certain website functionalities.</em></p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>7. Your Privacy Rights</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">You maintain full control over your personal data:</p><ul><li><strong>Access:</strong> Request a complete copy of your stored information</li><li><strong>Correction:</strong> Update or rectify inaccurate personal details</li><li><strong>Deletion:</strong> Request permanent removal of your data (Right to be Forgotten)</li><li><strong>Opt-Out:</strong> Unsubscribe from marketing communications anytime</li><li><strong>Portability:</strong> Receive your data in a machine-readable format</li><li><strong>Withdrawal:</strong> Revoke previously given consent at any time</li><li><strong>Account Closure:</strong> Permanently delete your account and associated data</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>8. Age Verification</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">Our services are restricted to adults only. You must be <strong>18 years or older</strong> to purchase products from HOKQQCHETO. We do not knowingly collect or process information from individuals under 18 years of age.</p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>9. External Links</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">Our platform may contain links to external websites and services. We are not responsible for the privacy practices or content of these third-party sites. We encourage you to review their privacy policies before sharing any personal information.</p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>10. Policy Updates</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We reserve the right to modify this Privacy Policy to reflect changes in our practices or legal requirements. Material changes will be communicated via email or prominent website notice. Continued use of our services following updates constitutes acceptance of the revised policy.</p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>11. Contact Information</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">For privacy inquiries, data requests, or concerns, reach us through:</p><ul><li><strong>Email Support:</strong> bubblegumm545432@gmail.com</li><li><strong>Phone:</strong> +8801762343843</li><li><strong>Telegram Direct:</strong> https://t.me/radeownND</li><li><strong>Community Group:</strong> https://t.me/HOKQQCHETO2</li><li><strong>YouTube Channel:</strong> https://youtube.com/@honorofkings-de6wi</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><em>We are committed to responding to all privacy-related inquiries within 48 hours.</em></p>',
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
    'content' => '<h3>Terms &amp; Conditions</h3><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><em>Last Updated: November 11, 2025</em></p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">Welcome to <strong>HOKQQCHETO</strong>! These Terms & Conditions govern your use of our platform and purchase of digital gaming products. By accessing our services, you enter into a legally binding agreement. Please review these terms thoroughly before completing any transaction.</p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>1. Agreement & Acceptance</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">By using HOKQQCHETO, you explicitly acknowledge and agree that:</p><ul><li>You are <strong>18 years of age or older</strong> and legally capable of entering contracts</li><li>You fully comprehend the inherent risks associated with game enhancement software</li><li>You accept complete personal responsibility for all consequences of product usage</li><li>You have read, understood, and consent to all provisions within this agreement</li><li>You will comply with all applicable local, state, and federal laws</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>2. Product Catalog</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">HOKQQCHETO offers a comprehensive range of digital gaming products:</p><ul><li><strong>Game Enhancement Tools:</strong> Advanced features for popular titles including PUBG Mobile, Call of Duty, Free Fire, and more</li><li><strong>Precision Modules:</strong> Aimbot systems, ESP (Extra Sensory Perception), wallhacks, and radar functionality</li><li><strong>Customization Software:</strong> Game modifications and visual enhancement tools</li><li><strong>Account Services:</strong> Premium gaming accounts and rank boosting services</li><li><strong>Digital Utilities:</strong> Gaming optimization and performance enhancement tools</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>3. Critical Risk Disclosure</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><strong>⚠️ MANDATORY ACKNOWLEDGMENT:</strong></p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">You explicitly understand and accept that:</p><ul><li>Game enhancement software may <strong>violate game publishers\' Terms of Service</strong></li><li>Your gaming account(s) face <strong>potential permanent suspension or ban</strong></li><li>HOKQQCHETO bears <strong>ZERO liability</strong> for account penalties, bans, or suspensions</li><li>All products are used <strong>entirely at your own risk</strong></li><li>We provide <strong>no guarantees</strong> regarding anti-cheat system evasion or undetectability</li><li>Game updates may temporarily or permanently affect product functionality</li><li>Detection by anti-cheat systems may result in <strong>hardware bans (HWID bans)</strong></li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>4. Account Requirements</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">To maintain platform integrity, you must:</p><ul><li>Provide accurate, current, and complete registration information</li><li>Maintain the confidentiality of your account credentials</li><li>Refrain from sharing account access with any third party</li><li>Immediately report any suspected unauthorized account access</li><li>Utilize a valid, accessible email address for product delivery</li><li>Update your account information promptly when changes occur</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>5. Commercial Terms</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h6>Pricing Structure</h6><ul><li>All prices are denominated in <strong>United States Dollars (USD)</strong></li><li>Pricing is subject to modification without prior notice</li><li>Transactions are processed through PCI-DSS compliant encrypted payment gateways</li><li>We accept major credit cards, debit cards, and select cryptocurrencies</li><li>Listed prices include base license and standard technical support</li><li>Promotional pricing may have specific terms and expiration dates</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h6>Delivery Protocol</h6><ul><li><strong>Instant Delivery:</strong> Most products are delivered automatically within minutes</li><li><strong>Manual Processing:</strong> Complex orders may require up to 24 hours for activation</li><li>Delivery includes download links, activation keys, and comprehensive setup instructions</li><li>HWID (Hardware ID) registration is mandatory for license activation</li><li>Ensure your email spam/junk folder is checked if delivery is not received</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>6. Refund Policy</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><strong>Due to the instantaneous digital nature of our products:</strong></p><ul><li><strong>NO REFUNDS</strong> are issued after successful product delivery and activation</li><li>Refunds are <strong>exclusively available</strong> if products are not delivered within 48 hours</li><li><strong>NO REFUNDS</strong> for account bans, suspensions, or game publisher actions</li><li><strong>NO REFUNDS</strong> for game updates that affect product functionality</li><li><strong>NO REFUNDS</strong> for incorrect HWID or user-provided information errors</li><li>Refund requests require verifiable proof of non-delivery</li><li><strong>Chargebacks result in immediate permanent account termination</strong> and potential legal action</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>7. Licensing Terms</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">Your purchase grants you a <strong>limited, personal, non-exclusive, non-transferable license</strong>:</p><ul><li>License is permanently bound to your registered Hardware ID (HWID)</li><li>You are <strong>PROHIBITED</strong> from reselling, redistributing, or sharing products</li><li>You are <strong>PROHIBITED</strong> from reverse engineering, decompiling, or modifying software</li><li>You are <strong>PROHIBITED</strong> from creating derivative works or copies</li><li>License violations result in <strong>immediate termination without refund</strong></li><li>We reserve the right to revoke licenses for Terms violations</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>8. Prohibited Conduct</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">The following activities are <strong>strictly forbidden</strong>:</p><ul><li>Sharing, selling, or transferring license keys or account credentials</li><li>Attempting to circumvent, crack, or bypass our protection mechanisms</li><li>Commercial exploitation of products without explicit written authorization</li><li>Reselling products on competing platforms or marketplaces</li><li>Using products to harass, harm, or defraud other users</li><li>Engaging in any illegal activities using our products</li><li>Attempting to decompile, reverse engineer, or extract source code</li><li>Distributing malware or harmful code through our platform</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>9. Support & Maintenance</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We provide comprehensive post-purchase support:</p><ul><li>Regular product updates to maintain compatibility and functionality</li><li>Updates are included throughout your active subscription period</li><li>Technical support available via Telegram and email channels</li><li>Standard response time: <strong>24-48 hours</strong> for support inquiries</li><li>Priority support available for premium tier customers</li><li>We do not guarantee 24/7 availability or immediate issue resolution</li><li>Major game updates may require temporary service interruptions</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>10. Limitation of Liability</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><strong>⚠️ HOKQQCHETO DISCLAIMS ALL LIABILITY FOR:</strong></p><ul><li>Game account bans, suspensions, restrictions, or permanent terminations</li><li>Loss of game progress, virtual items, in-game currency, or account value</li><li>Hardware damage, system instability, or data loss</li><li>Actions taken by game publishers, developers, or anti-cheat providers</li><li>Service interruptions due to game updates or patches</li><li>Any indirect, incidental, consequential, special, or punitive damages</li><li>Loss of profits, revenue, or business opportunities</li><li>Third-party claims or legal actions</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><strong>Maximum liability is limited to the purchase price paid for the specific product.</strong></p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>11. Warranty Disclaimer</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">Products are provided <strong>"AS IS"</strong> and <strong>"AS AVAILABLE"</strong> without warranties of any kind:</p><ul><li><strong>NO WARRANTY</strong> of undetectability or anti-cheat evasion</li><li><strong>NO WARRANTY</strong> of compatibility with all hardware configurations</li><li><strong>NO WARRANTY</strong> of specific performance results or outcomes</li><li><strong>NO WARRANTY</strong> of continuous availability or functionality</li><li>Game updates may render products temporarily or permanently inoperable</li><li>We disclaim all implied warranties including merchantability and fitness for purpose</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>12. Account Termination Rights</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We reserve the absolute right to suspend or terminate accounts for:</p><ul><li>Any violation of these Terms & Conditions</li><li>Fraudulent transactions, chargebacks, or payment disputes</li><li>Unauthorized sharing, reselling, or distribution of products</li><li>Abusive, threatening, or harassing behavior toward staff or community members</li><li>Engagement in illegal activities or criminal conduct</li><li>Suspected security threats or malicious activity</li><li>Providing false or misleading information</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>13. Legal Disclaimer</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><strong>⚠️ CRITICAL LEGAL NOTICE:</strong></p><ul><li>HOKQQCHETO does not endorse or encourage violation of game publishers\' terms of service</li><li>Product usage is undertaken <strong>entirely at your own legal and financial risk</strong></li><li>We maintain <strong>no affiliation</strong> with any game publishers, developers, or platforms</li><li>You are solely responsible for compliance with all applicable laws and regulations</li><li>We do not provide legal counsel, advice, or protection from legal consequences</li><li>Use of our products may have legal implications in certain jurisdictions</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>14. Modifications to Terms</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">We reserve the right to modify these Terms & Conditions at any time. Material changes will be communicated via email or prominent website notice. Continued use of our services following modifications constitutes binding acceptance of updated terms.</p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><h5>15. Contact & Support Channels</h5><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;">For inquiries, support, or assistance:</p><ul><li><strong>Email Support:</strong> bubblegumm545432@gmail.com</li><li><strong>Phone Support:</strong> +8801762343843</li><li><strong>Telegram Direct:</strong> https://t.me/radeownND</li><li><strong>Community Group:</strong> https://t.me/HOKQQCHETO2</li><li><strong>Video Tutorials:</strong> https://youtube.com/@honorofkings-de6wi</li></ul><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><br></p><p style="color:rgb(105,105,105);font-family:\'DM Sans\', sans-serif;font-size:15px;"><strong>FINAL ACKNOWLEDGMENT:</strong> By completing a purchase on HOKQQCHETO, you certify that you have thoroughly read, fully understood, and unconditionally agree to these Terms & Conditions, including explicit acknowledgment of all risks, disclaimers, and limitations of liability associated with game enhancement software usage.</p>',
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
    'content' => '<h1>Privacy Policy</h1><p><br></p><p>At HOKQQCHETO, your privacy is important to us. This Privacy Policy outlines the types of information we collect, how we use it, and the measures we take to protect your data.</p><h2>1. Information We Collect</h2><h3>a. Personal Information</h3><p>We may collect personal information such as:</p><ul><li>Name</li><li>Email address</li><li>Date of birth</li><li>Payment information (for purchases or subscriptions)</li></ul><h3>b. Non-Personal Information</h3><p>We collect non-personal information, including:</p><ul><li>IP address</li><li>Browser type</li><li>Operating system</li><li>Device information</li><li>Game preferences and interaction data</li></ul><h3>c. Cookies and Tracking Technologies</h3><p>We use cookies, web beacons, and similar technologies to:</p><ul><li>Enhance your experience</li><li>Analyze website traffic</li><li>Personalize content and ads</li></ul><h2>2. How We Use Your Information</h2><p>The information we collect is used to:</p><ul><li>Provide and improve our services</li><li>Process transactions</li><li>Communicate updates, promotions, or notifications</li><li>Customize user experiences</li><li>Ensure security and prevent fraud</li></ul><h2>3. Sharing Your Information</h2><p>We do not sell your personal information. However, we may share your data:</p><ul><li>With trusted partners who assist in providing our services</li><li>For legal compliance or to protect our rights</li><li>In case of a merger, acquisition, or asset sale</li></ul><h2>4. Third-Party Services</h2><p>Our website may include links to third-party services or games. We are not responsible for the privacy practices of these external websites.</p><h2>5. Data Security</h2><p>We implement robust security measures to protect your data from unauthorized access, alteration, or disclosure. However, no method of electronic transmission is completely secure.</p><h2>6. Your Rights</h2><p>Depending on your location, you may have the following rights:</p><ul><li>Access your personal information</li><li>Request correction of inaccurate data</li><li>Delete your data</li><li>Opt-out of marketing communications</li><li>Restrict or object to certain processing activities</li></ul><p>To exercise these rights, contact us at [Insert Contact Email].</p><h2>7. Children’s Privacy</h2><p>HOKQQCHETO is not directed toward children under 13, and we do not knowingly collect personal information from them. If we discover that we have inadvertently collected data from a child, we will delete it promptly.</p><h2>8. Changes to This Policy</h2><p>We may update this Privacy Policy from time to time. The revised policy will be effective immediately upon posting. Please review it periodically.</p><h2>9. Contact Us</h2><p>If you have any questions about this Privacy Policy or our data practices, please contact us at:</p><ul><li><strong>Email:</strong> [Insert Email Address]</li><li><strong>Address:</strong> [Insert Physical Address]</li></ul>',
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
    'content' => '<h1><span style="font-size:24px;">Terms and Conditions</span></h1><p>Welcome to HOKQQCHETO! These Terms and Conditions ("Terms") govern your use of our website and services. By accessing or using HOKQQCHETO, you agree to be bound by these Terms. If you do not agree, please refrain from using our platform.</p><h2><span style="font-size:18px;">1. Acceptance of Terms</span></h2><p>By accessing HOKQQCHETO, you:</p><ul><li>Confirm that you have read, understood, and agree to these Terms.</li><li>Agree to comply with all applicable laws and regulations.</li><li>Understand that these Terms constitute a legally binding agreement.</li></ul><h2><span style="font-size:18px;">2. Eligibility</span></h2><p>To use HOKQQCHETO, you must:</p><ul><li>Be at least 13 years old. If you are under 18, you must have parental or guardian consent.</li><li>Ensure that your use of the platform does not violate any laws applicable to you.</li></ul><h2><span style="font-size:18px;">3. User Accounts</span></h2><h3><span style="font-size:18px;">a. Account Creation</span></h3><p>You may need to register for an account to access certain features. You agree to:</p><ul><li>Provide accurate and truthful information.</li><li>Keep your login credentials secure and confidential.</li></ul><h3><span style="font-size:18px;">b. Account Suspension or Termination</span></h3><p>We reserve the right to suspend or terminate your account for:</p><ul><li>Breach of these Terms.</li><li>Engaging in prohibited activities.</li><li>Providing false information during registration.</li></ul><h2><span style="font-size:18px;">4. Use of Services</span></h2><p>You agree to use HOKQQCHETO for lawful purposes only. You are prohibited from:</p><ul><li>Uploading harmful, offensive, or illegal content.</li><li>Attempting to disrupt the functionality of the platform.</li><li>Impersonating other users or entities.</li><li>Engaging in spamming, phishing, or other fraudulent activities.</li></ul><h2><span style="font-size:18px;">5. Intellectual Property</span></h2><ul><li>All content, trademarks, and materials on HOKQQCHETO are owned by or licensed to us.</li><li>You may not reproduce, distribute, or modify our content without prior written permission.</li><li>Any content you submit (e.g., comments or posts) grants us a non-exclusive, royalty-free license to use it.</li></ul><h2><span style="font-size:18px;">6. Purchases and Payments</span></h2><p>If you make purchases on HOKQQCHETO, you agree to:</p><ul><li>Provide valid and up-to-date payment information.</li><li>Abide by any specific terms related to transactions.</li><li>Accept that all purchases are subject to our refund policy.</li></ul><h2><span style="font-size:18px;">7. Content and Community Guidelines</span></h2><p>You agree that:</p><ul><li>Any content you post or share does not violate third-party rights, laws, or our guidelines.</li><li>We reserve the right to remove or edit content deemed inappropriate or in violation of these Terms.</li></ul><h2><span style="font-size:18px;">8. Limitation of Liability</span></h2><p>To the maximum extent permitted by law:</p><ul><li>HOKQQCHETO is provided "as is" without warranties of any kind.</li><li>We are not liable for any damages, including loss of data, revenue, or opportunities arising from your use of our platform.</li></ul><h2><span style="font-size:18px;">9. Privacy Policy</span></h2><p>Your use of HOKQQCHETO is also governed by our <a href="#">Privacy Policy</a>, which explains how we collect, use, and protect your data.</p><h2><span style="font-size:18px;">10. Modifications to Terms</span></h2><p>We may update these Terms periodically. By continuing to use the platform after updates, you accept the revised Terms.</p><h2><span style="font-size:18px;">11. Governing Law</span></h2><p>These Terms are governed by the laws of [Your Country/Region]. Any disputes will be resolved exclusively in the courts of [Your Jurisdiction].</p><h2><span style="font-size:18px;">12. Contact Information</span></h2><p>If you have questions or concerns regarding these Terms, please contact us at:</p><ul><li><strong>Email:</strong> [Insert Email Address]</li><li><strong>Address:</strong> [Insert Physical Address]</li></ul>',
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




