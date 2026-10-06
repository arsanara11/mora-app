<?php

namespace App\Http\Controllers;

use App\Models\Atmosphere;
use App\Models\Mood;
use App\Models\User;
use Illuminate\Support\Str;

class CreateAtmosphereController extends Controller
{
    public function create()
    {
        $moods = Mood::orderBy('name')->get();

        return view('atmospheres.create', compact('moods'));
    }

    public function store()
    {
        $validated = request()->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'mood_id' => ['required', 'exists:moods,id'],
            'tags' => ['nullable', 'string'],
            'is_public' => ['nullable', 'boolean'],
        ]);

        // Temporary demo user.
        // Nanti diganti dengan auth()->user().
        $user = User::where('email', 'hello@mora.test')->firstOrFail();

        $atmosphere = Atmosphere::create([
            'user_id' => $user->id,
            'mood_id' => $validated['mood_id'],
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . Str::lower(Str::random(5)),
            'description' => $validated['description'],
            'is_public' => request()->boolean('is_public'),
        ]);

        return redirect()
            ->route('atmosphere.show', $atmosphere->slug)
            ->with('success', 'Your atmosphere has been created.');
    }
}