<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CivilianSeeder::class,
            UserSeeder::class,
            MedicalCheckupSeeder::class,
            BabyMedicalCheckupSeeder::class,
            ElderlyMedicalCheckupSeeder::class,
            ActivitySeeder::class,
            ArticleSeeder::class,
        ]);
    }
}
