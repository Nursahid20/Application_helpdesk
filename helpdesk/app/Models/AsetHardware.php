<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsetHardware extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function pemilikAsetHardware()
    {
        return $this->BelongsTo(PemilikAsetHardware::class);
    }

    public function getRouteKeyName()
    {
        return 'kode_hardware';
    }

    public function jenisAsetHardware()
    {
        return $this->BelongsTo(JenisAset::class);
    }
}
