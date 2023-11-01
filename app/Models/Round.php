<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Round extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'middle_number',
        'arena_id'
    ];

    protected $casts = [
        'middle_number' => 'decimal:2'
    ];

    public function arena(): BelongsTo
    {
        return $this->belongsTo(Arena::class);
    }
}
