<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SoldItem>
 */
class SoldItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::find(fake()->numberBetween(1,30));
        $qty = fake()->numberBetween(1,10);
        return [
            'sale_id' => fake()->numberBetween(1,100),
            'product_id' => $product->id,
            'qty' => $qty,
            'amount' => $product->retail_price * $qty
        ];
    }
}
