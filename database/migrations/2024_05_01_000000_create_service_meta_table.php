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
        Schema::create('service_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('object_id');
            $table->string('meta_key', 110);
            $table->text('meta_value')->nullable();
            $table->timestamps();

            $table->index('meta_key');
            $table->index('object_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_meta');
    }
};
