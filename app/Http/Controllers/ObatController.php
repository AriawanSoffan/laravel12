<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('dokter.obat', compact('obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'jumlah' => 'required|integer',
            'jenis' => 'required|string',
            'kemasan' => 'required',
            'harga' => 'required|numeric',
        ]);

        Obat::create($request->only(['nama_obat', 'jumlah', 'jenis', 'kemasan', 'harga']));

        return redirect()->route('obat.index')->with('success', 'Obat berhasil ditambahkan');
    }

    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama_obat' => 'required',
            'jumlah' => 'required|integer',
            'jenis' => 'required|string',
            'kemasan' => 'required',
            'harga' => 'required|numeric',
        ]);

        $obat->update($request->only(['nama_obat', 'jumlah', 'jenis', 'kemasan', 'harga']));

        return redirect()->route('obat.index')->with('success', 'Obat berhasil diperbarui');
    }

    public function destroy(Obat $obat)
    {
        $obat->delete();

        return redirect()->route('obat.index')->with('success', 'Obat berhasil dihapus');
    }
}
