<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->randomElement([
            'Laptop ASUS',
            'Laptop Lenovo',
            'Laptop Acer',
            'Monitor LED 24 Inch',
            'Keyboard Mechanical',
            'Mouse Wireless',
            'Headset Gaming',
            'Smartphone Samsung',
            'Smartphone Xiaomi',
            'Smartwatch',
            'Power Bank',
            'Printer Canon',
            'Flashdisk 64GB',
            'Harddisk External',
            'Webcam HD',
        ]) . ' ' . fake()->numberBetween(1000, 9999);

        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(),
            'price' => fake()->numberBetween(100000, 5000000),
            'stock' => fake()->numberBetween(1, 50),
            'image' => null,
            'is_active' => true,
        ];
    }
}