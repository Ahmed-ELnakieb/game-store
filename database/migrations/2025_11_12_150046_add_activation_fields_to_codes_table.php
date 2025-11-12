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
            $table->unsignedBigInteger('user_id')->nullable()->after('duration_id')->comment('User who activated this code');
            $table->timestamp('activated_at')->nullable()->after('status')->comment('When the code was activated');
            $table->timestamp('expires_at')->nullable()->after('activated_at')->comment('When the code expires');
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('codes', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'activated_at', 'expires_at']);
        });
    }
};
