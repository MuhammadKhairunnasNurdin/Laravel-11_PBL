<?php

namespace Database\Factories;

use App\Enum\MedialCheckup\GroupEnum;
use App\Enum\MedialCheckup\StatusEnum;
use App\Enum\User\RoleEnum;
use App\Pipelines\QueryFilter\Civilian\BetweenAge;
use App\Pipelines\QueryFilter\Civilian\ByAge;
use App\Pipelines\QueryFilter\Civilian\ById;
use App\Pipelines\QueryFilter\Helper\CivilianService;
use App\Pipelines\QueryFilter\Helper\UserService;
use App\Pipelines\QueryFilter\User\ByRole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicalCheckup>
 */
class MedicalCheckupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $id = $this->faker->randomElement(
            CivilianService::thenReturnStatic([
                BetweenAge::class . ':' . 50 . ',' . 5
            ])
            ->pluck('id')
            ->toArray()
        );

        return [
            'user_id' => $this->faker->randomElement(
                UserService::thenReturnStatic([
                    ByRole::class . ':' . RoleEnum::MEMBER->value,
                ])
                ->pluck('id')
                ->toArray()),
            'civilian_id' => $id,
            'checkup_date' => $this->faker->dateTimeBetween('-1 years')->format('Y-m-d'),
            'group' => CivilianService::thenReturnStatic([
                ById::class . ":$id",
                ByAge::class . ":<=,50",
            ])->get()->isNotEmpty() ? GroupEnum::ELDERLY->value : GroupEnum::BABY->value,
            'weight' => $this->faker->randomFloat(6, 30.999, 200.999),
            'height' => $this->faker->randomFloat(6, 0.666, 2.999),
            'status' => $this->faker->randomElement(StatusEnum::getValues())
        ];
    }

    /**
     * additional different value or attribute for different group: Bayi or Lansia
     */
    public function elderly(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'civilian_id' => $this->faker->randomElement(
                    CivilianService::thenReturnStatic([
                        ByAge::class . ':<=,50',
                    ])
                    ->pluck('id')
                    ->toArray()
                ),
                'group' => GroupEnum::ELDERLY->value,
            ];
        });
    }
    public function baby(): self
    {
        return $this->state(function (array $attributes) {
            return [
                'civilian_id' => $this->faker->randomElement(
                    CivilianService::thenReturnStatic([
                        ByAge::class . ':>=,5',
                    ])
                    ->pluck('id')
                    ->toArray()
                ),
                'group' => GroupEnum::BABY->value,
            ];
        });
    }
}
