<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Http;

class ResumeParserController extends Controller
{
    public function view(){
        return view('pages.admin.plugins');
    }

    // public function parse(Request $request)
    // {
    //     // Validate the uploaded file
    //     $request->validate([
    //         'resume' => 'required|mimes:pdf,doc,docx',
    //     ]);

    //     // Get the uploaded file
    //     $resumeFile = $request->file('resume');

    //     // Send the resume file to the resume parsing API
    //     $response = Http::attach(
    //         'resume',
    //         file_get_contents($resumeFile->getRealPath()),
    //         $resumeFile->getClientOriginalName()
    //     )->post('https://resume-parser-api.com/api/v1/parse');

    //     // Check if the request was successful
    //     if ($response->successful()) {
    //         // Handle the parsed data (save to database, display to the user, etc.)
    //         $parsedData = $response->json();
    //         return response()->json($parsedData);
    //     } else {
    //         // Handle the error (display an error message, log the error, etc.)
    //         return response()->json(['error' => 'Failed to parse the resume'], $response->status());
    //     }
    // }
}
