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
        Schema::create('sell_post_category_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sell_post_category_id');
            $table->integer('language_id')->nullable();
            $table->string('name');
            $table->timestamps();
            
            $table->foreign('sell_post_category_id')->references('id')->on('sell_post_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_post_category_details');
    }
};
