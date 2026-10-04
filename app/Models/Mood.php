<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Mood extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
    ];

    public function atmospheres(): HasMany
    {
        return $this->hasMany(Atmosphere::class);
    }
}