<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\NamePosition;
use Faker\Generator as Faker;

$factory->define(NamePosition::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'levels_id' => $faker->randomDigitNotNull
    ];
});
