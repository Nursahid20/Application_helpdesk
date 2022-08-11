<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Cviebrock\EloquentSluggable\Sluggable;

class Karyawan extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function jabatan()
    {
        return $this->BelongsTo(Jabatan::class);
    }

    public function departemen()
    {
        return $this->BelongsTo(Departemen::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
