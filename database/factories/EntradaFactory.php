<?php

use Faker\Generator as Faker;

$factory->define(App\Entrada::class, function (Faker $faker) {
    $title = $faker->sentence(4);
    return [
        'user_id'=> rand(1,30),
        'categoria_id' => rand(1,20),
        'nombre' => $title,
        'slug'   => str_slug($title),
        'excerpt' => $faker->text(200),
        'cuerpo' => $faker->text(500),
        'imagen'   => $faker->imageUrl($width = 1200, $height = 400),
        'estado' => $faker->randomElement(['BORRADOR','PUBLICADO']),
    ];
});
