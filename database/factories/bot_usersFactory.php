<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\bot_users;
use Faker\Generator as Faker;

$factory->define(bot_users::class, function (Faker $faker) {

    return [
        'account_type_id' => $faker->randomDigitNotNull,
        'account_id' => $faker->word,
        'phone_number' => $faker->word,
        'name' => $faker->word,
        'is_verified' => $faker->word,
        'is_admin' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
