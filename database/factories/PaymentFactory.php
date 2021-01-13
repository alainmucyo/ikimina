<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
        'amount'=>$faker->numberBetween(100000,1000000),
        'loans_id'=>$faker->numberBetween(1,20)
    ];
});
