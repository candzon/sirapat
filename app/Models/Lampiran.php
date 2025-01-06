<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    protected $fillable = [
        'rapat_id',
        'nama_file',
        'jenis_file',
        'ukuran',
        'path'
    ];

    // Relationships
    public function rapat()
    {
        return $this->belongsTo(Rapat::class);
    }
} 