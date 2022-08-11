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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->integer('departemen_id');
            $table->integer('jabatan_id');
            $table->string('nama');
            $table->string('email')->unique;
            $table->string('nik');
            $table->string('alamat');
            $table->string('blok');
            $table->string('jk');
            $table->string('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->string('no_telepon');
            $table->string('img_profile');
            $table->string('slug');
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
        Schema::dropIfExists('karyawans');
    }
};
