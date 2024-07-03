<?php

use App\Enum\Civilian\EducationEnum;
use App\Enum\Civilian\GenderEnum;
use App\Enum\Civilian\IncomeEnum;
use App\Enum\Civilian\KinshipEnum;
use App\Enum\Civilian\RtEnum;
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
        Schema::create('civilians', function (Blueprint $table) {
            $table->id();
            $table->string('NIK', 20)->unique();
            $table->string('NKK', 20);
            $table->string('name', 100);
            $table->date('date_of_birth');
            $table->enum('income', IncomeEnum::getValues());
            $table->string('phone_number', 14)->nullable();
            $table->enum('gender', GenderEnum::getValues());
            $table->enum('education', EducationEnum::getValues());
            $table->enum('kinship', KinshipEnum::getValues());
            $table->string('address', 200);
            $table->enum('RT', RtEnum::getValues());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('civilians');
    }
};
