<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Candidate;
use Faker\Generator as Faker;

$factory->define(Candidate::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->unixTime(),
        'position' => rand(0,3),
        'origin' => rand(0,3),
        'dateReceived' => $faker->date('Y-m-d','now'),
        'dateInterview' => $faker->date('Y-m-d','now'),
        'cv' => $faker->unique()->url,
    ];
});
