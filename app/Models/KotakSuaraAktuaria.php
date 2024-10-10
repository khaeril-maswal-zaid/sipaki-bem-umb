<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotakSuaraAktuaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasangan_calon_id',
        'mahasiswa_id'
    ];
}
