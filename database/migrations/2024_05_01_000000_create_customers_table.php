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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('country')->nullable();
            $table->string('phone')->nullable();
            $table->longText('avatar_image_id')->nullable();
            $table->string('status');
            // $table->string('password')->nullable();
            $table->string('activation_key')->nullable();
            $table->string('account_nonse')->nullable();
            $table->string('google_user_id')->nullable();
            $table->string('facebook_user_id')->nullable();
            $table->tinyInteger('is_guest')->nullable();
            $table->text('notes')->nullable();
            $table->text('admin_notes')->nullable();
            $table->timestamps();
      
            // Define indexes
            $table->index('email', 'email_index');
            $table->index('status', 'status_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
