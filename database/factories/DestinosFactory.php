<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Destino;
use Faker\Generator as Faker;

$factory->define(Destino::class, function (Faker $faker) {
    return [
        "nombre_destino" => $faker->sentence(1),
        "detalle" => $faker->sentence(1),
        "descripcion" => $faker->sentence(1),
        "precio" => $faker->randomFloat(2, 10000, 40000),
        "promocion" => $faker->numberBetween(0,10),
        "avatar_destino" => 'paisaje1.jpg',
        "id_provincia" => $faker->numberBetween(1,23),
        "created_at" =>$faker->date(),
        "updated_at" =>$faker->date()
    ];
});