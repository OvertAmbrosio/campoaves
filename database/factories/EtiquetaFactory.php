<?php

use Faker\Generator as Faker;

$factory->define(App\Etiqueta::class, function (Faker $faker) {
    $title = $faker->unique()->word(5);
    return [
        'nombre' => $title,
        'slug'   => str_slug($title),
    ];
});
