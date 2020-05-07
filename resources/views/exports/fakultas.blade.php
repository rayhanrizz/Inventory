<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
    </tr>
    </thead>
    <tbody>
        @forelse($data as $fakultas)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $fakultas->name }}</td>
        </tr>
        @empty
        <tr>
          <td colspan="3"><center>Data kosong</center></td>
        </tr>
        @endforelse
    </tbody>
</table>