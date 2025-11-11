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
        Schema::create('sell_post_chats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sell_post_id');
            $table->integer('offer_id');
            $table->string('chatable_type');
            $table->unsignedBigInteger('chatable_id');
            $table->longText('description')->nullable();
            $table->boolean('is_read')->default(0);
            $table->boolean('is_read_admin')->default(0);
            $table->timestamps();
            
            $table->foreign('sell_post_id')->references('id')->on('sell_posts')->onDelete('cascade');
            $table->index(['chatable_type', 'chatable_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_post_chats');
    }
};
