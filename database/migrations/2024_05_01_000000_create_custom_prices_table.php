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
        Schema::create('custom_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('agent_id');
            $table->integer('service_id');
            $table->integer('location_id');
            $table->tinyInteger('is_price_variable')->nullable();
            $table->decimal('price_min', 20, 4)->nullable();
            $table->decimal('price_max', 20, 4)->nullable();
            $table->decimal('charge_amount', 20, 4)->nullable();
            $table->tinyInteger('is_deposit_required')->nullable();
            $table->decimal('deposit_amount', 20, 4)->nullable();
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
        Schema::dropIfExists('custom_prices');
    }
};
