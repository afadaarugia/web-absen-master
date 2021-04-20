<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'units_id' => $faker->randomDigitNotNull
    ];
});
