<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'director' => $faker->numberBetween(1,100),
        'describe' => $faker->title,
        'rate' => $faker->numberBetween(1,4),
        'released' => $faker->numberBetween(0,1),
        'release_at' => $faker->time('Y-m-d H:i:s'),
        'created_at' => $faker->time('Y-m-d H:i:s'),
        'updated_at' => $faker->time('Y-m-d H:i:s'),
    ];
});
