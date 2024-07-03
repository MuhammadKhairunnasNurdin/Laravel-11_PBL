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
        Schema::create('elderly_medical_checkups', function (Blueprint $table) {
            $table->foreignId('id')->primary()->constrained('medical_checkups');
            $table->decimal('stomach_perimeter', 6, 3);
            $table->decimal('gout', 5, 3);
            $table->integer('blood_sugar');
            $table->integer('blood_pressure');
            $table->integer('cholesterol');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elderly_medical_checkups');
    }
};
