<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KotakSuaraPeternakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasangan_calon_id',
        'mahasiswa_id'
    ];
}
