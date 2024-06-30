<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Complex extends Model
{
    use HasFactory;

    public function flats(): HasMany
    {
        return $this->hasMany(Flat::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(ComplexPhoto::class);
    }

    public function requests(): HasMany
    {
        return $this->hasMany(Request::class);
    }

    public function types(): BelongsToMany
    {
        return $this->belongsToMany(Type::class, 'flats');
    }
}


