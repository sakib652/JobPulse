<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function showEmployer(){
        $blogPosts = BlogPost::latest()->paginate(10);
        return view("pages.employer.blogs",compact('blogPosts'));
    }

    public function showCandidate(){
        $blogPosts = BlogPost::latest()->paginate(10);
        return view("pages.candidate.blogs",compact('blogPosts'));
    }
}
