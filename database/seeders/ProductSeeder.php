<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Product::create([
                'name' => $faker->sentence(2),
                'description' => $faker->paragraph(),
                'sku' => $faker->unique()->ean13,
                'price' => $faker->randomFloat(2, 10, 1000),
                'is_active' => $faker->boolean(),
                'weight' => $faker->randomFloat(2, 0.1, 50),
                'dimensions' => json_encode([
                    'length' => $faker->numberBetween(10, 200),
                    'width' => $faker->numberBetween(5, 100),
                    'height' => $faker->numberBetween(1, 50),
                ]),
                'image' => $faker->imageUrl(),
            ]);
        }
    }
}
