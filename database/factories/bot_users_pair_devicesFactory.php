<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\bot_users_pair_devices;
use Faker\Generator as Faker;

$factory->define(bot_users_pair_devices::class, function (Faker $faker) {

    return [
        'public_key' => $faker->word,
        'bot_user_id' => $faker->randomDigitNotNull,
        'is_verified' => $faker->word,
        'is_blocked' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
