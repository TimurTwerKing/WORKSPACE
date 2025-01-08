<?php

namespace Database\Seeders;
use App\Models\Drink;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DrinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Drink::factory(10)->create();

        Drink::factory()->create([
            "name" => fake()->word(),
            "brand" => fake()->company(),
            "ml" => fake()->randomFloat(2, 0.33, 2),
            "price" => fake()->randomFloat(2, 0.50, 10),
        ]);
    }

}

