<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->sentence(3),
            "price" => $this->faker->numberBetween(1000, 5000),
            "in_stock" => $this->faker->numberBetween(0, 1)
        ];
    }
}
