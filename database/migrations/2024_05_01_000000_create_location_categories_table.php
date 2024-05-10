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
        Schema::create('location_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('short_description')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('selection_image_id')->nullable();
            $table->integer('order_number')->nullable();
            $table->timestamps();

            $table->index('order_number');
            $table->index('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location_categories');
    }
};
