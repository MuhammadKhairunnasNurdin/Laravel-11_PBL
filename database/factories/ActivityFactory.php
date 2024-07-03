<?php

namespace Database\Factories;

use App\Enum\User\RoleEnum;
use App\Pipelines\QueryFilter\Helper\UserService;
use App\Pipelines\QueryFilter\User\ByRole;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement(
                UserService::thenReturnStatic([
                    ByRole::class . ':' . RoleEnum::MEMBER->value,
                ])
                ->pluck('id')
                ->toArray()
            ),
            'name' => $this->faker->sentence(),
            'date_of_activity' => $this->faker->date(),
            'start_time' => $this->faker->time(),
            'place' => $this->faker->streetName(),
        ];
    }
}
