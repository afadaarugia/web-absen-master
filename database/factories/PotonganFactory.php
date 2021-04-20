<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Potongan;
use Faker\Generator as Faker;

$factory->define(Potongan::class, function (Faker $faker) {

    return [
        'karyawans_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'pph' => $faker->word,
        'bpjs' => $faker->word,
        'jkk' => $faker->word,
        'jht' => $faker->word,
        'jkm' => $faker->word,
        'pinjaman' => $faker->randomDigitNotNull
    ];
});
