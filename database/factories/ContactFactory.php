<?php

use Faker\Generator as Faker;

$factory->define(\App\Contact::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'surname' => $faker->firstName,
        'email' => $faker->unique()->safeEmail,
        'manufacturer_id' => $faker->randomNumber(1),
        'mobile_phone' => $faker->phoneNumber,

    ];
});
