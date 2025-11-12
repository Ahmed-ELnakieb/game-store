<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('codes', function (Blueprint $table) {
            $table->id();
            $table->morphs('codeable');
            $table->unsignedBigInteger('duration_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->comment('User who activated this code');
            $table->string('passcode')->nullable();
            $table->boolean('status')->default(1)->comment("0=>inactive,1=>active");
            $table->timestamp('activated_at')->nullable()->comment('When the code was activated');
            $table->timestamp('expires_at')->nullable()->comment('When the code expires');
            $table->text('expiry_message')->nullable()->comment('Message shown when key expires');
            $table->timestamps();
            
            $table->foreign('duration_id')->references('id')->on('service_durations')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codes');
    }
};
