<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SavedAtmosphere extends Model
{
    protected $fillable = [
        'user_id',
        'atmosphere_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function atmosphere(): BelongsTo
    {
        return $this->belongsTo(Atmosphere::class);
    }
}