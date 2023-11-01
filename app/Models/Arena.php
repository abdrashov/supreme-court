<?php

namespace App\Models;

use App\Models\Pivot\ArenaUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Arena extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'max_users',
        'status_id',
    ];

    protected $casts = [
        'max_users' => 'integer'
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(ArenaUser::class)
            ->withTimestamps();
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
