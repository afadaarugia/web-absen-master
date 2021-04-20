<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sektor;
use Faker\Generator as Faker;

$factory->define(Sektor::class, function (Faker $faker) {

    return [
        'nama' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'sektors_id' => $faker->randomDigitNotNull
    ];
});
