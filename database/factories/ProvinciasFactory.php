<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Provincia;
use Faker\Generator as Faker;

$factory->define(Provincia::class, function (Faker $faker) {
    return [
        "nombre_provincia" => $faker->word(),
        "id_pais" => 1,
        "created_at" =>$faker->date(),
        "updated_at" =>$faker->date()
    ];
});
