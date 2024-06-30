<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    use HasFactory;

    public function complexes(): BelongsToMany
    {
        return $this->belongsToMany(Complex::class, 'flats');
    }

    public function requests(): HasMany
    {
        return $this->hasMany(Request::class);
    }
}
