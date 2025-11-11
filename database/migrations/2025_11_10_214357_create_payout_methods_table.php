<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payout_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->text('description')->nullable();
            $table->text('bank_name')->nullable();
            $table->text('banks')->nullable();
            $table->text('parameters')->nullable();
            $table->text('extra_parameters')->nullable();
            $table->text('inputForm')->nullable();
            $table->text('currency_lists')->nullable();
            $table->text('supported_currency')->nullable();
            $table->text('payout_currencies')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('is_automatic')->default(0);
            $table->tinyInteger('is_sandbox')->default(0);
            $table->string('environment')->default('live');
            $table->tinyInteger('confirm_payout')->default(0);
            $table->tinyInteger('is_auto_update')->default(0);
            $table->tinyInteger('currency_type')->default(0);
            $table->string('logo')->nullable();
            $table->string('driver')->default('local');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payout_methods');
    }
};
