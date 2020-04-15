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
}
