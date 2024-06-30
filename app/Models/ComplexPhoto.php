<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComplexPhoto extends Model
{
    use HasFactory;
    protected $table='complex_photo';

    public function complex(): BelongsTo
    {
        return $this->belongsTo(Complex::class);
    }
}
