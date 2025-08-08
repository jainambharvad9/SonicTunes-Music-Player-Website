<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Artist;
use App\Models\Album;
use App\Models\Song;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        $artists = Artist::all();
        $albums = Album::all();
        $song = Song::all();
        return \view('Admin.admin_dashboard');
    }
    public function song(){
        $artists = Artist::all();
        $albums = Album::all();
        return view('Admin.admin_addsong', compact('artists', 'albums'));
    }
    public function vsong(){
        $songs = Song::with(['artist', 'album'])->get();
        return view("Admin.admin_song", ["songs" => $songs]);
    }
    public function albums(){
        $artists = Artist::all();
        return view('Admin.admin_addalbums', compact('artists'));
    }    
    public function valbums(){
        $albums = Album::with('artist')->get();
        return view("Admin.admin_albums", ["al" => $albums]);
    }    
    public function artiest(){
        return view('Admin.admin_addartiest');
    }   
     public function vartiest(){
        $artist = Artist::all();
        return view("Admin.admin_artiest",["ar"=>$artist]);
    }

    public function viewUser(){
        $user = User::all();
        return view("Admin.admin_user",["ur"=>$user]);
    }

    public function admin_login(){
        return view("admin_login");
    }

    public function showLoginForm() {
        return view('admin_login');
    }

    public function showRegisterForm() {
        return view('admin_register');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Invalid login credentials');
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed'
        ]);

        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        // return $request;

        return redirect()->route('admin.login')->with('success', 'Registration successful!');
    }

    public function dashboard() {
        return redirect()->route("dashboard");
    }
     public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'Logged out successfully!');
    }
}
