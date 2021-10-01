<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbKreditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kredit', function (Blueprint $table) {
            $table->char('kode_kredit', 12)->primary();
            $table->char('ktp_pembeli', 24);
            $table->char('kode_paket', 13);
            $table->char('kode_mobil', 12);
            $table->dateTime('tgl_kredit');
            $table->string('fotokopi_kk', 128);
            $table->string('fotokopi_slip_gaji', 128);
            $table->timestamps();

            $table->foreign('ktp_pembeli')->references('ktp_pembeli')->on('tb_pembeli')->cascadeOnUpdate();
            $table->foreign('kode_mobil')->references('kode_mobil')->on('tb_mobil')->cascadeOnUpdate();
            $table->foreign('kode_paket')->references('kode_paket')->on('tb_paket_kredit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_kredit');
    }
}
