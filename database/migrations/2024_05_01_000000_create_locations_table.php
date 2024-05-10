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
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('full_address')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->integer('order_number')->nullable();
            $table->longText('selection_image_id')->nullable();
            $table->timestamps();

            // Define indexes
            $table->index('status', 'status_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
