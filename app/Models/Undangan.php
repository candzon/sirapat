<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Undangan extends Model
{
    protected $fillable = [
        'rapat_id',
        'user_id',
        'judul',
        'isi',
        'template',
        'status',
        'penerima_id',
    ];

    // Relationships
    public function rapat()
    {
        return $this->belongsTo(Rapat::class, 'rapat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function opd()
    {
        return $this->belongsTo(Opd::class, 'user_id');
    }

    public function userOpd()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function undangan_dispo()
    {
        return $this->hasMany(UndanganDispo::class, 'undangan_id');
    }
}