<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jurusan;
use App\ruangan;
use App\Exports\RuanganExport;
use Maatwebsite\Excel\Facades\Excel;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = ruangan::when($request->search, function($query) use($request){
            $query->where('nama_ruangan', 'LIKE', '%'.$request->search.'%')
                  ->orwhere('nama_jurusan', 'LIKE', '%'.$request->search.'%');
        })->join('jurusan', 'jurusan.id_jurusan', '=', 'ruangan.jurusan_id')
        ->orderBy('id_ruangan','asc')->paginate(10);

        return view('ruangan.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = jurusan::all();
        return view('ruangan.create_ruang', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_ruangan' => 'required',
            'jurusan_id'=>'required'
        ]);

        ruangan::create([
            'nama_ruangan' => $request->nama_ruangan,
            'jurusan_id' => $request->jurusan_id
        ]);

        return redirect('/ruangan')->with('succes', 'Data is succesfully Added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jurusan = jurusan::all();
        $ruangan = ruangan::findOrFail($id);
        return view('ruangan.edit', compact('ruangan'))->with('jurusan', $jurusan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ruangan $ruangan)
    {
        $form_data = array(
            'jurusan_id' => $request->jurusan_id,
            'nama_ruangan' => $request->nama_ruangan
        );
        $ruangan->update($form_data);
        return redirect('/ruangan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ruangan::findOrFail($id);
        $delete->delete();
        return redirect('/ruangan');
    }
    public function export(Request $request)
    {
        return Excel::download(new RuanganExport, 'ruangan-'.date("Y-m-d").'.xlsx');
    }
}
