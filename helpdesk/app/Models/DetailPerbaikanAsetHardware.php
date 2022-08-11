<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPerbaikanAsetHardware extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function asetHardware()
    {
        return $this->BelongsTo(asetHardware::class);
    }
}
