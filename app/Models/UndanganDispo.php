<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UndanganDispo extends Model
{
    //
    protected $fillable = [
        'undangan_id',
        'penerima_id',
    ];
}
