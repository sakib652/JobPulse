<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;

class JobPostControllerUpdate extends Controller
{
    Public function edit($id){
        $jobPost = JobPost::findOrFail($id);
        return view('pages.employer.editJobPost', compact('jobPost'));
    }


    public function update(Request $request, $id)
{
    $jobPost = JobPost::findOrFail($id);

    // Validate the form data
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'tags' => 'nullable|string',
    ]);

    // Update the job post with the new data
    $jobPost->update([
        'title' => $request->title,
        'description' => $request->description,
        'tags' => $request->tags,
    ]);

    // Redirect back to the employer dashboard or wherever you prefer
    return redirect()->route('employer.dashboard')->with('success', 'Job post updated successfully.');
}

}
