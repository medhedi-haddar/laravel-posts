<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'status'=> $faker->lexify('published'),
        'post_type'=> $faker->randomElement(['formation','stage']),
        'price'=> $faker->randomFloat(3,50,900),
        'nbr_students'=> $faker->numberBetween(1,20),
        'date_start'=> $faker->date('Y-m-d H:i:s'),
        'date_end'=> $faker->date('Y-m-d H:i:s'),
    ];
});
