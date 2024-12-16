<?php

namespace Database\Seeders;
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
        // Snack::factory(9999)->create();

        for ($i = 0; $i < 10; $i++) {
            DB::table("drinks")->insert([
                "name" => fake()->name(),
                "brand" => fake()->text(10),
                "ml" => rand(0.33, 2),
            ]);
        }

    }
}
