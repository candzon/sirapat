<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    protected $fillable = [
        'nama',
        'kepala',
        'email',
        'telepon',
        'alamat',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function pesertaRapats()
    {
        return $this->hasMany(PesertaRapat::class);
    }

    public function rapats()
    {
        return $this->belongsToMany(Rapat::class, 'peserta_rapats');
    }
} 