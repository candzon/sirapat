<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    protected $fillable = [
        'judul',
        'tanggal',
        'waktu',
        'tempat',
        'jenis_rapat_id',
        'deskripsi',
        'status',
        'created_by'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'waktu' => 'datetime',
    ];

    // Relationships
    public function jenisRapat()
    {
        return $this->belongsTo(JenisRapat::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function pesertaRapats()
    {
        return $this->hasMany(PesertaRapat::class);
    }

    public function opds()
    {
        return $this->belongsToMany(Opd::class, 'peserta_rapats');
    }

    public function notulen()
    {
        return $this->hasOne(Notulen::class);
    }

    public function undangan()
    {
        return $this->hasOne(Undangan::class);
    }

    public function lampirans()
    {
        return $this->hasMany(Lampiran::class);
    }
} 