<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Atmosphere extends Model
{
    protected $fillable = [
        'user_id',
        'mood_id',
        'title',
        'slug',
        'description',
        'cover_image',
        'is_public',
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function mood(): BelongsTo
    {
        return $this->belongsTo(Mood::class);
    }

    public function media(): HasMany
    {
        return $this->hasMany(Media::class)
            ->orderBy('sort_order');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(
            Tag::class,
            'atmosphere_tag'
        )->withTimestamps();
    }

    public function savedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'saved_atmospheres'
        )->withTimestamps();
    }
}