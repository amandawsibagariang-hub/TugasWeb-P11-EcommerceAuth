<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categoryData = [
            ['name' => 'Laptop', 'description' => 'Laptop untuk kuliah, kerja, dan bisnis.'],
            ['name' => 'Smartphone', 'description' => 'Smartphone dan perangkat mobile.'],
            ['name' => 'Aksesoris', 'description' => 'Aksesoris komputer dan smartphone.'],
            ['name' => 'Gaming', 'description' => 'Perangkat gaming.'],
            ['name' => 'Storage', 'description' => 'Media penyimpanan data.'],
            ['name' => 'Audio', 'description' => 'Perangkat audio dan headset.'],
            ['name' => 'Komputer', 'description' => 'Perangkat komputer.'],
        ];

        foreach ($categoryData as $data) {
            Category::create($data);
        }

        User::factory()->create([
            'name' => 'Admin E-Commerce',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Editor E-Commerce',
            'email' => 'editor@gmail.com',
            'role' => 'editor',
        ]);

        User::factory()->create([
            'name' => 'User E-Commerce',
            'email' => 'user@gmail.com',
            'role' => 'user',
        ]);

        Product::factory(50)->create();
    }
}