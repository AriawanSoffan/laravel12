<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use Illuminate\Support\Facades\Auth;

class PeriksaController extends Controller
{
    public function index()
    {
        $periksa = Periksa::all(); // Ambil semua data periksa
        return view('pasien.periksa', compact('periksa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required|exists:users,id',
            'id_dokter' => 'required|in:1,2', // Dokter hanya 1 dan 2 (bukan validasi ke tabel users)
            'tgl_periksa' => 'required|date',
            'catatan' => 'nullable|string',
            'biaya_periksa' => 'nullable|numeric',
        ]);

        Periksa::create([
            'id_pasien' => $request->id_pasien,
            'id_dokter' => $request->id_dokter,
            'tgl_periksa' => $request->tgl_periksa,
            'catatan' => $request->catatan,
            'biaya_periksa' => $request->biaya_periksa,
        ]);

        return redirect()->route('periksa.index')->with('success', 'Riwayat pemeriksaan berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $periksa = Periksa::where('id', $id)
            ->where('id_pasien', Auth::id())
            ->firstOrFail();

        $periksa->delete();

        return redirect()->back()->with('success', 'Riwayat periksa berhasil dihapus');
    }
}
