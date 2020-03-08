<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pais;
use Faker\Generator as Faker;

$factory->define(Pais::class, function (Faker $faker) {
    return [
        "nombre_pais" => $faker->sentence(10),
        "created_at" =>$faker->date(),
        "updated_at" =>$faker->date()
    ];
});
