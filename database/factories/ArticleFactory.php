<?php

namespace Database\Factories;

use App\Enum\Article\TagEnum;
use App\Enum\User\RoleEnum;
use App\Pipelines\QueryFilter\Helper\UserPipeline;
use App\Pipelines\QueryFilter\User\ByRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $body = $this->faker->paragraph(10);

        return [
            'user_id' => $this->faker->randomElement(
                UserPipeline::thenReturnStatic([
                    ByRole::class . ':' . RoleEnum::MEMBER->value,
                ])
                ->pluck('id')
                ->toArray()
            ),
            'title' => $this->faker->sentence(2),
            'body' => $body,
            'excerpt' => Str::excerpt($body, '', ['radius' => 197]),
            'tag' => $this->faker->randomElement(TagEnum::getValues()),
        ];
    }
}
