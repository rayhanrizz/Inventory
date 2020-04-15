<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\jurusan;
use Faker\Generator as Faker;

$factory->define(jurusan::class, function (Faker $faker) {
		$list_jurusan = [
			'Perhotelan',
			'Perpajakan',
			'Sistem Informasi',
			'Dokter Hewan',
			'Teknologi Informasi'
		];

    return [
        'jurusan_fakultas' => $faker->numberBetween($min = 1, $max = 15),
        'nama_jurusan' => $faker->unique()->randomElement($list_jurusan)
    ];
});
