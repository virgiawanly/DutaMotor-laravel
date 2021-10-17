<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPembeliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pembeli', function (Blueprint $table) {
            $table->char('ktp_pembeli', 24)->primary();
            $table->string('nama', 128);
            $table->string('alamat');
            $table->char('no_telp', 24);
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
        Schema::dropIfExists('tb_pembeli');
    }
}
