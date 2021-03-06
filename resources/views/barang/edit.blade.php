@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>
      Barang <small>Edit Data</small>
    </h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('barang.index') }}"> 
              <button type="button" class="btn btn-outline-info">
                <i class="fas fa-arrow-circle-left"></i> Back
              </button>
          </a>
          </div>
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $error)
                  <li>{{$error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <div class="card-body">
            <form action="{{ route('barang.update', ['barang' => $barang->id_barang]) }}" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="_method" value="PUT">
              @csrf
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}">
              </div>
              <div class="form-group">
                <label>Total</label>
                <input type="text" name="total" class="form-control" value="{{ $barang->total }}">
              </div>
              <div class="form-group">
                <label>Broken</label>
                <input type="text" name="broken" class="form-control" value="{{ $barang->broken }}">
              </div>
              <div class="form-group">
                <label for="harga" class="control-label">Gambar</label>
                <input name="gambar" type="file" class="form-control" value="{{ url('/image/'.$barang->gambar) }}">
                <input name="hidden_image" type="hidden" class="form-control" value="{{$barang->gambar}}">
              </div>
              <div class="form-group">
                  <label for="ruangan_id" class="control-label">Ruangan</label>
                    <select class="form-control" name="ruangan_id">
                      @foreach( $ruangan as $ruang)
                      <option value="{{ $ruang->id_ruangan }}" {{ $ruang->id_ruangan == $barang->ruangan_id ? 'selected="selected"' : '' }}> {{ $ruang->nama_ruangan }} </option>
                      @endforeach
                    </select>
              </div>
              <div class="form-group">
                  <input type="hidden" name="created_by" value="{{ $barang->created_by }}" class="form-control">
              </div>
              <div class="form-group">
                  <input type="hidden" name="updated_by" value="{{auth()->user()->id}}" class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">SAVE</button>
              </div>
              </form>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection(