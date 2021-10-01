<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBeliCashTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_beli_cash', function (Blueprint $table) {
            $table->char('kode_cash', 12);
            $table->char('ktp_pembeli', 24);
            $table->char('kode_mobil', 12);
            $table->timestamp('cash_tgl');
            $table->bigInteger('cash_bayar');
            $table->timestamps();

            $table->primary('kode_cash');
            $table->foreign('ktp_pembeli')->references('ktp_pembeli')->on('tb_pembeli')->cascadeOnUpdate();
            $table->foreign('kode_mobil')->references('kode_mobil')->on('tb_mobil')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_beli_cash');
    }
}
