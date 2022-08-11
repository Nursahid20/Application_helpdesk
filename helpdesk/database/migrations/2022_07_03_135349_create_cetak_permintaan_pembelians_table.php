<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cetak_permintaan_pembelians', function (Blueprint $table) {
            $table->id();
            $table->integer('id_permintaan_pembelian');
            $table->string('kode_barang');
            $table->string('to_company');
            $table->string('tanggal');
            $table->string('from_company');
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
        Schema::dropIfExists('cetak_permintaan_pembelians');
    }
};
