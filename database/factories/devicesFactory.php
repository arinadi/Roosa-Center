<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\devices;
use Faker\Generator as Faker;

$factory->define(devices::class, function (Faker $faker) {

    return [
        'public_key' => $faker->word,
        'secret_key' => $faker->word,
        'name' => $faker->word,
        'is_verified' => $faker->word,
        'is_blocked' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
