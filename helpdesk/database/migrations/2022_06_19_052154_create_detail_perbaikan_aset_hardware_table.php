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
        Schema::create('detail_perbaikan_aset_hardware', function (Blueprint $table) {
            $table->id();
            $table->integer('aset_hardware_id');
            $table->string('keterangan_kerusakan');
            $table->string('biaya_perbaikan');
            $table->string('tanggal_perbaikan');
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
        Schema::dropIfExists('detail_perbaikan_aset_hardware');
    }
};
