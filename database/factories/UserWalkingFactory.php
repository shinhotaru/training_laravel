<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\UserWalking;
use Faker\Generator as Faker;

$factory->define(UserWalking::class, function (Faker $faker) {
    return [
        'user_id'    => $faker->numberBetween(1, 100),
        'walking_on' => $faker->date(),
        'step_cnt'   => $faker->numberBetween(1, 10000),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});

