<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisRapat extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi'
    ];

    // Relationships
    public function rapats()
    {
        return $this->hasMany(Rapat::class);
    }
} 