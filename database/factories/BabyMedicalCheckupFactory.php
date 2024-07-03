<?php

namespace Database\Factories;

use App\Enum\BabyMedicalCheckup\BreastMilkEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BabyMedicalCheckup>
 */
class BabyMedicalCheckupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'head_perimeter' => $this->faker->randomFloat(6, 20.999, 100.999),
            'arm_perimeter' => $this->faker->randomFloat(6, 5.999, 15.999),
            'breast_milk' => $this->faker->randomElement(BreastMilkEnum::getValues()),
        ];
    }
}
