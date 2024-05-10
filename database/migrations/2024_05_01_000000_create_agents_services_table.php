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
        Schema::create('agents_services', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_id');
            $table->integer('service_id');
            $table->integer('location_id')->nullable();
            $table->boolean('is_custom_hours')->nullable();
            $table->boolean('is_custom_price')->nullable();
            $table->boolean('is_custom_duration')->nullable();
            $table->timestamps();
            $table->index('agent_id');
            $table->index('service_id');
            $table->index('location_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents_services');
    }
};
