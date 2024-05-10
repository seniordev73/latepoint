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
        Schema::create('bookings_service_extras', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id');
            $table->integer('service_extra_id');
            $table->integer('duration');
            $table->integer('quantity');
            $table->decimal('price', 20, 4)->nullable();
            $table->timestamps();

            $table->index('booking_id');
            $table->index('service_extra_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings_service_extras');
    }
};
