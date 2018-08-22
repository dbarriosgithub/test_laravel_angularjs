<?php

use Faker\Generator as Faker;

$factory->define(App\person\Person::class, function (Faker $faker) {
    return [
        'firstName'=>$faker->firstName,
        'lastName'=>$faker->lastName,
        'phoneNumber'=>$faker->phoneNumber,
        'email'=>$faker->safeEmail,
        'address'=>$faker->streetAddress,
        'country_id'=>1,
        'department_id'=>1,
        'city_id'=>1
    ];
});

