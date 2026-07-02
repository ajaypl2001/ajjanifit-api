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
        Schema::create('members', function (Blueprint $table) {

            $table->id();

            $table->foreignId('gym_id')
                  ->constrained('gyms')
                  ->cascadeOnDelete();

            $table->foreignId('branch_id')
                  ->constrained('gym_branches')
                  ->cascadeOnDelete();

            $table->string('member_code')->unique();

            $table->string('name');

            $table->string('email')->nullable();

            $table->string('phone', 20);

            $table->enum('gender', [
                'male',
                'female',
                'other'
            ]);

            $table->date('dob')->nullable();

            $table->decimal('height', 5, 2)->nullable()
                  ->comment('Height in CM');

            $table->decimal('weight', 5, 2)->nullable()
                  ->comment('Weight in KG');

            $table->date('join_date');

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
        Schema::dropIfExists('members');
    }
};