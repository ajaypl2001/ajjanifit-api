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
        Schema::create('gym_branches', function (Blueprint $table) {

            $table->id();

            $table->foreignId('gym_id')
                  ->constrained('gyms')
                  ->cascadeOnDelete();

            $table->string('branch_name');

            $table->text('address')->nullable();

            $table->string('phone', 20)->nullable();

            $table->foreignId('manager_id')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gym_branches');
    }
};