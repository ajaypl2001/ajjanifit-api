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
        Schema::create('gyms', function (Blueprint $table) {

            $table->id();

            $table->foreignId('owner_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->string('gym_name');

            $table->string('email')->nullable();

            $table->string('phone',20);

            $table->text('address')->nullable();

            $table->string('city')->nullable();

            $table->string('state')->nullable();

            $table->string('country')->default('India');

            $table->string('logo')->nullable();

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
        Schema::dropIfExists('gyms');
    }
};