<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluasiTiket extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function progress()
    {
        return $this->BelongsTo(ProgressTiket::class);
    }
}
