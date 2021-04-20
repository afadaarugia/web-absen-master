<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FotoRecognition;
use Faker\Generator as Faker;

$factory->define(FotoRecognition::class, function (Faker $faker) {

    return [
        'foto' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'users_id' => $faker->randomDigitNotNull
    ];
});
