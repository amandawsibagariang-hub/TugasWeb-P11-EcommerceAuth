<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Laptop', 'Smartphone', 'Aksesoris', 'Gaming',
                'Storage', 'Audio', 'Komputer'
            ]),
            'description' => fake()->sentence(),
        ];
    }
}