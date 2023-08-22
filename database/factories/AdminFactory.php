<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class AdminFactory extends Factory
{
    protected $model = Admin::class;

    public function definition()   
    {
        $faker = \Faker\Factory::create();
        $title = $faker->sentence;
        return [
            'name' => "samadi samir",
            'email' => "samadi@gmail.com",
            'email_verified_at' => now(),
            'password' => Hash::make("admin"), // password
            'remember_token' => Str::random(10),
        ];
    }
}


