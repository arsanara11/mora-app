<?php

namespace App\Http\Controllers;

use App\Models\Atmosphere;
use App\Models\User;

class SavedAtmosphereController extends Controller
{
    public function toggle(string $slug)
    {
        $atmosphere = Atmosphere::where('slug', $slug)
            ->where('is_public', true)
            ->firstOrFail();

        // Temporary demo user
        // Nanti akan kita ganti dengan user yang sedang login.
        $user = User::where('email', 'hello@mora.test')->firstOrFail();

        $alreadySaved = $user->savedAtmospheres()
            ->where('atmosphere_id', $atmosphere->id)
            ->exists();

        if ($alreadySaved) {
            $user->savedAtmospheres()->detach($atmosphere->id);

            if ($atmosphere->saves_count > 0) {
                $atmosphere->decrement('saves_count');
            }
        } else {
            $user->savedAtmospheres()->attach($atmosphere->id);

            $atmosphere->increment('saves_count');
        }

        return back();
    }
}