<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiAlternatif extends Model
{
    use HasFactory;

    protected $table = 'nilai_alternatifs';

    protected $fillable = ['alternatif_id', 'kriteria_id', 'nilai'];

    public function alternatif(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id');
    }

    public function kriteria(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }

//    public function nilaiAlternatifs(): \Illuminate\Database\Eloquent\Relations\HasMany
//    {
//        return $this->hasMany(NilaiAlternatif::class, 'alternatif_id');
//    }
}
