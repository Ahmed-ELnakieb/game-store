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
        Schema::table('basic_controls', function (Blueprint $table) {
            $table->boolean('use_queue_for_orders')->default(0)->after('auto_complete_orders')->comment('Use queue jobs for order processing (0=direct, 1=queue)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('basic_controls', function (Blueprint $table) {
            $table->dropColumn('use_queue_for_orders');
        });
    }
};
