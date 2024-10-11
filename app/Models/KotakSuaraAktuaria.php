<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KotakSuaraAktuaria extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasangan_calon_id',
        'mahasiswa_id'
    ];

    public function pasanganCalon(): BelongsTo
    {
        return $this->belongsTo(PasanganCalon::class);
    }
}
