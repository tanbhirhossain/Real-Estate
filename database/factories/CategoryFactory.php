<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->word(2, true);

        // Make sure slug is unique by appending a random number or string
        return [
            'name' => $name,
            'slug' => Str::slug($name) . '-' . $this->faker->unique()->randomNumber(5), // Append a unique number
        ];
    }
}
