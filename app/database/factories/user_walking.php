<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Userworking;
use Faker\Generator as Faker;

$factory->define(App\Userworking::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber(),
        'walking_on' => $faker->date(),
        'step_cnt' => $faker->randomNumber(),
    ];
});
