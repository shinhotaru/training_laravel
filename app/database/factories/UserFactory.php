<?php

use App\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'user_name' => $faker->name($gender),
        'user_name_kana' => $faker->kanaName($gender),
        'gender' => $gender,
        'age' => $faker->numberBetween(10, 100),
        'mail_address' => $faker->safeEmail(),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
