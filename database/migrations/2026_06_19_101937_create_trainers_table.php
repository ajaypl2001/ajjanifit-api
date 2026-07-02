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
        Schema::create('trainers', function (Blueprint $table) {

            $table->id();

            $table->foreignId('gym_id')
                  ->constrained('gyms')
                  ->cascadeOnDelete();

            $table->foreignId('branch_id')
                  ->nullable()
                  ->constrained('gym_branches')
                  ->nullOnDelete();

            $table->string('name');

            $table->string('phone', 20);

            $table->string('email')->nullable();

            $table->string('specialization')->nullable();
            // Weight Loss, Muscle Gain, Yoga, Cardio, CrossFit

            $table->decimal('salary', 10, 2)->default(0);

            $table->date('joining_date');

            $table->boolean('status')
                  ->default(1)
                  ->comment('1=Active,0=Inactive');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};