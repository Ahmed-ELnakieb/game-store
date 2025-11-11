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
        Schema::create('service_pricing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_service_id'); // Links to CardService (Hack Type)
            $table->unsignedBigInteger('duration_id'); // Links to ServiceDuration
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2)->default(0);
            $table->enum('discount_type', ['flat', 'percentage'])->default('flat');
            $table->integer('stock_count')->default(0)->comment('Available keys for this combo');
            $table->boolean('status')->default(1);
            $table->timestamps();
            
            $table->foreign('card_service_id')->references('id')->on('card_services')->onDelete('cascade');
            $table->foreign('duration_id')->references('id')->on('service_durations')->onDelete('cascade');
            $table->unique(['card_service_id', 'duration_id'], 'unique_service_duration');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_pricing');
    }
};
