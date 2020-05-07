<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\device_data_categories;
use Faker\Generator as Faker;

$factory->define(device_data_categories::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
