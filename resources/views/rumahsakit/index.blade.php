@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Rumah Sakit</h2>

    
    <form action="{{ route('rumahsakit.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="nama_rumah_sakit" class="form-control" placeholder="Nama Rumah Sakit" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
            </div>
            <div class="col-md-2">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="col-md-2">
                <input type="text" name="telepon" class="form-control" placeholder="Telepon" required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </form>

    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rumahSakits as $rs)
            <tr id="row-{{ $rs->id }}">
                <td>{{ $rs->nama}}</td>
                <td>{{ $rs->alamat }}</td>
                <td>{{ $rs->email }}</td>
                <td>{{ $rs->telepon }}</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn"
                        data-id="{{ $rs->id }}"
                        data-nama="{{ $rs->nama}}"
                        data-alamat="{{ $rs->alamat }}"
                        data-email="{{ $rs->email }}"
                        data-telepon="{{ $rs->telepon }}">Edit</button>
                    <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $rs->id }}">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Rumah Sakit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_id">
                    <div class="mb-3">
                        <label>Nama Rumah Sakit</label>
                        <input type="text" id="edit_nama_rumah_sakit" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <input type="text" id="edit_alamat" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" id="edit_email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Telepon</label>
                        <input type="text" id="edit_telepon" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {

    
    $('.delete-btn').click(function() {
        let id = $(this).data('id');
        if(confirm('Yakin ingin menghapus data ini?')) {
            $.ajax({
                url: '/rumahsakit/' + id,
                type: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function(res) {
                    if(res.success) {
                        $('#row-' + id).remove();
                    }
                }
            });
        }
    });

    
    $('.edit-btn').click(function() {
        $('#edit_id').val($(this).data('id'));
        $('#edit_nama_rumah_sakit').val($(this).data('nama'));
        $('#edit_alamat').val($(this).data('alamat'));
        $('#edit_email').val($(this).data('email'));
        $('#edit_telepon').val($(this).data('telepon'));
        $('#editModal').modal('show');
    });

    
    $('#editForm').submit(function(e) {
        e.preventDefault();
        let id = $('#edit_id').val();

        $.ajax({
            url: '/rumahsakit/' + id,
            type: 'PUT',
            data: {
                _token: '{{ csrf_token() }}',
                nama_rumah_sakit: $('#edit_nama_rumah_sakit').val(),
                alamat: $('#edit_alamat').val(),
                email: $('#edit_email').val(),
                telepon: $('#edit_telepon').val(),
            },
            success: function(res) {
                if(res.success) {
                    alert(res.message);
                    location.reload();
                }
            },
            error: function() {
                alert('Terjadi kesalahan saat update data.');
            }
        });
    });
});
</script>
@endpush
@endsection
