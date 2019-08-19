<?php

use Faker\Generator as Faker;

$factory->define(App\Categoria::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [
        'nombre' => $title,
        'slug'   => str_slug($title),
        'cuerpo' => $faker->text(500),
    ];
});
