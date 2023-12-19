<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function index(): View
    {
        $blogs = Blog::latest()->paginate(10);

        return view('blogs.index', ['blogs' => $blogs]);
    }

    public function show(Blog $blog): View
    {
        return view('blogs.show', ['blog' => $blog]);
    }

    public function showLoginUserBlogs(): View
    {
        $blogs = Blog::where('author_id', auth()->user()->id)->get();
        return view('dashboard.index', ['blogs' => $blogs]);
    }
}
