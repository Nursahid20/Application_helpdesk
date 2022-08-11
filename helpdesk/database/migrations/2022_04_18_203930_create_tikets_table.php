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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->integer('karyawan_id');
            $table->integer('it_support_id');
            $table->integer('prioritas_id');
            $table->integer('lampiran_id');
            $table->integer('status_id');
            $table->integer('kategori_id');
            $table->integer('evaluasi_tiket_id');
            $table->integer('aset_hardware_id');
            $table->string('kode_tiket');
            $table->string('subject');
            $table->string('deskripsi');
            $table->string('unit');
            $table->string('file_lama');
            $table->string('file_baru');
            $table->string('kondisi');
            $table->string('waktu_pengerjaan');
            $table->string('tanggal_mulai');
            $table->string('tanggal_akhir');
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
        Schema::dropIfExists('tikets');
    }
};
