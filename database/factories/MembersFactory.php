<?php

use Faker\Generator as Faker;

$factory->define(App\members::class, function (Faker $faker) {

    return [
        'name'=>$faker->name(),
        'gender'=>$faker->numberBetween(0,1),
        'dob'=>$faker->date("Y-m-d"),
        'phone'=>$faker->phoneNumber,
        'cell'=>$faker->city,
        'village'=>$faker->streetName
    ];
});
