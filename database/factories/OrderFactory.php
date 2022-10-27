<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()->first();
        $product = Product::inRandomOrder()->first();
        $qty = $this->faker->numberBetween(1, 10);

        return [
            "user_id" => $user->id,
            "product_id" => $product->id,
            "user_name" => $user->name,
            "user_email" => $user->email,
            "product_name" => $product->name,
            "product_price" => $product->price,
            "qty" => $qty,
            "total" => $product->price * $qty,
        ];
    }
}
