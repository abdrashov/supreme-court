<?php

namespace App\Models\Pivot;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ArenaUser extends Pivot
{
    protected $casts = [
        'point' => 'integer'
    ];
}
