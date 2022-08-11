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
        Schema::create('aset_software_installon_hardware', function (Blueprint $table) {
            $table->id();
            $table->integer('aset_hardware_id');
            $table->integer('aset_software_id');
            $table->string('serial');
            $table->string('harga');
            $table->string('tanggal_install');
            $table->string('tanggal_lisensi_berakhir');
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
        Schema::dropIfExists('aset_software_installon_hardware');
    }
};
