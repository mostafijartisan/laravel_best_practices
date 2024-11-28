<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->numberBetween( 500, 8000),
            'qty' => $this->faker->numberBetween(10, int2: 200),
            'size' => $this->faker->randomElement(['small','medium', 'large']),
            'color' => $this->faker->randomElement(['red','blue', 'grenn']),
            'status' => $this->faker->randomElement(['active','inactive']),
            'updated_at' => null
        ];
    }
}
