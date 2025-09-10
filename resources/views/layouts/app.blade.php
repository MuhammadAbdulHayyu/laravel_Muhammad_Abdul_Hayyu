<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Rumah Sakit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body { background: #f8f9fa; }
        .sidebar {
            min-height: 100vh;
            background: #0d6efd;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px 15px;
        }
        .sidebar a:hover {
            background: #084298;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        
        <div class="col-md-2 sidebar">
            <h4 class="p-3">Dashboard</h4>
            <a href="{{ route('dashboard') }}">Home</a>
            <a href="{{ route('rumahsakit.index') }}">Data Rumah Sakit</a>
            <a href="{{ route('pasien.index') }}">Data Pasien</a>
            <a href="{{ route('logout') }}">Logout</a>
        </div>

        
        <div class="col-md-10 p-4">
            @yield('content')
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
