<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $blogPosts = BlogPost::latest()->paginate(10);
        return view('pages.admin.posts', compact('blogPosts'));
    }

    public function create()
    {
        return view('pages.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        BlogPost::create($request->all());

        return redirect()->route('blogs.index')
            ->with('success', 'Blog post created successfully.');
    }

    public function show($id)
    {
        $blogPost = BlogPost::findOrFail($id);
        return view('pages.admin.show', compact('blogPost'));
    }

    public function edit($id)
    {
        $blogPost = BlogPost::findOrFail($id);
        return view('pages.admin.edit_blogs', compact('blogPost'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $blogPost = BlogPost::findOrFail($id);
        $blogPost->update($request->all());

        return redirect()->route('blogs.index')
            ->with('success', 'Blog post updated successfully.');
    }

    public function destroy($id)
    {
        $blogPost = BlogPost::findOrFail($id);
        $blogPost->delete();

        return redirect()->route('blogs.index')
            ->with('success', 'Blog post deleted successfully.');
    }
}
