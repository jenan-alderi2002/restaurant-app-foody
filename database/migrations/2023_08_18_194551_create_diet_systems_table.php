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
        Schema::create('diet_systems', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('explanation');
          //  $table->text('foods');
            $table->foreignId('food_id')->references('id')->on('food')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diet_systems');
    }
};
