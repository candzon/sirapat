<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    protected $fillable = [
        'rapat_id',
        'nama',
        'keterangan',
        'tanggal'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function rapat()
    {
        return $this->belongsTo(Rapat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'nama', 'id');
    }
}
