<?php

namespace Database\Seeders;

use App\Enum\User\RoleEnum;
use App\Models\User;
use App\Pipelines\QueryFilter\Civilian\BetweenAge;
use App\Pipelines\QueryFilter\Helper\CivilianPipeline;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /**
         * random between kader or admin
         */
        User::factory()->count(
            CivilianPipeline::thenReturnStatic([
                BetweenAge::class . ':' . 40 . ',' . 20
            ])
            ->count() - 1
        )->create();
        /**
         * only one ketua
         */
        User::factory()->create([
            'role' => RoleEnum::CHAIRMAN->value,
            'email' => 'hello@example.com'
        ]);
    }
}
