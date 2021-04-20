<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Karyawan;
use Faker\Generator as Faker;

$factory->define(Karyawan::class, function (Faker $faker) {

    return [
        'cost_center' => $faker->word,
        'nik_ta' => $faker->randomDigitNotNull,
        'nik_bistel' => $faker->randomDigitNotNull,
        'nama_lengkap' => $faker->word,
        'email' => $faker->word,
        'jen_kel' => $faker->word,
        'alamat' => $faker->text,
        'kota_lahir' => $faker->word,
        'tgl_lahir' => $faker->word,
        'foto' => $faker->word,
        'status_pernikahan' => $faker->word,
        'no_ktp' => $faker->randomDigitNotNull,
        'nomor_kartu_keluarga' => $faker->randomDigitNotNull,
        'nomor_npwp' => $faker->randomDigitNotNull,
        'no_bpjs_kesehatan' => $faker->word,
        'no_bpjs_ketenagakerjaan' => $faker->word,
        'no_rek' => $faker->randomDigitNotNull,
        'jurusan' => $faker->word,
        'nama_lembaga' => $faker->word,
        'golongan_darah' => $faker->word,
        'ukuran_seragam' => $faker->word,
        'nama_ayah' => $faker->word,
        'nama_ibu_kandung' => $faker->word,
        'kontrak_ke' => $faker->randomDigitNotNull,
        'awal_kontrak' => $faker->word,
        'akhir_kontrak' => $faker->word,
        'jumlah_anak' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s'),
        'name_posisions_id' => $faker->randomDigitNotNull,
        'units_id' => $faker->randomDigitNotNull,
        'sektors_id' => $faker->randomDigitNotNull,
        'pendidikans_id' => $faker->randomDigitNotNull,
        'agamas_id' => $faker->randomDigitNotNull,
        'statuses_id' => $faker->randomDigitNotNull,
        'banks_id' => $faker->randomDigitNotNull,
        'gol_darahs_id' => $faker->randomDigitNotNull,
        'users_id' => $faker->randomDigitNotNull
    ];
});
