<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;

    protected $table = "tb_pembeli";

    protected $fillable = ['ktp_pembeli', 'nama', 'no_telp', 'alamat'];

    protected $primaryKey = "ktp_pembeli";

    protected $keyType = "string";

    public function kredit(){
        return $this->hasMany(Kredit::class, 'ktp_pembeli', 'ktp_pembeli');
    }

    public function beli_cash(){
        return $this->hasMany(BeliCash::class, 'ktp_pembeli', 'ktp_pembeli');
    }
}
