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
        Schema::create('pemilik_aset_hardware', function (Blueprint $table) {
            $table->id();
            $table->integer('aset_hardware_id');
            $table->integer('karyawan_id');
            $table->string('tanggal_diterima');
            $table->string('tanggal_berakhir');
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
        Schema::dropIfExists('pemilik_aset_hardware');
    }
};
