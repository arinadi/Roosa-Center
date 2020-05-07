<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\device_data;
use Faker\Generator as Faker;

$factory->define(device_data::class, function (Faker $faker) {

    return [
        'device_id' => $faker->randomDigitNotNull,
        'device_data_category_id' => $faker->randomDigitNotNull,
        'key' => $faker->word,
        'value' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
