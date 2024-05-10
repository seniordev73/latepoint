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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_id')->nullable();
            $table->integer('booking_id')->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('customer_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->string('code', 255);
            $table->text('description')->nullable();
            $table->string('initiated_by', 100)->nullable();
            $table->integer('initiated_by_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
