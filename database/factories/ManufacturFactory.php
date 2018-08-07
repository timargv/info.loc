<?php

use Faker\Generator as Faker;

$factory->define(\App\Manufacturer::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'number' => $faker->phoneNumber,
        'email' => $faker->companyEmail,
        'address' => $faker->streetAddress,
    ];
});
