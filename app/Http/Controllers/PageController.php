<?php

namespace App\Http\Controllers;

use App\Models\BeliCash;
use App\Models\Kredit;
use App\Models\Mobil;
use App\Models\Pembeli;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function dashboard(){
        $jml_mobil = Mobil::whereNotIn('kode_mobil', BeliCash::pluck('kode_mobil')->all())->whereNotIn('kode_mobil', Kredit::pluck('kode_mobil')->all())->count();
        $jml_pembeli_baru = Pembeli::whereMonth('created_at', Carbon::now()->month)->count();
        return view("admin.dashboard", [
            'jml_mobil' => $jml_mobil,
            'jml_pembeli_baru' => $jml_pembeli_baru
        ]);
    }
}
