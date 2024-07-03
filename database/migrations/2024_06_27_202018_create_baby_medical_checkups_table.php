<?php

use App\Enum\BabyMedicalCheckup\BreastMilkEnum;
use App\Enum\BabyMedicalCheckup\GroupCategoryEnum;
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
        Schema::create('baby_medical_checkups', function (Blueprint $table) {
            $table->foreignId('id')->primary()->constrained('medical_checkups');
            $table->decimal('head_perimeter', 6, 3);
            $table->decimal('arm_perimeter', 6, 3);
            $table->enum('breast_milk', BreastMilkEnum::getValues());
            $table->enum('group_category', GroupCategoryEnum::getValues());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baby_medical_checkups');
    }
};
