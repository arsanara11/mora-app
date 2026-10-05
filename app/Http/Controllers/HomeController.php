<?php

namespace App\Http\Controllers;

use App\Models\Atmosphere;
use App\Models\Mood;

class HomeController extends Controller
{
    public function index()
    {
        $selectedMood = request('mood');

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
            ->latest()
            ->take(6)
            ->get();

        $moods = Mood::orderBy('name')->get();

        return view('home', compact(
            'featuredAtmospheres',
            'moods',
            'selectedMood'
        ));
    }
}