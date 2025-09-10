<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RumahSakit;

class PasienController extends Controller
{
    public function index()
    {
        $rumahSakits = RumahSakit::all();
        $pasiens = Pasien::with('rumahSakit')->get();
        return view('pasien.index', compact('rumahSakits', 'pasiens'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id'
        ]);

        Pasien::create([
            'nama' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'telepon' => $request->no_telepon,
            'rumah_sakit_id' => $request->rumah_sakit_id,
        ]);

        return redirect()->back()->with('success', 'Data Pasien berhasil ditambahkan');
    }

    public function filter(Request $request)
    {
        $rumahSakitId = $request->get('rumah_sakit_id');

        $pasiens = Pasien::with('rumahSakit')
            ->when($rumahSakitId, function ($query) use ($rumahSakitId) {
                return $query->where('rumah_sakit_id', $rumahSakitId);
            })
            ->get();

        return view('pasien.partials.table', compact('pasiens'))->render();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pasien' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id'
        ]);

        $pasien = Pasien::findOrFail($id);
        $pasien->update([
            'nama' => $request->nama_pasien,
            'alamat' => $request->alamat,
            'telepon' => $request->no_telepon,
            'rumah_sakit_id' => $request->rumah_sakit_id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data pasien berhasil diupdate',
            'data' => $pasien
        ]);
    }

    public function destroy($id)
    {
        Pasien::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data pasien berhasil dihapus'
        ]);
    }
}
