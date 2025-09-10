@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Selamat Datang di Dashboard</h2>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Rumah Sakit</h5>
                    <h3>{{ $totalRumahSakit }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Pasien</h5>
                    <h3>{{ $totalPasien }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
