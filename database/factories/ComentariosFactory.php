<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comentario;
use Faker\Generator as Faker;

$factory->define(Comentario::class, function (Faker $faker) {
    return [
        "id_usuario" => $faker->numberBetween(1,1),
        "id_destino" => $faker->numberBetween(1,20),
        "comentario" => $faker->sentence(3),
        "puntuacion" =>$faker->numberBetween(0,5), 
        "created_at" =>$faker->date(),
        "updated_at" =>$faker->date()
    ];
});
