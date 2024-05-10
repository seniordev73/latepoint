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
        Schema::create('process_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('process_id');
            $table->unsignedBigInteger('object_id');
            $table->string('object_model_type', 55)->nullable();
            $table->text('settings')->nullable();
            $table->datetime('to_run_after_utc')->nullable();
            $table->string('status', 30)->default('scheduled');
            $table->text('run_result')->nullable();
            $table->text('process_info')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('process_jobs');
    }
};
