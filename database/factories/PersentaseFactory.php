<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Persentase;
use Faker\Generator as Faker;

$factory->define(Persentase::class, function (Faker $faker) {

    return [
        'pph' => $faker->word,
        'bpjs' => $faker->word,
        'jkk' => $faker->word,
        'jht' => $faker->word,
        'jkm' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
