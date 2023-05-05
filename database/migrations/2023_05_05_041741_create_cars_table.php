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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('vin');
            $table->foreignId('year_id')->nullable()->constrained('years');
            $table->foreignId('make_id')->nullable()->constrained('makes');
            $table->foreignId('car_model_id')->nullable()->constrained('car_models');
            $table->foreignId('type_id')->nullable()->constrained('types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
