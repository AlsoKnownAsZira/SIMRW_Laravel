<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table = 'alternatifs';

    protected $fillable = ['nama'];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            // Logika untuk menyimpan data terkait dari repeater
            if (request()->has('nilaiAlternatifs')) {
                foreach (request('nilaiAlternatifs') as $nilaiAlternatif) {
                    $model->nilaiAlternatifs()->create($nilaiAlternatif);
                }
            }
        });
    }

    public function nilaiAlternatifs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(NilaiAlternatif::class);
    }
}
