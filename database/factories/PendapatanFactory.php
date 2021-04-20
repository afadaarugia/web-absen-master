<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pendapatan;
use Faker\Generator as Faker;

$factory->define(Pendapatan::class, function (Faker $faker) {

    return [
        'karyawans_id' => $faker->randomDigitNotNull,
        'pph' => $faker->word,
        'bpjs' => $faker->word,
        'jkk' => $faker->word,
        'jht' => $faker->word,
        'jkm' => $faker->word,
        'insentif_jab' => $faker->randomDigitNotNull,
        'insentif_transportasi' => $faker->randomDigitNotNull,
        'insentif_ps' => $faker->randomDigitNotNull,
        'insentif_prestasi' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
