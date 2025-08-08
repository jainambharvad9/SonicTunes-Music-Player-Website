<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return \view('login'); // Ensure you have a login.blade.php file in resources/views
    }
    
    public function addU(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    
        return redirect()->route('login')->with('success', 'User registered successfully!');
    }
    public function loginPost()
    {
        // Handle login logic here (e.g., validation, authentication)
        return view("register"); // Redirect after successful login
    }

    public function showLogPage()
    {
        return redirect()->route("home");
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route("ViewUser")->with('success', 'User deleted successfully!');
    }
}