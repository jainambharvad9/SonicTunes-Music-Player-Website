<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Song;
use App\Models\Album;


class HomeController extends Controller
{
    public function index()
    {
        $songs = Song::with('artist')->get();
    
        // Format songs for audio player
        $formattedSongs = $songs->map(function ($song) {
            return [
                'id' => $song->id,
                'title' => $song->title,
                'image_full_path' => asset('storage/' . $song->cover_image),
                'audio_full_path' => asset('storage/' . $song->song_file),
                'artist' => [
                    'name' => $song->artist->name ?? 'Unknown Artist'
                ]
            ];
        });
    
        $groupedSongs = [];
    
        foreach ($songs as $song) {
            $genres = array_map('trim', explode(',', strtolower($song->genre)));
            foreach ($genres as $genre) {
                $genreKey = ucfirst($genre);
                $groupedSongs[$genreKey][] = $song;
            }
        }
    
        $songsByPlaylist = $songs->groupBy('playlist');
        $songsByArtist = $songs->groupBy('artist');
        $songsByAlbum = $songs->groupBy('album');
        $artist = Artist::all();
    
        // Pass formattedSongs to blade for JS
        return view('index', compact(
            'groupedSongs',
            'songsByPlaylist',
            'songsByArtist',
            'songsByAlbum',
            'formattedSongs'
        ), ["ar" => $artist]);
    }
    
    public function artistSong($id)
    {
        $artist = Artist::findOrFail($id);
        $songs = Song::with('artist')->where('artist_id', $artist->id)->get()->map(function ($song) {
            return [
                'title' => $song->title,
                'image_full_path' => asset('storage/' . $song->cover_image),
                'audio_full_path' => asset('storage/' . $song->song_file),
                'artist' => [
                    'name' => $song->artist->name ?? 'Unknown Artist'
                ]
            ];
        });

        return view('artist_song', compact('artist', 'songs'));
    }
    public function album()
    {
        $albums = Album::with('songs.artist')->get();

        $songs = Song::with('artist')->get();
        $formattedSongs = $songs->map(function ($song) {
            return [
                'title' => $song->title,
                'image_full_path' => asset('storage/' . $song->cover_image),
                'audio_full_path' => asset('storage/' . $song->song_file),
                'artist' => ['name' => $song->artist->name ?? 'Unknown Artist']
            ];
        });

        $albumSongs = [];
        foreach ($albums as $album) {
            $albumSongs[$album->id] = $album->songs->map(function ($song) {
                return [
                    'title' => $song->title,
                    'image_full_path' => asset('storage/' . $song->cover_image),
                    'audio_full_path' => asset('storage/' . $song->song_file),
                    'artist' => ['name' => $song->artist->name ?? 'Unknown Artist']
                ];
            });
        }
        
        return view('album_song', [
            'album' => $albums,
            'formattedSongs' => $formattedSongs,
            'albumSongs' => $albumSongs
        ]);
        
    }
        
}
