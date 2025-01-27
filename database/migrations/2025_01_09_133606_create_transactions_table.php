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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('event');
            $table->string('booking_code')->unique();
            $table->foreignId('asset_id')->constrained()->cascadeOnDelete();
            $table->enum('approval', ['wait', 'accept', 'deny'])->default('wait');
            $table->dateTime('start_date');
            $table->dateTime('finish_date');
            $table->foreignId('borrower_id')->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
