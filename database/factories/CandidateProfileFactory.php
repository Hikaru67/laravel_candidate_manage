<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Candidate_Profile;
use Faker\Generator as Faker;

$factory->define(Candidate_Profile::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->unixTime(),
        'position_id' => rand(1,4),
        'source_id' => rand(1,4),
        'received_date' => $faker->date('Y-m-d','now'),
        'interview_date' => $faker->date('Y-m-d','now'),
        'cv_link' => $faker->unique()->url,
    ];
});
