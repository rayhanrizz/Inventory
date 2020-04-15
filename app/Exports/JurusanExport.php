<?php

namespace App\Exports;

use App\jurusan;
use Maatwebsite\Excel\Concerns\FromCollection;

class JurusanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return jurusan::all();
    }
}
