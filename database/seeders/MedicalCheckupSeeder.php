<?php

namespace Database\Seeders;

use App\Enum\BabyMedicalCheckup\GroupCategoryEnum;
use App\Models\BabyMedicalCheckup;
use App\Models\ElderlyMedicalCheckup;
use App\Models\MedicalCheckup;
use App\Pipelines\QueryFilter\Civilian\ByAge;
use App\Pipelines\QueryFilter\Helper\CivilianPipeline;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MedicalCheckupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * create a medicalCheckup record with corresponding babyMedicalCheckup record
         */
        $babyCount = CivilianPipeline::thenReturnStatic([
            ByAge::class . ':>=,5'
        ])->count();
        for ($i = 0; $i < $babyCount; $i++) {
            $medicalData = MedicalCheckup::factory()->baby()->create();
            BabyMedicalCheckup::factory()->create([
                'id' => $medicalData->id,
                'group_category' =>
                    Carbon::now()
                        ->diffInYears(
                            Carbon::make(
                                MedicalCheckup::with('civilian')
                                    ->find($medicalData->id)
                                    ->getRelation('civilian')
                                ['date_of_birth']
                            )
                        ) <= 3 ? GroupCategoryEnum::BABY->value : GroupCategoryEnum::TODDLER->value,
            ]);
        }

        /**
         * create a medicalCheckup record with corresponding babyMedicalCheckup record
         */
        $elderlyCount = CivilianPipeline::thenReturnStatic([
            ByAge::class . ':<=,50'
        ])->count();
        for ($i = 0; $i < $elderlyCount; $i++) {
            $medicalData = MedicalCheckup::factory()->elderly()->create();
            ElderlyMedicalCheckup::factory()->create([
                'id' => $medicalData->id
            ]);
        }
    }
}
