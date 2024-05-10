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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->string('content_type', 20);
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('booking_id');
            $table->string('author_type', 20);
            $table->tinyInteger('is_hidden')->nullable();
            $table->tinyInteger('is_read')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
