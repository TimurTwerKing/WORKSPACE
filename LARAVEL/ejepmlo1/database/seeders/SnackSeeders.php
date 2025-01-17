<?php

namespace Database\Seeders;

use DB;
use App\Models\Snack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SnackSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Snack::factory()->count(10)->create();


        for ($i = 0; $i < 10; $i++) {
            DB::table("snacks")->insert([
                "name" => fake()->name(),
                "brand" => fake()->text(10),
                "weight" => rand(5, 25),
                "color" => fake()->randomElement(["rojo", "verde", "amarillo"])

            ]);
        }

    }
}
