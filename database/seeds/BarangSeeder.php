<?php
use App\barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $listbrg = [
            ['ruangan_id' => '1',  
              'nama_barang' => 'Meja', 
              'total' => '24',
              'broken' => '1',
              'gambar' => 'meja.jpeg',
              'created_by' => 1
          	],

            ['ruangan_id' => '2',  
              'nama_barang' => 'AC', 
              'total' => '1',
              'broken' => '0',
              'gambar' => 'Ac.jpg',
              'created_by' => 1
          	],

            ['ruangan_id' => '3',  
              'nama_barang' => 'Proyektor', 
              'total' => '1',
              'broken' => '0',
              'gambar' => 'proy.jpg',
              'created_by' => 1
          	],

            ['ruangan_id' => '4',  
              'nama_barang' => 'LCD', 
              'total' => '1',
              'broken' => '0',
              'gambar' => 'lcd.jpg',
              'created_by' => 1
          	],

            ['ruangan_id' => '5',  
              'nama_barang' => 'Kursi', 
              'total' => '25',
              'broken' => '0',
              'gambar' => 'kursi.jpg',
              'created_by' => 1
          	]
        ];

        foreach ($listbrg as $brg) {
            barang::create($brg);
        }
    }
}
