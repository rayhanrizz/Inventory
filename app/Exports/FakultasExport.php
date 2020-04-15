<?php

namespace App\Exports;

use App\Fakultas;
use Maatwebsite\Excel\Concerns\FromCollection;

class FakultasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Fakultas::all();
    }
}
