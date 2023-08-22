<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class OrderFactory extends Factory

{
    protected $model = Order::class;

    public function definition()   
    {
        $faker = \Faker\Factory::create();
        $title = $faker->sentence;
        $userIds = User::pluck('id')->toArray();
        return [
            "product_name" => $faker->sentence,
            "qty" => $faker->numberBetween($min = 1, $max = 10),
            "price" => $faker->numberBetween($min = 100, $max = 900),
            "total" => $faker->numberBetween($min = 1000, $max = 9000),
            "user_id" => $faker->randomElement($userIds),
        ];
    }
}
