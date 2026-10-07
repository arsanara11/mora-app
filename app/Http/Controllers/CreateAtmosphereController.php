<?php

namespace App\Http\Controllers;

use App\Models\Atmosphere;
use App\Models\Mood;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CreateAtmosphereController extends Controller
{
    public function create()
    {
        $moods = Mood::orderBy('name')->get();

        return view('atmospheres.create', compact('moods'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'mood_id' => ['required', 'exists:moods,id'],
            'tags' => ['nullable', 'string'],
            'is_public' => ['nullable', 'boolean'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Demo User
        |--------------------------------------------------------------------------
        */

        $user = User::where('email', 'hello@mora.test')->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Create Atmosphere
        |--------------------------------------------------------------------------
        */

        $atmosphere = Atmosphere::create([
            'user_id' => $user->id,
            'mood_id' => $validated['mood_id'],
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . Str::lower(Str::random(5)),
            'description' => $validated['description'],
            'is_public' => $request->boolean('is_public'),
        ]);

        /*
        |--------------------------------------------------------------------------
        | Create & Attach Tags
        |--------------------------------------------------------------------------
        */

        $tagInput = trim($request->input('tags', ''));

        if ($tagInput !== '') {

            $tagNames = collect(explode(',', $tagInput))
                ->map(function ($tag) {
                    return trim($tag);
                })
                ->filter(function ($tag) {
                    return $tag !== '';
                })
                ->unique(function ($tag) {
                    return Str::lower($tag);
                })
                ->values();

            $tagIds = [];

            foreach ($tagNames as $tagName) {

                $slug = Str::slug($tagName);

                if ($slug === '') {
                    continue;
                }

                $tag = Tag::where('slug', $slug)->first();

                if (!$tag) {
                    $tag = Tag::create([
                        'name' => $tagName,
                        'slug' => $slug,
                    ]);
                }

                $tagIds[] = $tag->id;
            }

            if (!empty($tagIds)) {
                $atmosphere->tags()->sync($tagIds);
            }

        }

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('atmosphere.show', $atmosphere->slug)
            ->with('success', 'Your atmosphere has been created.');
    }
}