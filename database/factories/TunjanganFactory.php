<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tunjangan;
use Faker\Generator as Faker;

$factory->define(Tunjangan::class, function (Faker $faker) {

    return [
        'karyawans_id' => $faker->randomDigitNotNull,
        'jenis_tunjangans_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'persentase' => $faker->word
    ];
});
