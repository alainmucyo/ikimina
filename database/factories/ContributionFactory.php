<?php

use Faker\Generator as Faker;

$factory->define(App\Contribution::class, function (Faker $faker) {
    return [
        'members_id'=>$faker->numberBetween(1,50),
        'amount'=>$faker->numberBetween(100000,1000000)
    ];
});
