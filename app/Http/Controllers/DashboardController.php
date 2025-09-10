<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RumahSakit;
use App\Models\Pasien;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRumahSakit = RumahSakit::count();
        $totalPasien = Pasien::count();
        
        return view('dashboard', compact('totalRumahSakit', 'totalPasien'));
    }
}
