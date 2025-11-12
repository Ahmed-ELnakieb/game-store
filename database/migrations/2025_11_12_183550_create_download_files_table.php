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
        Schema::create('download_files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('file_url');
            $table->string('file_type')->nullable(); // e.g., 'game', 'hack', 'tool', 'guide'
            $table->string('icon')->nullable(); // Font Awesome icon class
            $table->bigInteger('file_size')->nullable(); // in bytes
            $table->string('version')->nullable();
            $table->boolean('status')->default(1); // 1 = active, 0 = inactive
            $table->integer('download_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('download_files');
    }
};
