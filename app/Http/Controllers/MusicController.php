<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Favorite;
use Auth;

class MusicController extends Controller
{
    public function index()
    {
        // ✅ Fetch all songs with album and artist data
        $songs = Song::with('album', 'artist')->get();

        // ✅ Pass songs to the view
        return view('song', compact('songs'));
    }

    // public function toggleFavorite(Request $request)
    // {
    //     $songId = $request->song_id;
    //     $user = Auth::user();

    //     $favorite = Favorite::where('user_id', $user->id)->where('song_id', $songId)->first();
        
    //     if ($favorite) {
    //         $favorite->delete();
    //         return response()->json(['status' => 'removed']);
    //     } else {
    //         Favorite::create(['user_id' => $user->id, 'song_id' => $songId]);
    //         return response()->json(['status' => 'added']);
    //     }
    // }
}

