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
        Schema::table('codes', function (Blueprint $table) {
            $table->unsignedBigInteger('duration_id')->nullable()->after('codeable_id');
            $table->foreign('duration_id')->references('id')->on('service_durations')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('codes', function (Blueprint $table) {
            $table->dropForeign(['duration_id']);
            $table->dropColumn('duration_id');
        });
    }
};
