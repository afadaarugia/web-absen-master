<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Absensi;
use Faker\Generator as Faker;

$factory->define(Absensi::class, function (Faker $faker) {

    return [
        'time_in' => $faker->date('Y-m-d H:i:s'),
        'time_out' => $faker->date('Y-m-d H:i:s'),
        'latitude' => $faker->randomDigitNotNull,
        'longtitude' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'karyawans_id' => $faker->randomDigitNotNull
    ];
});
