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
        Schema::create('aset_hardware', function (Blueprint $table) {
            $table->id();
            $table->integer('jenis_aset_hardware_id');
            $table->string('kode_hardware');
            $table->string('nama');
            $table->string('ip');
            $table->string('harga');
            $table->string('serial');
            $table->string('status');
            $table->string('jumlah_perbaikan');
            $table->string('tanggal_awal_diterima');
            $table->string('tanggal_rusak_total');
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
        Schema::dropIfExists('aset_hardware');
    }
};
