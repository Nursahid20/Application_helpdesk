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
        Schema::create('permintaan_pembelians', function (Blueprint $table) {
            $table->id();
            $table->string('tiket_id');
            $table->string('nama_barang');
            $table->string('qty');
            $table->string('satuan_harga_barang');
            $table->string('total_harga_barang');
            $table->string('catatan');
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
        Schema::dropIfExists('permintaan_pembelians');
    }
};
