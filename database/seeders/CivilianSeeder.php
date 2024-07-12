<?php

namespace Database\Seeders;

use App\Models\Civilian;
use Illuminate\Database\Seeder;

class CivilianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $headOfFamily = Civilian::factory()->headOfFamily()->create();
            Civilian::factory()->wife()->create([
                'NKK' => $headOfFamily->NKK,
                'address' => $headOfFamily->address,
                'RT' => $headOfFamily->RT,
            ]);
            Civilian::factory()->count(2)->children()->create([
                'NKK' => $headOfFamily->NKK,
                'address' => $headOfFamily->address,
                'RT' => $headOfFamily->RT,
            ]);
        }
    }
}
