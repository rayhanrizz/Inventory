@extends('layouts.adminmain')

@section('content')
<section class="section">
  
  <div class="section-header">
    <h1>Fakultas</h1>
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
            <a href="{{ route('fakultas.index') }}" class="pull-right">
              <button type="button" class="btn btn-info">All Data</button>
            </a>
          </div>
          <div class="card-header">
            <a href="{{route('fakultas.create')}}">
              <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</button>
            </a>
            &nbsp;
            <a href="export_fklts">
              <button type="button" class="btn btn-success"><i class="fa fa-print"></i> Export Excel</button>
            </a>
            &nbsp;
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importExcel">
              <i class="fas fa-file-import"></i> Import Excel
            </button>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Name</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
               @forelse($data as $fakultas)
                <tr>
                  <td>{{ ++$i }}</td>
                  <td>{{ $fakultas->name }}</td>
                  <td>
                    <form action="{{ route('fakultas.destroy', $fakultas->id) }}" method="POST">
                        <div class="btn-group">
                            <a class="btn btn-sm btn-warning edit_modal color" href="{{ route('fakultas.edit', $fakultas->id) }}"><i class="fas fa-pen"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger delete color" onclick="return confirm('Are you sure to delete this data ?');"><i class="fas fa-trash"></i></button>
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

<!-- Import Excel -->
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <form method="post" action="import_fklts" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
            </div>
            <div class="modal-body">
              {{ csrf_field() }}
              <label>Pilih file excel</label>
              <div class="form-group">
                <input type="file" name="file" required="required">
              </div>
 
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Import</button>
            </div>
          </div>
        </form>
      </div>
    </div>

@endsection()