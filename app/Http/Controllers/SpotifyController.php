<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;

class SpotifyController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('track');

        $songs = Song::query()->with(['album', 'artist'])
            ->when($search, function ($q) use ($search) {
                $q->where("title", 'like', '%' . $search . '%');
            })
            ->get();

        return view('search-results', compact('songs'));
    }
}
