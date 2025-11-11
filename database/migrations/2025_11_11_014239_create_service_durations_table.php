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
        Schema::create('service_durations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50); // "1 Day", "7 Days", "30 Days"
            $table->integer('days'); // 1, 7, 30
            $table->string('code', 10); // "1D", "7D", "30D"
            $table->integer('sort_order')->default(1);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_durations');
    }
};
