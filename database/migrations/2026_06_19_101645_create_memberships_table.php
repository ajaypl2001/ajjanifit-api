<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('memberships', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('member_id');

            $table->unsignedBigInteger('plan_id');

            $table->date('start_date');

            $table->date('end_date');

            $table->decimal('amount', 10, 2);

            $table->enum('payment_status', [
                'pending',
                'partial',
                'paid'
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};