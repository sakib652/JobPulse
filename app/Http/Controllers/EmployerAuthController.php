<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;



class EmployerAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.employerLogin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if (!$user->is_employer) {
                Auth::logout();
                return back()->withErrors(['email' => 'Invalid credentials']);
            }
            // Authentication passed
            return redirect()->intended('/employer/dashboard');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegistrationForm()
    {
        return view('auth.employerRegister');
    }

    public function register(Request $request)
    {
        // Validate the form data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user with employer role
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_employer' => true,
        ]);

        // Log the user in after registration
        // Auth::login($user);

        $user->sendEmailVerificationNotification();

        // Redirect the user after registration
        return redirect('/')->with('success', 'Please check your email for verification.');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Check if the user already exists in your database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            // If the user exists, log them in
            Auth::login($existingUser);
            return redirect('/candidate/dashboard');
        } else {
            // If the user doesn't exist, create a new user account
            $newUser = User::create([
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'email' => $user->email,
                'password' => bcrypt(Str::random(8)),
                'is_employer' => false,
            ]);

            Auth::login($newUser);

            return redirect('/employer/dashboard');
        }
    }
}
