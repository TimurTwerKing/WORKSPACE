<?php

namespace Database\Seeders;
use App\Models\Snack;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SnackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Snack::factory(9999)->create();

        Snack::factory()->create([
            "name" => fake()->name(),
            "brand" => fake()->text(10),
            "weight" => rand(5, 25),
            "color" => fake()->randomElement(["amarillo", "verde", "rojo"])
        ]);


    }
}
