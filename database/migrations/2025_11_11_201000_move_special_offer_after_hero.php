<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Add dark_special_offer section after dark_hero on home page
        DB::statement("
            UPDATE page_details 
            SET content = REPLACE(
                content,
                '[[dark_hero]]</div>',
                '[[dark_hero]]</div>
                    <span class=\"delete-block\">×</span>
                    <span class=\"up-block\">↑</span>
                    <span class=\"down-block\">↓</span></div><p><br></p><div class=\"custom-block\" contenteditable=\"false\"><div class=\"custom-block-content\">[[dark_special_offer]]</div>'
            )
            WHERE page_id = 7 AND content NOT LIKE '%dark_special_offer%'
        ");
        
        // Update sections order
        DB::table('page_details')->where('page_id', 7)->update([
            'sections' => '["dark_hero","dark_special_offer","dark_exclusive_card","dark_about","dark_campaign","dark_top_up","dark_why_chose_us","dark_buy_game_id","dark_testimonial","dark_blog"]'
        ]);
    }

    public function down(): void
    {
        // Remove dark_special_offer section
        DB::statement("
            UPDATE page_details 
            SET content = REPLACE(
                content,
                '<div class=\"custom-block\" contenteditable=\"false\"><div class=\"custom-block-content\">[[dark_special_offer]]</div>
                    <span class=\"delete-block\">×</span>
                    <span class=\"up-block\">↑</span>
                    <span class=\"down-block\">↓</span></div><p><br></p>',
                ''
            )
            WHERE page_id = 7
        ");
        
        // Restore original sections order
        DB::table('page_details')->where('page_id', 7)->update([
            'sections' => '["dark_hero","dark_exclusive_card","dark_about","dark_campaign","dark_top_up","dark_why_chose_us","dark_buy_game_id","dark_testimonial","dark_blog"]'
        ]);
    }
};
