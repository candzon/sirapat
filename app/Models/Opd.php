<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    protected $fillable = [
        'id',
        'nama',
        'kepala',
        'email',
        'telepon',
        'alamat',
        'is_active',
        'nip',
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

    public function User()
    {
        return $this->hasMany(User::class);
    }
} 