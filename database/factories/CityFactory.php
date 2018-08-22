<?php

use Faker\Generator as Faker;

$factory->define(App\person\City::class, function (Faker $faker) {
    return [
       'name'=>$faker->city,
       'department_id'=>1
    ];
});
