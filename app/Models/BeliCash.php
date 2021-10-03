<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BeliCash extends Model
{
    use HasFactory;

    protected $table = 'tb_beli_cash';

    protected $primaryKey = 'kode_cash';

    protected $keyType = 'string';

    protected $fillable = [
        'kode_cash',
        'ktp_pembeli',
        'kode_mobil',
        'cash_tgl',
        'cash_bayar'
    ];

    public function mobil() {
        return $this->hasOne(Mobil::class, 'kode_mobil', 'kode_mobil');
    }

    public function pembeli() {
        return $this->hasOne(Pembeli::class, 'ktp_pembeli', 'ktp_pembeli');
    }

    /**
     * Membuat kode cash berdasarkan kode sebelumnya
     *
     * @return string $kode_transaksi
     */
    public static function get_code()
    {
        $no_urut = self::selectRaw("IFNULL(MAX(SUBSTRING(`kode_cash`,8,5)),0) + 1 AS no_urut")->whereRaw("SUBSTRING(`kode_cash`,2,4) = '" . date('Y') . "'")->orderBy('no_urut')->first()->no_urut;
        $kode_mobil = "C" . date("Ym") . sprintf("%'.05d", $no_urut);
        return $kode_mobil;
    }

}
