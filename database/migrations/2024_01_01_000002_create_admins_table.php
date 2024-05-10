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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('display_name')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('status');
            $table->timestamps();
      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
