<?php

namespace Database\Factories;

use App\Enum\Civilian\EducationEnum;
use App\Enum\Civilian\GenderEnum;
use App\Enum\Civilian\IncomeEnum;
use App\Enum\Civilian\KinshipEnum;
use App\Enum\Civilian\RtEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Civilian>
 */
class CivilianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'NIK' => $this->faker->numerify(str_repeat('#', 16)),
            'NKK' => $this->faker->numerify(str_repeat('#', 16)),
            'name' => $this->faker->name($gender),
            'date_of_birth' => $this->faker->dateTimeBetween('-70 years', '-17 years'),
            'income' => $this->faker->randomElement(IncomeEnum::getValues()),
            'phone_number' => '+628' . $this->faker->numerify(str_repeat('#', 10)),
            'gender' => $gender === 'male' ? GenderEnum::MALE->value : GenderEnum::FEMALE->value,
            'education' => $this->faker->randomElement(EducationEnum::getValues()),
            'kinship' => $this->faker->randomElement(KinshipEnum::getValues()),
            'address' => $this->faker->address(),
            'RT' => $this->faker->randomElement(RtEnum::getValues()),
        ];
    }


    /**
     * additional different value attribute family for Head Of Family
     * @return self
     */
    public function headOfFamily():self
    {
        return $this->state(function () {
            return [
                'name' => $this->faker->name('male'),
                'gender' => GenderEnum::MALE->value,
                'kinship' => KinshipEnum::HEAD_OF_FAMILY->value,
                'income' => $this->faker->randomElement(IncomeEnum::getValuesWithout(IncomeEnum::RANGE_1->value)),
                'education' => $this->faker->randomElement(EducationEnum::getValuesWithout(EducationEnum::LEVEL_1->value)),
            ];
        });
    }
    /**
     * additional different value attribute family for Wife
     * @return self
     */
    public function wife(): self
    {
        return $this->state(function () {
            return [
                'name' => $this->faker->name('female'),
                'gender' => GenderEnum::FEMALE->value,
                'kinship' => KinshipEnum::WIFE->value,
                'income' => $this->faker->randomElement(IncomeEnum::getValuesWithout(IncomeEnum::RANGE_1->value)),
                'education' => $this->faker->randomElement(EducationEnum::getValuesWithout(EducationEnum::LEVEL_1->value)),
            ];
        });
    }
    /**
     * additional different value attribute family for Children
     * @return self
     */
    public function children(): self
    {
        return $this->state(function () {
            $gender = $this->faker->randomElement(['male', 'female']);
            return [
                'name' => $this->faker->name($gender),
                'date_of_birth' => $this->faker->dateTimeBetween('-10 years'),
                'income' => IncomeEnum::RANGE_1->value,
                'education' => EducationEnum::LEVEL_1->value,
                'gender' => $gender === 'male' ? GenderEnum::MALE->value : GenderEnum::FEMALE->value,
                'kinship' => KinshipEnum::CHILDREN->value,
                'phone_number' => null,
            ];
        });
    }
}
