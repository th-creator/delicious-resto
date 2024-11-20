<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('register'); // Point to your custom HTML file
    }

    /**
     * Handle the registration request.
     */
    public function register(Request $request)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Create a new user
        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'path' => 'https://expertsbyab.blob.core.windows.net/expertspublic/lawyers/profiles/default_profile.png',
            'phone' => $request->phone,
            'role' => 'user',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to the dashboard or wherever you like
            return redirect('/');
    }
}
