<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Flat extends Model
{
    use HasFactory;

    public function complex(): BelongsTo
    {
        return $this->belongsTo(Complex::class);
    }

    public function types(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
