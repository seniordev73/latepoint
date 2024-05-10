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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_code', 10)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('start_time')->nullable();
            $table->integer('end_time')->nullable();
            $table->datetime('start_datetime_utc')->nullable();
            $table->datetime('end_datetime_utc')->nullable();
            $table->integer('buffer_before');
            $table->integer('buffer_after');
            $table->integer('duration')->nullable();
            $table->decimal('subtotal', 20, 4)->nullable();
            $table->decimal('price', 20, 4)->nullable();
            $table->string('status', 30)->default('pending');
            $table->string('payment_status', 30)->default('not_paid');
            $table->integer('customer_id');
            $table->integer('service_id');
            $table->integer('agent_id');
            $table->integer('location_id')->nullable();
            $table->integer('total_attendies')->nullable();
            $table->string('payment_method', 55)->nullable();
            $table->string('payment_portion', 55)->nullable();
            $table->string('ip_address', 55)->nullable();
            $table->string('source_id', 100)->nullable();
            $table->text('source_url')->nullable();
            $table->string('coupon_code', 100)->nullable();
            $table->decimal('coupon_discount', 20, 4)->nullable();
            $table->text('customer_comment')->nullable();
            $table->timestamps();

            $table->index('start_date');
            $table->index('end_date');
            $table->index('status');
            $table->index('customer_id');
            $table->index('service_id');
            $table->index('agent_id');
            $table->index('location_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
