<?php
namespace App\Http\Controllers;
use App\Models\Artist;
use Illuminate\Http\Request;
class ArtistController extends Controller
{
    public function checka(Request $r)
    {
        $artist = new Artist();
        $artist->name = $r->name;
        $artist->bio = $r->bio;
        // Handle image upload
        if ($r->hasFile('image')) {
            $file = $r->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/artists'), $filename);
            $artist->image = 'uploads/artists/' . $filename;
        }
        $artist->save();    
        return redirect()->route('ViewArtist')->with('success', 'Artist added successfully!');
    }
    public function viewArtists()
    {
        $artist = Artist::all();
        return view("Admin.admin_artiest", ["ar" => $artist]);
    }
    public function deleteArtiest($id)
    {
        $artist = Artist::find($id);
        if ($artist->image && file_exists(public_path($artist->image))) {
            unlink(public_path($artist->image));
        }
        $artist->delete();
        return redirect()->route("ViewArtist")->with('success', 'Artist deleted successfully!');
    }

    public function updateArtiest($id)
    {
        $art = Artist::findOrFail($id);
        return view("Admin.admin_editartiest", ["a" => $art]);
    }
    public function updateartddata(Request $r, $id)
    {
        $art = Artist::findOrFail($id);
        $art->name = $r->name;
        $art->bio = $r->bio;

        // Handle new image upload
        if ($r->hasFile('image')) {
            // Delete old image
            if ($art->image && file_exists(public_path($art->image))) {
                unlink(public_path($art->image));
            }

            $file = $r->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/artists'), $filename);
            $art->image = 'uploads/artists/' . $filename;
        }
        $art->save();
        return redirect()->route("ViewArtist")->with('success', 'Artist updated successfully!');
    }
}
