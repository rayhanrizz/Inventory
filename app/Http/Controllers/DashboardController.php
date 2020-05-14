<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use App\ruangan;
use App\jurusan;
use App\Fakultas;

class DashboardController extends Controller
{
    public function index()
    {
        $count = Fakultas::count();
        $jur = jurusan::count();
        $ruang = ruangan::count();
        $brg = barang::count();
        return view('dashboard.index', compact('count','jur','ruang','brg'));
    }

    public function landingpage(Request $request)
    {
        $data = barang::when($request->search, function($query) use($request){
            $query->where('nama_barang', 'LIKE', '%'.$request->search.'%')
                  ->orwhere('nama_ruangan', 'LIKE', '%'.$request->search.'%');
        })->join('ruangan', 'ruangan.id_ruangan', '=', 'barang.ruangan_id')
        ->orderBy('id_barang','asc')->paginate(10);
        return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
    }
}
