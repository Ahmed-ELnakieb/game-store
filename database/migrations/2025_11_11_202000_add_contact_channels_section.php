<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Add dark_contact_channels section before dark_contact on contact page
        DB::statement("
            UPDATE page_details 
            SET content = REPLACE(
                content,
                '[[dark_contact]]</div>',
                '[[dark_contact_channels]]</div>
                    <span class=\"delete-block\">×</span>
                    <span class=\"up-block\">↑</span>
                    <span class=\"down-block\">↓</span></div><p><br></p><div class=\"custom-block\" contenteditable=\"false\"><div class=\"custom-block-content\">[[dark_contact]]</div>'
            ),
            sections = '[\"dark_contact_channels\",\"dark_contact\"]'
            WHERE page_id = 8 AND content NOT LIKE '%dark_contact_channels%'
        ");
    }

    public function down(): void
    {
        // Remove dark_contact_channels section
        DB::statement("
            UPDATE page_details 
            SET content = REPLACE(
                content,
                '<div class=\"custom-block\" contenteditable=\"false\"><div class=\"custom-block-content\">[[dark_contact_channels]]</div>
                    <span class=\"delete-block\">×</span>
                    <span class=\"up-block\">↑</span>
                    <span class=\"down-block\">↓</span></div><p><br></p>',
                ''
            ),
            sections = '[\"dark_contact\"]'
            WHERE page_id = 8
        ");
    }
};
