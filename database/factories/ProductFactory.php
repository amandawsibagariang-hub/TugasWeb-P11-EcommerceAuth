<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $names = [
            'Laptop ASUS Vivobook',
            'Laptop Lenovo IdeaPad',
            'Laptop Acer Aspire',
            'Mouse Wireless Logitech',
            'Keyboard Mechanical RGB',
            'Headset Gaming',
            'Webcam Full HD',
            'Monitor LED 24 Inch',
            'Flashdisk 64GB',
            'SSD External 1TB',
            'Power Bank 20000mAh',
            'Smartphone Android',
            'Smartwatch Digital',
            'Earbuds Bluetooth',
            'Charger Fast Charging',
        ];

        return [
            'category_id' => Category::inRandomOrder()->value('id') ?? Category::factory(),
            'name' => fake()->randomElement($names) . ' ' . fake()->unique()->numberBetween(1, 9999),
            'description' => fake()->sentence(12),
            'price' => fake()->numberBetween(50000, 15000000),
            'stock' => fake()->numberBetween(5, 100),
            'image' => null,
            'is_active' => fake()->boolean(90),
        ];
    }
}