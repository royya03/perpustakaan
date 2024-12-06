<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KategoriBukuRelasi extends Model
{
    use HasFactory;

    protected $table = 'kategori_buku_relasi';

    public function buku(): BelongsTo
    {
        return $this->belongsTo(Buku::class, 'buku_id', 'id');
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
