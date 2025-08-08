<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Artist;
use App\Models\Album;
use Illuminate\Support\Facades\Storage;

class SongController extends Controller
{
    // Store song
    public function checkSongs(Request $r)
    {
        $data = $r->all();

        // Handle file uploads
        if ($r->hasFile('cover_image')) {
            $data['cover_image'] = $r->file('cover_image')->store('cover_images', 'public');
        }
        if ($r->hasFile('song_file')) {
            $data['song_file'] = $r->file('song_file')->store('songs', 'public');
        }

        Song::create($data);
        return redirect()->route('ViewSong')->with('success', 'Song added successfully!');
    }

    // View all songs
    public function viewSong()
    {
        $songs = Song::with(['artist', 'album'])->get();
        return view("Admin.admin_song", ["songs" => $songs]);
    }

    // Delete song
    public function deleteSong($id)
    {
        $song = Song::findOrFail($id);

        // Delete files if they exist
        if ($song->cover_image) {
            Storage::delete('public/' . $song->cover_image);
        }
        if ($song->song_file) {
            Storage::delete('public/' . $song->song_file);
        }

        $song->delete();
        return redirect()->route("ViewSong")->with('success', 'Song deleted successfully!');
    }

    // Show update form
    public function updateSong($id)
    {
        $song = Song::findOrFail($id);
        $artists = Artist::all();
        $albums = Album::all();
        return view("Admin.admin_editsong", compact('song', 'artists', 'albums'));
    }

    // Update song
    public function updateSongddata(Request $r, $id)
    {
        $song = Song::findOrFail($id);
        $data = $r->all();

        // Handle file uploads
        if ($r->hasFile('cover_image')) {
            if ($song->cover_image) {
                Storage::delete('public/' . $song->cover_image);
            }
            $data['cover_image'] = $r->file('cover_image')->store('cover_images', 'public');
        }

        if ($r->hasFile('song_file')) {
            if ($song->song_file) {
                Storage::delete('public/' . $song->song_file);
            }
            $data['song_file'] = $r->file('song_file')->store('songs', 'public');
        }

        $song->update($data);
        return redirect()->route("ViewSong")->with('success', 'Song updated successfully!');
    }
}
