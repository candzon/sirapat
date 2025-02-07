<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'opd_id',
        'is_active',
    ];

    protected $hidden = [
        'password',
    ];

    // Relationships
    public function createdRapats()
    {
        return $this->hasMany(Rapat::class, 'created_by');
    }

    public function notulens()
    {
        return $this->hasMany(Notulen::class, 'notulis_id');
    }
}
