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
        Schema::create('sell_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->integer('price');
            $table->longText('details');
            $table->mediumText('comments');
            $table->longText('credential');
            $table->text('post_specification_form');
            $table->decimal('sell_charge', 10, 2)->default(0);
            $table->text('image')->nullable();
            $table->string('image_driver', 20)->nullable();
            $table->integer('status')->default(0);
            $table->integer('lock_for')->nullable();
            $table->timestamp('lock_at')->nullable();
            $table->boolean('payment_lock')->default(0);
            $table->boolean('payment_status')->default(0);
            $table->string('payment_uuid', 191);
            $table->timestamps();
            
            $table->foreign('category_id')->references('id')->on('sell_post_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_posts');
    }
};
