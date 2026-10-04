<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    protected $fillable = [
        'name',
        'slug',
    ];

    public function atmospheres(): BelongsToMany
    {
        return $this->belongsToMany(
            Atmosphere::class,
            'atmosphere_tag'
        )->withTimestamps();
    }
}