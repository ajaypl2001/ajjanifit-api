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
        Schema::create('leads', function (Blueprint $table) {

            $table->id();

            $table->foreignId('gym_id')
                  ->constrained('gyms')
                  ->cascadeOnDelete();

            $table->string('name');

            $table->string('phone', 20);

            $table->string('email')->nullable();

            $table->string('source')->nullable();
            // Walk-in, Facebook, Instagram, Google, Website, Referral

            $table->enum('status', [
                'New',
                'Interested',
                'Trial',
                'Joined',
                'Lost'
            ])->default('New');

            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->index(['gym_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};