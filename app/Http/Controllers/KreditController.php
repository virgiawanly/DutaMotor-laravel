<?php

namespace App\Http\Controllers;

use App\Models\BeliCash;
use App\Models\Kredit;
use App\Models\Mobil;
use App\Models\Pembeli;
use Illuminate\Http\Request;

class KreditController extends Controller
{
    /**
     * Menampilkan data kredit
     */
    public function index()
    {
        $data_kredit = Kredit::latest()->get();

        return view('admin.kredit.index', [
            'data_kredit' => $data_kredit
        ]);
    }

    /**
     * Menampilkan form pendaftaran kredit
     */
    public function create()
    {
        $data_pembeli = Pembeli::get();
        $data_mobil = Mobil::whereNotIn('kode_mobil', BeliCash::pluck('kode_mobil')->all())->whereNotIn('kode_mobil', Kredit::pluck('kode_mobil')->all())->get();

        return view('admin.kredit.create', [
            'data_pembeli' => $data_pembeli,
            'data_mobil' => $data_mobil
        ]);
    }
}
