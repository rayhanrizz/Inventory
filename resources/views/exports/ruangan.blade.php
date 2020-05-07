<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Jurusan</th>
    </tr>
    </thead>
    <tbody>
        @forelse($data as $ruangan)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $ruangan->nama_ruangan }}</td>
          <td>{{ $ruangan->jurusan->nama_jurusan }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="7"><center>Data kosong</center></td>
        </tr>
        @endforelse
    </tbody>
</table>