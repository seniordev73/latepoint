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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->longText('avatar_image_id')->nullable();
            $table->longText('bio_image_id')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('display_name')->nullable();
            $table->string('title')->nullable();
            $table->text('bio')->nullable();
            $table->text('features')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            // $table->string('password')->nullable();
            $table->tinyInteger('custom_hours')->nullable();
            $table->string('status');
            $table->text('extra_emails')->nullable();
            $table->text('extra_phones')->nullable();
            $table->timestamps();
      
            // Define indexes
            $table->index('email', 'email_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
