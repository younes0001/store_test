<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory

{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'slug' => $this->faker->safeEmail,
            // Add more attributes as needed for your model
        ];
    }
}
