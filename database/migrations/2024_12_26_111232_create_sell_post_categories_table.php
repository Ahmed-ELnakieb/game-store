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
        Schema::create('sell_post_categories', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('image_driver', 20)->nullable();
            $table->text('form_field');
            $table->text('post_specification_form');
            $table->decimal('sell_charge', 10, 2)->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_post_categories');
    }
};
