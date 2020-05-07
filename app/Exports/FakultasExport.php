<?php

namespace App\Exports;

use App\Fakultas;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FakultasExport implements FromView
{
    public function view(): View
    {
        return view('exports.fakultas', [
        	'i'		=> 0,
            'data' 	=> Fakultas::all()
        ]);
    }
}
