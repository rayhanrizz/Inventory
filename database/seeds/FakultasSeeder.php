<?php

use Illuminate\Database\Seeder;
use App\Fakultas;
class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $listFakultas = ['Fakultas Ilmu Komputer', 'Program Pendidikan Vokasi', 'Fakultas Hukum','Fakultas Ilmu Administrasi', 'Fakultas Ekonomi dan Bisnis', 'Fakultas Ilmu Budaya', 'Fakultas Teknologi Pertanian', 'Fakultas Peternakan', 'Fakultas Pertanian', 'Fakultas Ilmu Sosial dan Politik','Fakultas Kedokteran','Fakultas Kedokteran Hewan', 'Fakultas Kedokteran Gigi', 'Fakultas Ilmu Pengetahuan Alam', 'Fakultas Teknik'];

        foreach ($listFakultas as $fakultas) {
        	Fakultas::create(['name' => $fakultas]);
        }
    }
}
