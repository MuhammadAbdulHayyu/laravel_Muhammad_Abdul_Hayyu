<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RumahSakit;

class RumahSakitController extends Controller
{
   
    public function index()
    {
        $rumahSakits = RumahSakit::all();
        return view('rumahsakit.index', compact('rumahSakits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rumah_sakit' => 'required',
            'alamat'           => 'required',
            'email'            => 'required|email|unique:rumah_sakits,email',
            'telepon'          => 'required'
        ]);

        
        RumahSakit::create([
            'nama'    => $request->nama_rumah_sakit,
            'alamat'  => $request->alamat,
            'email'   => $request->email,
            'telepon' => $request->telepon,
        ]);

        return redirect()->back()->with('success', 'Data Rumah Sakit berhasil ditambahkan');
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_rumah_sakit' => 'required',
            'alamat'           => 'required',
            'email'            => 'required|email|unique:rumah_sakits,email,' . $id,
            'telepon'          => 'required'
        ]);

        $rs = RumahSakit::findOrFail($id);

        $rs->update([
            'nama'    => $request->nama_rumah_sakit,
            'alamat'  => $request->alamat,
            'email'   => $request->email,
            'telepon' => $request->telepon,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Rumah Sakit berhasil diupdate'
        ]);
    }

    public function destroy($id)
    {
        RumahSakit::findOrFail($id)->delete();
        return response()->json(['success' => true]);
    }
}
