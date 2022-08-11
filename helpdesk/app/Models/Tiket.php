<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function karyawan()
    {
        return $this->BelongsTo(Karyawan::class);
    }

    public function itSupport()
    {
        return $this->BelongsTo(Karyawan::class);
    }

    public function subTiket()
    {
        return $this->BelongsTo(SubTiket::class);
    }

    public function status()
    {
        return $this->BelongsTo(SubTiket::class);
    }

    public function lampiran()
    {
        return $this->BelongsTo(SubTiket::class);
    }

    public function kategori()
    {
        return $this->BelongsTo(SubTiket::class);
    }

    public function prioritas()
    {
        return $this->BelongsTo(SubTiket::class);
    }

    public function evaluasiTiket()
    {
        return $this->BelongsTo(EvaluasiTiket::class);
    }

    public function asetHardware()
    {
        return $this->BelongsTo(AsetHardware::class);
    }
}
