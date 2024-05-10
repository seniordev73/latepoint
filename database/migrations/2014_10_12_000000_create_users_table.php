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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('account_type')->default(0);
            $table->string('avatar')->nullable();
            $table->string('provider', 20)->nullable();
            $table->string('provider_id')->nullable();
            $table->string('access_token')->nullable();
            $table->integer('invited_by_user_id')->nullable(); 
            $table->integer('parent_user_id')->nullable(); //  parent account
            $table->integer('is_verified')->default(0)->nullable(true); // 0-not verified, 1-verified
            $table->integer('status')->default(0)->nullable(true); // 0-inactive, 1-active
            $table->boolean('is_deleted')->default(0);
            $table->dateTime('deleted_at')->nullable(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
