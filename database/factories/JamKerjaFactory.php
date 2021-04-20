<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\JamKerja;
use Faker\Generator as Faker;

$factory->define(JamKerja::class, function (Faker $faker) {

    return [
        'ket' => $faker->word,
        'jam_awal' => $faker->date('Y-m-d H:i:s'),
        'jam_akhir' => $faker->date('Y-m-d H:i:s'),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
