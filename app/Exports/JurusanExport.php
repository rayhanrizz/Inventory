<?php

namespace App\Exports;

use App\jurusan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class JurusanExport implements FromView
{
    public function view(): View
    {
        return view('exports.jurusan', [
        	'i'		=> 0,
            'data' 	=> jurusan::all()
        ]);
    }
}
