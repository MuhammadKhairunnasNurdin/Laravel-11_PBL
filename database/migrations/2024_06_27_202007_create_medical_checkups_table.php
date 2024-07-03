<?php

use App\Enum\MedialCheckup\GroupEnum;
use App\Enum\MedialCheckup\StatusEnum;
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
        Schema::create('medical_checkups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('civilian_id')->constrained('civilians')->cascadeOnDelete();
            $table->date('checkup_date')->default(now());
            $table->enum('group', GroupEnum::getValues());
            $table->decimal('weight', 6, 3);
            $table->decimal('height', 6, 3);
            $table->enum('status', StatusEnum::getValues());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_checkups');
    }
};
