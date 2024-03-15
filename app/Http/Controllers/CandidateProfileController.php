<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateProfileController extends Controller
{
    public function edit()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Pass the user data to the view
        return view('pages.candidate.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Validate the form data
        // $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
        //     'password' => 'nullable|string|min:8|confirmed',
        // ]);

        // Get the authenticated user
        // $user = Auth::user();

        // Update the user's information
        // $user->fill([
        //     'first_name' => $request->input('first_name'),
        //     'last_name' => $request->input('last_name'),
        //     'email' => $request->input('email'),
        // ]);

        // Check if a new password is provided
        // if ($request->filled('password')) {
        //     $user->password = bcrypt($request->input('password'));
        // }

        // Save the changes
        // $user->save();

        // Redirect back to the profile page with a success message
        // return redirect()->route('candidate.profile')->with('success', 'Profile updated successfully.');
    }
}

