<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ElderlyMedicalCheckup>
 */
class ElderlyMedicalCheckupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'stomach_perimeter' => $this->faker->randomFloat(6, 50.9999, 200.999),
            'gout' => $this->faker->randomFloat(6, 0.9999, 11.999),
            'blood_sugar' => $this->faker->randomFloat(3, 50, 800),
            'blood_pressure' => $this->faker->randomFloat(3, 50, 800),
            'cholesterol' => $this->faker->randomFloat(3, 50, 800),
        ];
    }
}
