<?php

use Faker\Generator as Faker;

$factory->define(App\person\Department::class, function (Faker $faker) {
    return [
        'name'=>$faker->state,
        'country_id'=>1
    ];
});
