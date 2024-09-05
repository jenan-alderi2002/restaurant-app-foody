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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
           $table->foreignId('table_id')->references('id')->on('tables')->onDelete('cascade');
           $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('date');
            $table->time('time_in');
            $table->time('time_out');
           // $table->string('number_customer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
