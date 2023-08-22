<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class ProductFactory extends Factory

{
    protected $model = Product::class;

    public function definition()   
    {
        $faker = \Faker\Factory::create();
        $title = $faker->sentence;
        return [
            "title" => $title,
        "slug" => Str::slug($title),
        "description" => $faker->paragraph,
        "price" => $faker->numberBetween($min = 100, $max = 900),
        "old_price" => $faker->numberBetween($min = 100, $max = 900),
        "inStock" => $faker->numberBetween($min = 1, $max = 10),
        "image" => $faker->imageUrl($width = 640, $height = 480),
        "category_id" => $faker->numberBetween($min = 1, $max = 10)
        ];
    }
}