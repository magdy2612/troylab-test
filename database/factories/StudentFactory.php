<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\School;
use App\Student;
use Faker\Generator as Faker;

$schools = School::select('id')->get()->keyBy('id')->toArray();
$factory->define(Student::class, function (Faker $faker) use ($schools) {
    return [
        'name' => $faker->name,
        'school_id' => array_rand($schools, 1),
    ];
});
