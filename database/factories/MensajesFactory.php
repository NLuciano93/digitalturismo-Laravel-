<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mensaje;
use Faker\Generator as Faker;

$factory->define(Mensaje::class, function (Faker $faker) {
    return [
        "id" => 1,
        "email" => $faker->email(),
        "mensaje" => $faker->sentence(1),
        "created_at" =>$faker->date(),
        "updated_at" =>$faker->date()
    ];
});
