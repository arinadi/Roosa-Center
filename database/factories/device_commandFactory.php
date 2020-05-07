<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\device_command;
use Faker\Generator as Faker;

$factory->define(device_command::class, function (Faker $faker) {

    return [
        'device_id' => $faker->randomDigitNotNull,
        'command' => $faker->word,
        'is_received' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
