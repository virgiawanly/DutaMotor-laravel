<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;

class PembeliController extends Controller
{
    /**
     * Menampilkan data pembeli
     */
    public function index()
    {
        $data_pembeli = Pembeli::latest()->get();

        return view('admin.pembeli.index', [
            'data_pembeli' => $data_pembeli
        ]);
    }

    /**
     * Menampilkan form register pembeli
     */
    public function create()
    {
        return view('admin.pembeli.create');
    }

    /**
     * Menyimpan data pembeli baru
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'ktp_pembeli' => 'required|max:24|unique:tb_pembeli,ktp_pembeli',
            'nama' => 'required|string',
            'alamat' => 'required',
            'no_telp' => 'required|max:16'
        ]);

        Pembeli::create([
            'ktp_pembeli' => $request->ktp_pembeli,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp
        ]);

        return redirect()->to('/pembeli')->with('success', 'Data pembeli berhasil ditambahkan');
    }


    /**
     * Menampilkan form edit pembeli
     *
     * @param \App\Models\Pembeli $pembeli
     */
    public function edit(Pembeli $pembeli)
    {
        return view('admin.pembeli.edit', [
            'pembeli' => $pembeli
        ]);
    }


    /**
     * Update data pembeli
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Pembeli $pembeli
     */
    public function update(Request $request, Pembeli $pembeli)
    {
        $request->validate([
            'ktp_pembeli' => ($request->ktp_pembeli !== $pembeli->ktp_pembeli) ? 'required|max:24|unique:tb_pembeli,ktp_pembeli' : 'required|max:24',
            'nama' => 'required|string',
            'alamat' => 'required',
            'no_telp' => 'required|max:16'
        ]);

        $pembeli->update([
            'ktp_pembeli' => $request->ktp_pembeli,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp
        ]);

        return redirect()->to('/pembeli')->with('success', 'Data pembeli berhasil diupdate');
    }

    /**
     * Menghapus data pembeli
     *
     * @param  \App\Models\Pembeli $pembeli
     */
    public function destroy(Pembeli $pembeli)
    {
        $pembeli->delete();

        return redirect()->to('/pembeli')->with('success', 'Data pembeli berhasil dihapus');
    }

    /**
     * Data for ajax
     *
     * @param \App\Models\Pembeli $pembeli
     */
    public function data_single(Pembeli $pembeli)
    {
        return response()->json([
            'success' => true,
            'message' => 'Data Pembeli',
            'data' => $pembeli
        ], 200);
    }
}
