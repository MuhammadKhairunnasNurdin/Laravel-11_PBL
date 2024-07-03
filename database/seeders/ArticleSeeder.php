<?php

namespace Database\Seeders;

use App\Enum\User\RoleEnum;
use App\Models\Article;
use App\Models\User;
use App\Pipelines\QueryFilter\User\ByRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Pipeline;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()->count(50)->create();
    }
}
