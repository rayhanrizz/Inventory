@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Barang</h1>
  </div>

  <div class="section-body">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
          <div class="card-header">
            <form method="GET" class="form-inline">
              <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search" value="{{ request()->get('search') }}">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
              </div>
            </form>
            <a href="{{ route('barang.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          @if(auth()->user()->role == 'admin')
          <div class="card-header">
            <a href="{{route('barang.create')}}">
              <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</button>
            </a>
            &nbsp;
            <a href="export_brg">
              <button type="button" class="btn btn-success"><i class="fa fa-print"></i> Export Excel</button>
            </a>
          </div>
          @endif
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Ruangan</th>
                  <th scope="col">Total</th>
                  <th scope="col">Broken</th>
                  <th scope="col">Created By</th>
                  <th scope="col">Updated By</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $brg)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $brg->nama_barang }}</td>
                  <td>{{ $brg->ruangan->nama_ruangan }}</td>
                  <td>{{ $brg->total }}</td>
                  <td>{{ $brg->broken }}</td>
                  <td>@foreach($user as $u)
                        @if($u->id == $brg->created_by)
                          {{ $u->name }}
                        @endif
                      @endforeach
                  </td>
                  <td>@foreach($user as $u)
                        @if($u->id == $brg->updated_by)
                          {{ $u->name }}
                        @endif
                      @endforeach
                  </td>
                  <td>
                    <form action="{{ route('barang.destroy', $brg->id_barang) }}" method="POST">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-warning edit_modal color" href="{{ route('barang.edit', $brg->id_barang) }}"><i class="fas fa-pen"></i></a>
                            @csrf
                            @method('DELETE')
                            @if(auth()->user()->role == 'admin')
                            <button type="submit" class="btn btn-sm btn-danger delete color" onclick="return confirm('Are you sure to delete this data ?');"><i class="fas fa-trash"></i></button>
                            @endif
                        </div>
                    </form>
                  </td>
                </tr>
               @empty
                <tr>
                  <td colspan="3"><center>Data kosong</center></td>
                </tr>
                @endforelse
              </tbody>
            </table>
            {!! $data->appends(request()->except('page'))->render() !!}
          </div>
          <div class="card-footer text-right">
            <nav class="d-inline-block">
            </nav>
          </div>
        </div>
      </div>  
  </div>

</section>
@endsection()