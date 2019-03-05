<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});