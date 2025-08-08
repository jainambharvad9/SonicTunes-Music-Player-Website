<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
    // Store album
    public function checka(Request $r)
    {
        $data = $r->all();

        if ($r->hasFile('cover_image')) {
            $data['cover_image'] = $r->file('cover_image')->store('cover_images', 'public');
        }

        Album::create($data);
        return redirect()->route('ViewAlbums')->with('success', 'Album created successfully!');
    }

    // View all albums
    public function viewAlbumss()
    {
        $albums = Album::with('artist')->get();
        return view("Admin.admin_albums", ["al" => $albums]);
    }

    // Delete album
    public function deleteAlbums($id)
    {
        $album = Album::findOrFail($id);

        // Delete cover image if exists
        if ($album->cover_image) {
            Storage::delete('public/' . $album->cover_image);
        }

        $album->delete();
        return redirect()->route("ViewAlbums")->with('success', 'Album deleted successfully!');
    }

    // Show update form
    public function updateAlbums($id)
    {
        $alb = Album::findOrFail($id);
        $artists = Artist::all();
        return view("Admin.admin_editalbums", compact('alb', 'artists'));
    }

    // Update album
    public function updatealbddata(Request $r, $id)
    {
        $alb = Album::findOrFail($id);
        $data = $r->all();

        // Handle cover image update
        if ($r->hasFile('cover_image')) {
            if ($alb->cover_image) {
                Storage::delete('public/' . $alb->cover_image); // Delete old image
            }
            $data['cover_image'] = $r->file('cover_image')->store('cover_images', 'public');
        }

        $alb->update($data);
        return redirect()->route("ViewAlbums")->with('success', 'Album updated successfully!');
    }
}
