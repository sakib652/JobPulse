<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contact_messages',
            'subject' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'query' => 'required|string',
        ]);

        $contactMessage = new ContactMessage();
        $contactMessage->name = $request->name;
        $contactMessage->email = $request->email;
        $contactMessage->subject = $request->subject;
        $contactMessage->mobile = $request->mobile;
        $contactMessage->query = $request->input('query');
        $contactMessage->save();

        // Send email using Mailtrap
        Mail::to('rahman.polash188@gmail.com')->send(new ContactMessageMail($contactMessage));

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}