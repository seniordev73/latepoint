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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->text('token');
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('processor', 100);
            $table->string('payment_method', 55)->nullable();
            $table->string('payment_portion', 55)->nullable();
            $table->string('funds_status', 40)->nullable();
            $table->string('status', 100);
            $table->decimal('amount', 20, 4)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
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
