<?php

namespace Database\Seeders;

use App\Enum\MedialCheckup\GroupEnum;
use App\Models\BabyMedicalCheckup;
use App\Models\Civilian;
use App\Pipelines\QueryFilter\Civilian\ByAge;
use App\Pipelines\QueryFilter\Helper\MedicalCheckupService;
use App\Pipelines\QueryFilter\MedicalCheckup\ByGroup;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Pipeline\Pipeline;

class BabyMedicalCheckupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       //
    }
}
