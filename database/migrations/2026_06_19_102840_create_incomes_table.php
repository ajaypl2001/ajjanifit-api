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
        Schema::create('incomes', function (Blueprint $table) {

            $table->id();

            $table->foreignId('gym_id')
                  ->constrained('gyms')
                  ->cascadeOnDelete();

            $table->foreignId('member_id')
                  ->nullable()
                  ->constrained('members')
                  ->nullOnDelete();

            $table->decimal('amount', 10, 2);

            $table->enum('payment_method', [
                'cash',
                'upi',
                'card',
                'bank_transfer'
            ]);

            $table->date('received_date');

            $table->timestamps();

            $table->index(['gym_id', 'received_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incomes');
    }
};