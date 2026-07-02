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
        Schema::create('salaries', function (Blueprint $table) {

            $table->id();

            $table->foreignId('trainer_id')
                  ->constrained('trainers')
                  ->cascadeOnDelete();

            $table->decimal('amount', 10, 2);

            $table->string('salary_month');
            // Example: 2026-06

            $table->enum('status', [
                'pending',
                'paid'
            ])->default('pending');

            $table->timestamps();

            $table->unique(['trainer_id', 'salary_month']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};