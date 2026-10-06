<?php

namespace App\Http\Controllers;

use App\Models\Atmosphere;
use App\Models\Mood;

class HomeController extends Controller
{
    public function index()
    {
        $selectedMood = request('mood');
        $search = trim(request('search', ''));

        $featuredAtmospheres = Atmosphere::with([
            'user.profile',
            'mood',
            'tags',
            'media',
        ])
            ->where('is_public', true)

            ->when($selectedMood, function ($query) use ($selectedMood) {
                $query->whereHas('mood', function ($moodQuery) use ($selectedMood) {
                    $moodQuery->where('slug', $selectedMood);
                });
            })

            ->when($search, function ($query) use ($search) {
                $query->where(function ($searchQuery) use ($search) {
                    $searchQuery
                        ->where('title', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhereHas('tags', function ($tagQuery) use ($search) {
                            $tagQuery->where('name', 'like', '%' . $search . '%');
                        });
                });
            })

            ->latest()
            ->take(6)
            ->get();

        $moods = Mood::orderBy('name')->get();

        return view('home', compact(
            'featuredAtmospheres',
            'moods',
            'selectedMood',
            'search'
        ));
    }
}