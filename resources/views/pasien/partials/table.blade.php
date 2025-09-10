<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Pasien</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Rumah Sakit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pasiens as $p)
        <tr id="row-{{ $p->id }}">
            <td>{{ $p->nama}}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->telepon }}</td>
            <td>{{ $p->rumahSakit->nama}}</td>
            <td>
                   
                <button class="btn btn-warning btn-sm edit-pasien-btn"
                    data-id="{{ $p->id }}"
                    data-nama="{{ $p->nama }}"
                    data-alamat="{{ $p->alamat }}"
                    data-telepon="{{ $p->telepon }}"
                    data-rumahsakit="{{ $p->rumah_sakit_id }}">
                    Edit
                </button>

                <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $p->id }}">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
