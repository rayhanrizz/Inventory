<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ruangan;
use Faker\Generator as Faker;

$factory->define(ruangan::class, function (Faker $faker) {

	$list_ruangan = [
			'RB-102',
			'RP-401',
			'RSI-504',
			'RUS-509',
			'RI-502'
		];

    return [
        'jurusan_id' => $faker->unique()->numberBetween($min = 1, $max = 10),
        'nama_ruangan' => $faker->unique()->randomElement($list_ruangan)
    ];
});
