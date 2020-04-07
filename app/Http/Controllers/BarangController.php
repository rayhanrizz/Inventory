<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use App\ruangan;
use App\User;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = barang::when($request->search, function($query) use($request){
            $query->where('nama_barang', 'LIKE', '%'.$request->search.'%')
                  ->orwhere('nama_ruangan', 'LIKE', '%'.$request->search.'%');
        })->join('ruangan', 'ruangan.id_ruangan', '=', 'barang.ruangan_id')
        ->orderBy('id_barang','asc')->paginate(10);
        $user = User::all();
        return view('barang.index', compact('data','user'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ruangan::all();
        $user = User::all();
        return view('barang.create', compact('data','user'));
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
            'ruangan_id'=>'required',
            'nama_barang' => 'required',
            'total'=>'required',
            'broken'=>'required',
            'created_by'=>'required',
        ]);

        barang::create([
            'ruangan_id' => $request->ruangan_id,
            'nama_barang' => $request->nama_barang,
            'total' => $request->total,
            'broken' => $request->broken,
            'created_by' => $request->created_by,
        ]);

        return redirect('/barang')->with('succes', 'Data is succesfully Added.');
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
        $user = User::all();
        $ruangan = ruangan::all();
        $barang = barang::findOrFail($id);
        return view('barang.edit', compact('barang','user','ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $form_data = array(
            'ruangan_id' => $request->ruangan_id,
            'nama_barang' => $request->nama_barang,
            'total' => $request->total,
            'broken' => $request->broken,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by
        );
        barang::where('id_barang',$id)->update($form_data);
        return redirect('/barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = barang::findOrFail($id);
        $delete->delete();
        return redirect('/barang');
    }
}
