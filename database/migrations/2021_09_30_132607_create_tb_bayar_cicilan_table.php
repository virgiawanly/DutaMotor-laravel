<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBayarCicilanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_bayar_cicilan', function (Blueprint $table) {
            $table->char('kode_cicilan', 13)->primary();
            $table->char('kode_kredit',12);
            $table->date('tgl_cicilan');
            $table->bigInteger('jml_cicilan');
            $table->integer('cicilan_ke');
            $table->integer('cicilan_sisa_ke');
            $table->bigInteger('cicilan_sisa_harga');
            $table->timestamps();

            $table->foreign('kode_kredit')->references('kode_kredit')->on('tb_kredit')->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_bayar_cicilan');
    }
}
