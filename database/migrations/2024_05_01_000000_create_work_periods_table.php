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
        Schema::create('work_periods', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('agent_id');
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('location_id');
            $table->smallInteger('start_time');
            $table->smallInteger('end_time');
            $table->tinyInteger('week_day');
            $table->date('custom_date')->nullable();
            $table->string('chain_id', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_periods');
    }
};
