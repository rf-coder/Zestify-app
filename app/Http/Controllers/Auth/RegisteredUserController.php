<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    // Show the registration form
    public function create()
    {
        return view('register');
    }

    // Handle the registration of new users
    public function store(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Ensure password is confirmed
        ]);

        // Create the user with 'user' role by default
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'role' => 'user', // Assign 'user' role by default
        ]);

        // Log the user in immediately after registration
        Auth::login($user);

        // Redirect to the appropriate page (e.g., products or home page)
        return redirect()->route('home');
    }
}
