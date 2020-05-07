<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Fakultas</th>
    </tr>
    </thead>
    <tbody>
        @forelse($data as $jurusan)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $jurusan->nama_jurusan }}</td>
          <td>{{ $jurusan->fakultas->name }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="7"><center>Data kosong</center></td>
        </tr>
        @endforelse
    </tbody>
</table>