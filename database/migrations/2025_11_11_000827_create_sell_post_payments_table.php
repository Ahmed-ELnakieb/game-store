<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sell_post_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('Payment By');
            $table->integer('sell_post_id')->nullable();
            $table->decimal('price', 8, 2)->default(0);
            $table->decimal('discount', 8, 2)->default(0);
            $table->decimal('seller_amount', 10, 2)->default(0)->comment('seller will receive amount');
            $table->decimal('admin_amount', 10, 2)->default(0)->comment('admin will receive amount');
            $table->tinyInteger('status')->default(0)->comment('1=> Complete');
            $table->tinyInteger('payment_status')->default(0)->comment('1=> active, 2=> rejected, 3=> pending');
            $table->boolean('payment_release')->default(0)->comment('1 => released, 2 =>Hold');
            $table->timestamp('released_at')->nullable()->comment('Payment release to user');
            $table->string('transaction', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sell_post_payments');
    }
};
