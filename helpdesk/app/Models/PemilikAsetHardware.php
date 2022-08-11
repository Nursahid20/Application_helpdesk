<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemilikAsetHardware extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function karyawan()
    {
        return $this->BelongsTo(Karyawan::class);
    }
    public function asetHardware()
    {
        return $this->BelongsTo(AsetHardware::class);
    }
}
