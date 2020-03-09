<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mensje;
use Faker\Generator as Faker;

$factory->define(Mensje::class, function (Faker $faker) {
    return [
        "email" => $faker->email(),
        "mensaeje" => $faker->sentence(10),
        "created_at" =>$faker->date(),
        "updated_at" =>$faker->date()
    ];
});
