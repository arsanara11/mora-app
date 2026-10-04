<?php

namespace App\Http\Controllers;

use App\Models\Atmosphere;

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

        return view('atmosphere', compact('atmosphere'));
    }
}
