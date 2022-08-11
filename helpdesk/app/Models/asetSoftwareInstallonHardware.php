<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asetSoftwareInstallonHardware extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function asetHardware()
    {
        return $this->BelongsTo(AsetHardware::class);
    }

    public function asetSoftware()
    {
        return $this->BelongsTo(AsetSoftware::class);
    }
}
