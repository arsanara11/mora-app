<?php

namespace App\Http\Controllers;

use App\Models\Atmosphere;
use App\Models\User;

class AtmosphereController extends Controller
{
    public function show(string $slug)
    {
        $atmosphere = Atmosphere::with([
            'user.profile',
            'mood',
            'tags',
            'media',
        ])
            ->where('is_public', true)
            ->where('slug', $slug)
            ->firstOrFail();

        $atmosphere->increment('views_count');

        // Temporary demo user
        // Nanti akan diganti dengan authenticated user.
        $user = User::where('email', 'hello@mora.test')->first();

        $isSaved = false;

        if ($user) {
            $isSaved = $user->savedAtmospheres()
                ->where('atmosphere_id', $atmosphere->id)
                ->exists();
        }

        return view('atmosphere', compact(
            'atmosphere',
            'isSaved'
        ));
    }
}