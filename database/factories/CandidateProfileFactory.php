<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Candidate_Profile;
use Faker\Generator as Faker;

$factory->define(Candidate_Profile::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->freeEmail,
        'phone' => $faker->unique()->phoneNumber,
        'gender' => rand(0,2),
        'position_id' => rand(1,4),
        'source_id' => rand(1,4),
        'received_date' => $faker->date('Y-m-d','now'),
        'interview_date' => $faker->date('Y-m-d','now'),
        'feedback' => '',
        'cv_link' => $faker->unique()->url,
        'note' => '',
    ];
});
