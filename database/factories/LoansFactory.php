<?php

use Faker\Generator as Faker;

$factory->define(App\Loans::class, function (Faker $faker) {
    return [
        'members_id'=>$faker->numberBetween(1,50),
        'amount'=>$faker->numberBetween(1000000,100000000),
        'attach'=>'public/attaches/NcM3sj3Ohx3R2czKsry8bQt7v0QDnVvP9VlAnLAz.pdf',
        'status'=>$faker->numberBetween(0,1),
        'will_be_payed'=>$faker->date("Y-m-d")
    ];
});
