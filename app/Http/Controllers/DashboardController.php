<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;
use App\Models\Artist;
use App\Models\Album;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMusic = Song::count(); // This will count all records in your music table
        $totalArtists = Artist::count(); // This will count all records in your artists table
        $totalAlbums = Album::count(); // This will count all records in your albums table
        $totalUsers = User::count(); // This will count all records in your users table

        return view('Admin.admin_dashboard', compact('totalMusic', 'totalArtists', 'totalAlbums', 'totalUsers'));
    }
}
