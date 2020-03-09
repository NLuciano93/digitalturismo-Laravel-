<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mensaje;
use Faker\Generator as Faker;

$factory->define(Mensaje::class, function (Faker $faker) {
    return [
        "email" => $faker->email(),
        "mensaje" => $faker->sentence(10),
        "created_at" =>$faker->date(),
        "updated_at" =>$faker->date()
    ];
});
