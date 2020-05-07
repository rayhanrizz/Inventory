<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Ruangan</th>
        <th>Total</th>
        <th>Broken</th>
        <th>Created by</th>
        <th>Updated by</th>
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
        </tr>
        @empty
        <tr>
          <td colspan="7"><center>Data kosong</center></td>
        </tr>
        @endforelse
    </tbody>
</table>