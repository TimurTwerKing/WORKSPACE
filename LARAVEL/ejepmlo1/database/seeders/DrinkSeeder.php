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
        for ($i = 0; $i < 10; $i++) {
            DB::table("drinks")->insert([
                "name" => fake()->name(),
                "brand" => fake()->text(10),
                "size" => rand(100, 1000),
                "container" => fake()->randomElement(['aluminium', 'plastic', 'carton'])

            ]);
        }
    }
}
