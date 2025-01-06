<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesertaRapat extends Model
{
    protected $fillable = [
        'rapat_id',
        'opd_id',
        'status_kehadiran',
        'waktu_hadir'
    ];

    protected $casts = [
        'waktu_hadir' => 'datetime'
    ];

    // Relationships
    public function rapat()
    {
        return $this->belongsTo(Rapat::class);
    }

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }
} 