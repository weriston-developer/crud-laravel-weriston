<?php

// database/factories/ProductFactory.php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'type' => $this->faker->randomElement(['shampoo', 'soap']),
            'price' => $this->faker->randomFloat(2, 0, 100),
            'stock_quantity' => $this->faker->numberBetween(0, 100),
            'brand' => $this->faker->company,
        ];
    }
}
