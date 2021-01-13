<?php

use Faker\Generator as Faker;

$factory->define(App\Expenses::class, function (Faker $faker) {
    return [
        'why'=>$faker->word,
        'amount'=>$faker->numberBetween(100000,1000000),
        'details'=>$faker->text
    ];
});
