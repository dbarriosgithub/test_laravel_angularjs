<?php

use Faker\Generator as Faker;

$factory->define(App\person\Country::class, function (Faker $faker) {
    return [
        'name'=>$faker->country,
        'code'=>$faker->countryCode
    ];
});

