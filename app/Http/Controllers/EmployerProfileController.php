<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployerProfileController extends Controller
{

    public function view(){
        return view('pages.employer.accounts');
    }

    public function edit()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Pass the user data to the view
        return view('pages.employer.edit', compact('user'));
    }

    public function update(Request $request)
    {
        
        // $user = Auth::user();

        // $validatedData = $request->validate([
        //     'first_name' => 'required|string|max:255',
        //     'last_name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        //     'password' => 'nullable|string|min:8|confirmed',
        // ]);

        
        // $user->first_name = $request->input('first_name');
        // $user->last_name = $request->input('last_name');
        // $user->email = $request->input('email');
        // if ($request->filled('password')) {
        //     $user->password = bcrypt($request->input('password'));
        // }
        // $user->save();

        // return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully');
    }
}
