<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemeriksaan;
use App\Models\Obat;
use App\Models\DetailPeriksa;
use App\Models\User;

class PemeriksaanController extends Controller
{
    public function index()
    {
        $pemeriksaans = Pemeriksaan::with('pasien')->get();
        return view('dokter.memeriksa', compact('pemeriksaans'));
    }

    public function create($id)
    {
        $pemeriksaan = Pemeriksaan::findOrFail($id);
        $obats = Obat::all();
        return view('dokter.form_periksa', compact('pemeriksaan', 'obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'tgl_periksa' => 'required|date',
            'id_obat' => 'required',
            'jumlah' => 'required|integer|min:1',
        ]);
    
        $obat = Obat::findOrFail($request->id_obat);
        $totalBiaya = 150000 + ($obat->harga * $request->jumlah);
    
        $pemeriksaan = Pemeriksaan::create([
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter,
            'tgl_periksa' => $request->tgl_periksa,
            'biaya_periksa' => $totalBiaya
        ]);
    
        DetailPeriksa::create([
            'id_periksa' => $pemeriksaan->id,
            'id_obat' => $obat->id,
        ]);
    
        return redirect('/dokter/memeriksa')->with('success', 'Pemeriksaan berhasil disimpan');
    }
    }
