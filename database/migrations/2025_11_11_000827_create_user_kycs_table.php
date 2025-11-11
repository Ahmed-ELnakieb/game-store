<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_kycs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->integer('kyc_id')->nullable();
            $table->string('kyc_type', 191)->nullable();
            $table->text('kyc_info')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=>pending , 1=> verified, 2=>rejected');
            $table->longText('reason')->nullable()->comment('rejected reason');
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_kycs');
    }
};
