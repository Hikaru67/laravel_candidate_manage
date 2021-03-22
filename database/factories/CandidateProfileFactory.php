<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CandidateProfile;
use Faker\Generator as Faker;

$factory->define(CandidateProfile::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->freeEmail,
        'phone' => $faker->unique()->phoneNumber,
        'gender' => rand(0,2),
        'position_id' => rand(1,4),
        'source_id' => rand(1,4),
        'received_date' => $faker->unixTime('now'),
        'feedback' => '',
        'cv_link' => $faker->unique()->url,
        'note' => '',
    ];
});
