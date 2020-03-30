<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Favorito;
use Faker\Generator as Faker;

$factory->define(Favorito::class, function (Faker $faker) {
    return [
        "id_usuario" => $faker->numberBetween(1,1),
        "id_destino" => $faker->numberBetween(1,20),
        "created_at" =>$faker->date(),
        "updated_at" =>$faker->date()
    ];
});
