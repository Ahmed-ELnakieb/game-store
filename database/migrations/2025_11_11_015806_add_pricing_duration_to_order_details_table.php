<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->foreignId('pricing_id')->nullable()->after('detailable_id')->comment('Service pricing ID for duration-based pricing');
            $table->foreignId('duration_id')->nullable()->after('pricing_id')->comment('Service duration ID');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn(['pricing_id', 'duration_id']);
        });
    }
};
