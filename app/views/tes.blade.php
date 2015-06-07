<table>
    <thead>
    <tr>
        <th>Nama Desa</th>
        <th>Kecamatan</th>
        <th>Kabupaten</th>
        <th>Provinsi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($tes as $item)
        <tr>
            <td>{{ $item->product_id}}</td>
        </tr>
    @endforeach
    </tbody>
</table>