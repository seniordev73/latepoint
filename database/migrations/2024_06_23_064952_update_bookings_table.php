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
        //
        Schema::table('bookings', function (Blueprint $table) {
            $table->time('start_time')->change();
            $table->time('end_time')->change();
            $table->string('first_name', 100);
            $table->string('last_name', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('bookings', function (Blueprint $table) {
            $table->string('start_time')->change();
            $table->string('end_time')->change();
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
        });
    }
};
