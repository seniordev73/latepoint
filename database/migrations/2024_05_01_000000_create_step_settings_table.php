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
        Schema::create('step_settings', function (Blueprint $table) {
            $table->id();
            $table->string('label', 50);
            $table->text('value')->nullable();
            $table->string('step', 50)->nullable();
            $table->timestamps();

            $table->index('step');
            $table->index('label');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('step_settings');
    }
};
