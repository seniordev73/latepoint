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
        Schema::create('service_extras', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->text('short_description')->nullable();
            $table->decimal('charge_amount', 20, 4)->nullable();
            $table->integer('duration');
            $table->integer('maximum_quantity')->nullable();
            $table->longText('selection_image_id')->nullable();
            $table->longText('description_image_id')->nullable();
            $table->longText('multiplied_by_attendies')->nullable();
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_extras');
    }
};
