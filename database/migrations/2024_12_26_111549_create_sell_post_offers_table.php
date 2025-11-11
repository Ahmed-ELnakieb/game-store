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
        Schema::create('sell_post_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->integer('author_id');
            $table->unsignedBigInteger('sell_post_id')->nullable();
            $table->decimal('amount', 11, 2)->nullable();
            $table->mediumText('description')->nullable();
            $table->boolean('status')->default(0);
            $table->string('uuid', 191)->nullable();
            $table->dateTime('attempt_at')->nullable();
            $table->boolean('payment_status')->default(0);
            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sell_post_offers');
    }
};
