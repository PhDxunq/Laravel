<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            //
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2,1,100),
            'category_id' => $this->faker->numberBetween(1,5),
            'description' => $this->faker->text(100),
            'image' => $this->faker->imageUrl(640, 480, 'food', true),
        ];
    }
}
