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
        Schema::table('download_files', function (Blueprint $table) {
            $table->foreignId('card_id')->nullable()->after('id')->constrained('cards')->onDelete('cascade');
            $table->string('auth_username')->nullable()->after('file_url');
            $table->string('auth_password')->nullable()->after('auth_username');
            $table->boolean('requires_auth')->default(1)->after('auth_password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('download_files', function (Blueprint $table) {
            $table->dropForeign(['card_id']);
            $table->dropColumn(['card_id', 'auth_username', 'auth_password', 'requires_auth']);
        });
    }
};
