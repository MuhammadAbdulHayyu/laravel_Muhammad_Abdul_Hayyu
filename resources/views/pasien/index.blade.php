@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Pasien</h2>

  
    <form action="{{ route('pasien.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
            </div>
            <div class="col-md-2">
                <input type="text" name="no_telepon" class="form-control" placeholder="No Telepon" required>
            </div>
            <div class="col-md-2">
                <select name="rumah_sakit_id" class="form-select" required>
                    <option value="">Pilih Rumah Sakit</option>
                    @foreach($rumahSakits as $rs)
                        <option value="{{ $rs->id }}">{{ $rs->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary">Tambah</button>
            </div>
        </div>
    </form>

    
    <div class="mb-3">
        <label>Filter Rumah Sakit:</label>
        <select id="filterRumahSakit" class="form-select">
            <option value="">Semua</option>
            @foreach($rumahSakits as $rs)
                <option value="{{ $rs->id }}">{{ $rs->nama}}</option>
            @endforeach
        </select>
    </div>

    
    <div id="pasienTable">
        @include('pasien.partials.table', ['pasiens' => $pasiens])
    </div>
</div>


<div class="modal fade" id="editPasienModal" tabindex="-1" aria-labelledby="editPasienModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editPasienModalLabel">Edit Data Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editPasienForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="edit_pasien_id">
                    <div class="mb-3">
                        <label>Nama Pasien</label>
                        <input type="text" id="edit_nama_pasien" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Alamat</label>
                        <input type="text" id="edit_alamat_pasien" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>No Telepon</label>
                        <input type="text" id="edit_no_telepon" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Rumah Sakit</label>
                        <select id="edit_rumah_sakit_id" class="form-select" required>
                            @foreach($rumahSakits as $rs)
                                <option value="{{ $rs->id }}">{{ $rs->nama}}</option>
                            @endforeach
                        </select>
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

    $('#filterRumahSakit').on('change', function() {
        var rsId = $(this).val();
        $.get('/pasien/filter', { rumah_sakit_id: rsId }, function(data) {
            $('#pasienTable').html(data);
        });
    });

    
    $(document).on('click', '.delete-btn', function() {
        var id = $(this).data('id');
        if (confirm('Yakin ingin menghapus data ini?')) {
            $.ajax({
                url: '/pasien/' + id,
                type: 'DELETE',
                data: { _token: '{{ csrf_token() }}' },
                success: function() {
                    $('#row-' + id).remove();
                }
            });
        }
    });

    
    $(document).on('click', '.edit-pasien-btn', function() {
        $('#edit_pasien_id').val($(this).data('id'));
        $('#edit_nama_pasien').val($(this).data('nama'));
        $('#edit_alamat_pasien').val($(this).data('alamat'));
        $('#edit_no_telepon').val($(this).data('telepon'));
        $('#edit_rumah_sakit_id').val($(this).data('rumahsakit'));
        $('#editPasienModal').modal('show');
    });

    
    $('#editPasienForm').submit(function(e) {
        e.preventDefault();
        let id = $('#edit_pasien_id').val();

       $.ajax({
    url: '/pasien/' + id,
    type: 'POST', 
    data: {
        _token: '{{ csrf_token() }}',
        _method: 'PUT', 
        nama_pasien: $('#edit_nama_pasien').val(),
        alamat: $('#edit_alamat_pasien').val(),
        no_telepon: $('#edit_no_telepon').val(),
        rumah_sakit_id: $('#edit_rumah_sakit_id').val(),
    },
    success: function(res) {
        if (res.success) {
            alert(res.message);
            location.reload();
        }
    },
    error: function(xhr) {
        console.log(xhr.responseText); 
        alert('Terjadi kesalahan saat update data.');
    }
});
    });
});
</script>
@endpush
@endsection
