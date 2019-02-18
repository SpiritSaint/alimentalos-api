<?php

use Faker\Generator as Faker;

$factory->define(\App\Place::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'latitude' => $faker->latitude,
        'longitude' => $faker->longitude,
    ];
});
