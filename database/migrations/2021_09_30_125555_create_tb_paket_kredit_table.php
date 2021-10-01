<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPaketKreditTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_paket_kredit', function (Blueprint $table) {
            $table->char('kode_paket', 13)->primary();
            $table->bigInteger('harga_paket');
            $table->bigInteger('uang_muka');
            $table->integer('jml_cicilan');
            $table->bigInteger('bunga');
            $table->bigInteger('nilai_cicilan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_paket_kredit');
    }
}
