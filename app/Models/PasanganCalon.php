<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class PasanganCalon extends Model
{
    /** @use HasFactory<\Database\Factories\PasanganCalonFactory> */
    use HasFactory;

    public function kotakSuara(): HasMany
    {
        return $this->hasMany(KotakSuara::class);
    }
}
