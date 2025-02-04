<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
    protected $fillable = [
        'rapat_id',
        'notulis_id',
        'isi',
        'status',
        'image',
    ];

    // Relationships
    public function rapat()
    {
        return $this->belongsTo(Rapat::class);
    }

    public function notulis()
    {
        return $this->belongsTo(User::class, 'notulis_id');
    }

    public function opd()
    {
        return $this->belongsTo(Opd::class, 'notulis_id');
    }
} 