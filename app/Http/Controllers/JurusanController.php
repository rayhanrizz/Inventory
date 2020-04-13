<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jurusan;
use App\Fakultas;
use App\Exports\JurusanExport;
use Maatwebsite\Excel\Facades\Excel;
class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = jurusan::when($request->search, function($query) use($request){
            $query->where('name', 'LIKE', '%'.$request->search.'%')
                  ->orwhere('nama_jurusan', 'LIKE', '%'.$request->search.'%');
        })->join('fakultas', 'fakultas.id', '=', 'jurusan.jurusan_fakultas')
        ->orderBy('id_jurusan','asc')->paginate(10);

        return view('jurusan.index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Fakultas::all();
        return view('jurusan.create', compact('data'));
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
            'nama_jurusan' => 'required',
            'jurusan_fakultas'=>'required'
        ]);

        jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'jurusan_fakultas' => $request->jurusan_fakultas
        ]);

        return redirect('/jurusan')->with('succes', 'Data is succesfully Added.');
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
        $fakultas = Fakultas::all();
        $jurusan = jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'))->with('fakultas', $fakultas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, jurusan $jurusan)
    {
        $form_data = array(
            'nama_jurusan' => $request->nama_jurusan,
            'jurusan_fakultas' => $request->jurusan_fakultas
        );
        $jurusan->update($form_data);
        return redirect('/jurusan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = jurusan::findOrFail($id);
        $delete->delete();
        return redirect('/jurusan');
    }
    public function export(Request $request)
    {
        return Excel::download(new JurusanExport, 'jurusan-'.date("Y-m-d").'.xlsx');
    }
}
