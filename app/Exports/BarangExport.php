<?php

namespace App\Exports;

use App\barang;
use App\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BarangExport implements FromView
{
    public function view(): View
    {
        return view('exports.barang', [
        	'i'		=> 0,
            'data' 	=> barang::all(),
            'user'  => User::all()
        ]);
    }
}
