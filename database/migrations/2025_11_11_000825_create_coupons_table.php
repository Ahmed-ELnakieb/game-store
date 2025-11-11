<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('code')->nullable()->unique();
            $table->float('discount')->default(0);
            $table->enum('discount_type', ['percent', 'flat'])->default('percent');
            $table->integer('used_limit')->default(0);
            $table->boolean('is_unlimited')->default(1)->comment('0=>no,1=>yes');
            $table->longText('top_up_list')->nullable();
            $table->longText('card_list')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->integer('total_use')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
