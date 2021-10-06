<?php

namespace App\Http\Controllers;

use App\Models\BeliCash;
use App\Models\Kredit;
use App\Models\Mobil;
use App\Models\Pembeli;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class BeliCashController extends Controller
{
    /**
     * Menampilkan data transaksi cash
     */
    public function index()
    {
        $data_transaksi = BeliCash::latest()->get();

        return view('admin.beli_cash.index', [
            'data_transaksi' => $data_transaksi
        ]);
    }

    /**
     * Menampilkan form pembelian cash
     */
    public function create()
    {
        $data_pembeli = Pembeli::get();
        $data_mobil = Mobil::whereNotIn('kode_mobil', BeliCash::pluck('kode_mobil')->all())->whereNotIn('kode_mobil', Kredit::pluck('kode_mobil')->all())->get();

        return view('admin.beli_cash.create', [
            'data_pembeli' => $data_pembeli,
            'data_mobil' => $data_mobil
        ]);
    }

    /**
     * Menambah data transaksi cash
     *
     * @param Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        $mobil = Mobil::find($request->kode_mobil);

        $vRules = [
            'kode_mobil' => 'required|exists:tb_mobil,kode_mobil|unique:tb_beli_cash,kode_mobil|unique:tb_kredit,kode_mobil',
            'cash_bayar' => ($mobil) ? 'required|numeric|min:' . $mobil->harga : 'required|numeric',
        ];

        if ($request->daftar_pembeli_baru == "1") {
            $vRules['ktp_pembeli'] =  'required|unique:tb_pembeli,ktp_pembeli';
            $vRules['nama'] = 'required';
            $vRules['alamat'] = 'required';
            $vRules['no_telp'] = 'required';
        } else {
            $vRules['ktp_pembeli_lama'] = 'required|exists:tb_pembeli,ktp_pembeli';
        }

        $request->validate($vRules);

        $kode_cash = BeliCash::get_code();

        if($request->daftar_pembeli_baru == "1") {
            $pembeli = Pembeli::create([
                'ktp_pembeli' => $request->ktp_pembeli,
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_telp' => $request->no_telp,
            ]);

            $ktp = $request->ktp_pembeli;
        } else {
            $ktp = $request->ktp_pembeli_lama;
        }

        BeliCash::create([
            'kode_cash' => $kode_cash,
            'kode_mobil' => $mobil->kode_mobil,
            'ktp_pembeli' => $ktp,
            'cash_bayar' => $request->cash_bayar,
            'cash_tgl' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/transaksi/cash')->with('success', 'Pembelian cash berhasil ditambahkan')->with('print-nota', "<script>$(document).ready(function() {
            window.open('/transaksi/cash/" . $kode_cash . "/cetak-nota', '_blank');
        })</script>");
    }

    /**
     * Mencetak nota pembelian cash
     *
     * @param App\Models\BeliCash $cash
     */
    public function cetak_nota(BeliCash $cash)
    {
        $cash->load(['pembeli', 'mobil']);
        $pdf = PDF::loadView('admin.beli_cash.nota_pdf', [
            'transaksi' => $cash
        ]);
        return $pdf->stream();
    }
}
