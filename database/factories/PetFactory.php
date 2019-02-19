<?php

use Faker\Generator as Faker;

$factory->define(App\Pet::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'born_at' => $faker->date(),
    ];
});
