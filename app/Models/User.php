<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function atmospheres()
    {
        return $this->hasMany(Atmosphere::class);
    }

    public function savedAtmospheres()
    {
        return $this->belongsToMany(
            Atmosphere::class,
            'saved_atmospheres'
        )->withTimestamps();
    }
}