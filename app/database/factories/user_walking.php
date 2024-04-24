<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserWalking;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(App\UserWalking::class, function (Faker $faker) {
    $user = User::inRandomOrder()->first();

    return [
        'user_id' => $user->id,
        'walking_on' => $faker->date(),
        'step_cnt' => $faker->randomNumber(),
    ];
});
