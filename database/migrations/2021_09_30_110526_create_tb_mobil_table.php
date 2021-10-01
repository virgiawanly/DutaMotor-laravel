<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMobilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mobil', function (Blueprint $table) {
            $table->char('kode_mobil', 12)->primary();
            $table->string('merek', 64);
            $table->string('model', 64);
            $table->string('tipe', 64);
            $table->string('warna', 64);
            $table->bigInteger('harga');
            $table->year('tahun');
            $table->string('gambar', 128)->nullable();
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
        Schema::dropIfExists('tb_mobil');
    }
}
