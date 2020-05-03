<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\telegram_users;
use Faker\Generator as Faker;

$factory->define(telegram_users::class, function (Faker $faker) {

    return [
        'telegram_id' => $faker->randomDigitNotNull,
        'phone_number' => $faker->word,
        'name' => $faker->word,
        'is_verified' => $faker->word,
        'is_admin' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
