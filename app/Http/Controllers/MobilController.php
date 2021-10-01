<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MobilController extends Controller
{
    /**
     * Menampilkan data mobil
     */
    public function index()
    {
        $data_mobil = Mobil::latest()->get();

        return view('admin.mobil.index', [
            'data_mobil' => $data_mobil
        ]);
    }

    /**
     * Menampilkan form tambah mobil
     */
    public function create()
    {
        return view('admin.mobil.create');
    }

    /**
     * Menyimpan data mobil
     *
     * @param Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'merek' => 'required|max:64|min:3',
            'model' => 'required|max:64',
            'tipe' => 'required|max:64',
            'warna' => 'required|max:64',
            'harga' => 'required|numeric',
            'tahun' => 'required|digits:4|integer|min:1901|max:' . (date('Y') + 10)
        ]);

        $kode_mobil = Mobil::get_code($request->merek);

        $gambar = ($request->hasFile('gambar')) ? $request->file('gambar')->store('mobil') : null;

        Mobil::create([
            'kode_mobil' => $kode_mobil,
            'merek' => $request->merek,
            'model' => $request->model,
            'tipe' => $request->tipe,
            'warna' => $request->warna,
            'harga' => $request->harga,
            'tahun' => $request->tahun,
            'gambar' => $gambar
        ]);

        return redirect()->to("/mobil")->with('success', 'Data mobil berhasil ditambahkan.');
    }


    /**
     * Menampilkan form edit mobil
     *
     * @param \App\Models\Mobil $mobil
     */
    public function edit(Mobil $mobil)
    {
        return view('admin.mobil.edit', [
            'mobil' => $mobil
        ]);
    }

    /**
     * Mengupdate data mobil
     *
     * @param Illuminate\Http\Request $request
     * @param \App\Models\Mobil $mobil
     */
    public function update(Request $request, Mobil $mobil)
    {
        $request->validate([
            'merek' => 'required|max:64|min:3',
            'model' => 'required|max:64',
            'tipe' => 'required|max:64',
            'warna' => 'required|max:64',
            'harga' => 'required|numeric',
            'tahun' => 'required|digits:4|integer|min:1901|max:' . (date('Y') + 1)
        ]);

        $gambar = $mobil->gambar;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('mobil');
            if ($mobil->gambar && Storage::exists($mobil->gambar)) Storage::delete($mobil->gambar);
        }

        $mobil->update([
            'merek' => $request->merek,
            'model' => $request->model,
            'tipe' => $request->tipe,
            'warna' => $request->warna,
            'harga' => $request->harga,
            'tahun' => $request->tahun,
            'gambar' => $gambar
        ]);

        return redirect()->to("/mobil")->with('success', 'Data mobil berhasil diupdate.');
    }

    /**
     * Menghapus data mobil
     *
     * @param \App\Models\Mobil $mobil
     */
    public function destroy(Mobil $mobil)
    {
        if ($mobil->delete()) {
            if ($mobil->gambar && Storage::exists($mobil->gambar)) Storage::delete($mobil->gambar);
        }

        return redirect()->to("/mobil")->with('success', 'Data mobil berhasil dihapus.');
    }
}
