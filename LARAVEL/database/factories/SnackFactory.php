<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Snack>
 */
class SnackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "brand" => $this->faker->text(10),
            "weight" => rand(5, 25),
            "color" => $this->faker->randomElement(["amarillo", "verde", "rojo"])
        ];
    }
}
