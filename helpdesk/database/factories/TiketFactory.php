<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class TiketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'karyawan_id' => 1,
            'it_support_id' => 1,
            'prioritas_id' => 1,
            'lampiran_id' => 1,
            'status_id' => 1,
            'kategori_id' => 1,
            'aset_hardware_id' => 1,
            'evaluasi_tiket_id' => 1,
            'kode_tiket' => '',
            'subject' => '',
            'deskripsi' => '',
            'unit' => '',
            'file_lama' => '',
            'file_baru' => '',
            'kondisi' => '',
            'waktu_pengerjaan' => '0000/00/00',
            'tanggal_mulai' => '0000/00/00',
            'tanggal_akhir' => '0000/00/00',
        ];
    }
}
