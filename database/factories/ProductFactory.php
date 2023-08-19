<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'sku' => $this->faker->unique()->ean8,
            'name' => $this->faker->word,
            'price' => $this->faker->randomNumber(5),
            'stock' => $this->faker->randomNumber(2),
            'category_id' => function () {
                return Category::factory()->create()->id;
            },
        ];
    }
}
