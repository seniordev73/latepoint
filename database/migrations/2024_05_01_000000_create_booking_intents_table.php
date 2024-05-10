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
        Schema::create('booking_intents', function (Blueprint $table) {
            $table->id();
            $table->string('intent_key', 55)->unique();
            $table->integer('customer_id');
            $table->text('booking_data')->nullable();
            $table->text('restrictions_data')->nullable();
            $table->text('payment_data')->nullable();
            $table->integer('booking_id')->nullable();
            $table->text('booking_form_page_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_intents');
    }
};
