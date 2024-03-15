<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class JobController extends Controller
{
    public function view()
    {
        $jobPosts = JobPost::all();
        return view('pages.employer.employerWelcome', compact('jobPosts'));
    }

    public function index()
    {
        $jobs = JobPost::all();
        $currentPage = 'jobs';
        return view('pages.candidate.jobs', compact('jobs', 'currentPage'));
    }

    public function apply()
    {
        return view('pages.candidate.apply');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'resume' => 'required|mimes:pdf,doc,docx',
        ]);

        $resumeFile = $request->file('resume');

        // Simulate resume parsing API response for demonstration
        // Replace this with actual API call
        $parsedData = ['name' => 'John Doe', 'email' => 'john@example.com'];

        if ($parsedData) {
            Session::flash('success', 'Resume submitted successfully!');
        } else {
            Session::flash('error', 'Failed to parse the resume');
        }
        return redirect()->route('candidate.apply');
    }



    public function showList()
    {
        $jobPosts = JobPost::all();
        return view('pages.admin.jobs', compact('jobPosts'));
    }

    public function editJobs($id)
    {
        $jobPost = JobPost::findOrFail($id);
        return view('pages.admin.edit_jobs', compact('jobPost'));
    }

    // Update the specified job in storage.
    public function update(Request $request, $id)
    {
        $jobPost = JobPost::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'company_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'nullable|string|max:255',
            'status' => 'required|in:pending,active,inactive',
        ]);

        // Update the job post data with the validated input
        $jobPost->update([
            'company_name' => $request->input('company_name'),
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'tags' => $request->input('tags'),
            'status' => $request->input('status'),
        ]);
        return redirect()->route('admin.jobs')->with('success', 'Job updated successfully');
    }


    public function deleteJobs($id)
    {
        $jobPosts = JobPost::find($id);

        if (!$jobPosts) {
            return Redirect::back()->with('error', 'Company not found');
        }

        $jobPosts->delete();

        return Redirect::route('admin.jobs')->with('success', 'Company deleted successfully');
    }

    // Method to load next page of jobs
    public function nextPage()
    {
        $jobs = JobPost::all();
        $currentPage = 'nextpage';
        return view('pages.candidate.nextpage', compact('jobs', 'currentPage'));
    }


    public function create()
    {
        return view('pages.employer.jobs');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'company_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tags' => 'nullable|string|max:255',
        ]);


        $job = new JobPost();
        $job->company_name = $validatedData['company_name'];
        $job->title = $validatedData['title'];
        $job->description = $validatedData['description'];
        $job->tags = $validatedData['tags'] ?? '';
        $job->save();

        return redirect()->route('jobs.post')->with('success', 'Job posted successfully.');
    }
}
