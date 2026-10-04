<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Media extends Model
{
    protected $fillable = [
        'atmosphere_id',
        'type',
        'title',
        'description',
        'file_path',
        'content',
        'external_url',
        'sort_order',
    ];

    public function atmosphere(): BelongsTo
    {
        return $this->belongsTo(Atmosphere::class);
    }
}