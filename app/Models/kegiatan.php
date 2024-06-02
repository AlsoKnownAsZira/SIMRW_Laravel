<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor',
        'tanggal',
        'pukul',
        'perihal',
        'tempat',
        'acara',
        'role_id'
    ];

    public function role(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    protected static function booted(): void
    {
        static::creating(function ($kegiatan) {
            $year = now()->year;

            // Dapatkan ID setelah record disimpan
            $nextId = self::max('id') + 1;

            // Dapatkan role pengguna
            if (auth()->user()->hasRole(['RT1', 'Admin'])) {
                $role = 'RT1';

                $kegiatan->nomor = "{$nextId}/{$role}/{$year}";

            } elseif (auth()->user()->hasRole('RT2')) {
                $role = 'RT2';

                $kegiatan->nomor = "{$nextId}/{$role}/{$year}";
            } elseif (auth()->user()->hasRole('RW')) {
                $role = 'RW';

                $kegiatan->nomor = "{$nextId}/{$role}/{$year}";
            }

        });
    }

    public function getPukulAttribute($value)
    {
        return Carbon::parse($value)->format('H:i');
    }

    public function setPukulAttribute($value): void
    {
        if ($value) {
            try {
                $this->attributes['pukul'] = Carbon::createFromFormat('H:i', $value)->format('H:i:s');
            } catch (\Exception $e) {
                try {
                    $this->attributes['pukul'] = Carbon::createFromFormat('H:i:s', $value)->format('H:i:s');
                } catch (\Exception $e) {
                    \Log::error("Failed to parse time: {$value}. Error: {$e->getMessage()}");
                    throw new \InvalidArgumentException("Invalid time format: {$value}");
                }
            }
        } else {
            $this->attributes['pukul'] = null;
        }
    }

}
