<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\YouTubeController;
use App\Http\Controllers\SoundCloudController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpotifyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use App\Http\Controllers\MusicController;


Route::get('/', [HomeController::class, 'index'])->name("home");
Route::get('/Album', [HomeController::class, 'album'])->name("album");
Route::get('/artist/{id}', [HomeController::class, 'artistSong'])->name('artist.song');

Route::view('/terms', 'terms')->name('terms');
Route::view('/contact', 'contact')->name('contact');
Route::view('/about', 'about')->name('about');


Route::get('/soundcloud/search', [SoundCloudController::class, 'search'])->name('soundcloud.search');

Route::get('/sonictunes/search', [SpotifyController::class, 'search'])->name('spotify.search');
Route::get('/play/{trackId}', [SpotifyController::class, 'playSong'])->name('spotify.play');
Route::post('/api/play-track', [SpotifyController::class, 'playTrack'])->name('spotify.play');
Route::get('/callback', [SpotifyController::class, 'callback'])->name('spotify.callback');


// login
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/log', [UserController::class, 'showLogPage'])->name('log');
Route::get('/register', [UserController::class, 'loginPost'])->name('register');
Route::post('/adduser/{id}', [UserController::class, 'addU'])->name('adduser');

 
// Admin Side

Route::prefix('admin')->name('admin.')->group(function () {

    // Publicly accessible routes
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.submit');
    Route::get('/register', [AdminController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AdminController::class, 'register'])->name('register.submit');

    // Protected routes
    Route::middleware(['auth:admin'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
    });
});

Route::get('/admin',[AdminController::class,'index']);
Route::get('/Addsong',[AdminController::class,'song']);
Route::get('/Viewsong',[AdminController::class,'vsong']);
Route::get('/AddAlbums',[AdminController::class,'albums']);
Route::get('/ViewAlbums',[AdminController::class,'valbums']);
Route::get('/AddArtiest',[AdminController::class,'artiest']);
Route::get('/ViewArtiest',[AdminController::class,'vartiest']);
Route::get('/admin_login',[AdminController::class,'admin_login']);
Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');




// Song Crud 
Route::post('/checkSong', [SongController::class, 'checkSongs'])->name('checkSong'); 
Route::get('/viewSong', [SongController::class, 'viewSong'])->name('ViewSong');
Route::get("/delSong/{id?}",[SongController::class,"deleteSong"])->name("delSong");
Route::get("/updateSong/{id?}",[SongController::class,"updateSong"])->name("updSong");
Route::post("/updateSong/{id?}",[SongController::class,"updateSongddata"])->name("upddataSong");



// Artist Crud
Route::post('/checkArtiest', [ArtistController::class, 'checka'])->name('checkAriest'); 
Route::get('/viewArtiest', [ArtistController::class, 'viewArtists'])->name('ViewArtist');
Route::get("/del/{id?}",[ArtistController::class,"deleteArtiest"])->name("del");
Route::get("/update/{id?}",[ArtistController::class,"updateArtiest"])->name("upd");
Route::post("/update/{id?}",[ArtistController::class,"updateartddata"])->name("upddata");


// Albums Crud
Route::post('/checkAlbums', [AlbumController::class, 'checka'])->name('checkAlbums'); 
Route::get('/viewAlbums', [AlbumController::class, 'viewAlbumss'])->name('ViewAlbums');
Route::get("/delet/{id?}",[AlbumController::class,"deleteAlbums"])->name("delet");
Route::get("/upda/{id?}",[AlbumController::class,"updateAlbums"])->name("upda");
Route::post("/updadate/{id?}",[AlbumController::class,"updatealbddata"])->name("updadata");


// See All User  in Admin
Route::get('/ViewUser',[AdminController::class,'viewUser'])->name("ViewUser");
Route::get("/delUser/{id?}",[UserController::class,"deleteUser"])->name("delUser");

