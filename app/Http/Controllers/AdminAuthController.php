<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.adminLogin');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && $user->is_admin && password_verify($request->password, $user->password)) {
        // Log in the user
        Auth::login($user);
        
        return redirect()->route('admin.dashboard');
    }

    // Authentication failed
    return back()->withErrors(['email' => 'Invalid credentials']);
}

public function edit()
{
    $aboutPage = About::first();
    return view('pages.admin.about', compact('aboutPage'));
}

public function update(Request $request)
{
    $aboutPage = About::firstOrNew();
    $aboutPage->page_title = $request->page_title;
    $aboutPage->company_history = $request->company_history;
    $aboutPage->company_vision = $request->company_vision;
    $aboutPage->save();

    return redirect()->route('pages.about')->with('success', 'About page updated successfully.');
}
    
}
