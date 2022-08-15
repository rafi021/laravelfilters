<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        return [
            'name' => $name = $this->faker->sentence,
            'slug' => Str::slug($name),
            'type' => ['Simple', 'Grouped', 'Variable', 'Gift'][rand(0,3)],
            'categories' => ['Electronics', 'Books', 'Games', 'Garden'][rand(0,3)],
        ];
    }
}
