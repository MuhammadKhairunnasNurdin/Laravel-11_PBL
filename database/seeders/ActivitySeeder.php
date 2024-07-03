<?php

namespace Database\Seeders;

use App\Enum\User\RoleEnum;
use App\Models\Activity;
use App\Models\User;
use App\Pipelines\QueryFilter\User\ByRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Pipeline;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::factory()->count(50)->create();
    }
}
