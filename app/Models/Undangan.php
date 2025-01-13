<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Undangan extends Model
{
    protected $fillable = [
        'rapat_id',
        'user_id',
        'judul',
        'isi',
        'template',
        'status'
    ];

    // Relationships
    public function rapat()
    {
        return $this->belongsTo(Rapat::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function opd()
    {
    return $this->belongsTo(Opd::class);
    }
}