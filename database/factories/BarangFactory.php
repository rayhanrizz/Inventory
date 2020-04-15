<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\barang;
use Faker\Generator as Faker;

$factory->define(barang::class, function (Faker $faker) {

	$list_barang = [
        	'AC',
        	'Proyektor',
        	'LCD',
        	'Meja',
        	'Kursi'
        ];

    return [
        'ruangan_id' => $faker->numberBetween($min = 1, $max = 5),
        'nama_barang' => $faker->randomElement($list_barang),
        'total' => $faker->numberBetween($min = 1, $max = 5),
        'broken' => $faker->numberBetween($min = 0, $max = 3),
        'created_by' => 1
    ];
});
