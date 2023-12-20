<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;
use ReturnTypeWillChange;

class BlogController extends Controller
{
    // show all blogs
    public function index(): View
    {
        $blogs = Blog::latest()->paginate(10);

        return view('blogs.index', ['blogs' => $blogs]);
    }

    // show single blog
    public function show(Blog $blog): View
    {

        $blog->increment('view_count');
        return view('blogs.show', ['blog' => $blog]);
    }

    // show create blog page
    public function create(): View
    {
        return view('blogs.create');
    }

    // create blog
    public function store(Request $req)
    {
        $blog = $req->all();

        $formFiles = $req->validate([
            'title' => ['required', 'string', 'min:3'],
            'content' => ['required', 'string'],
        ]);

        $formFiles['author_id'] = auth()->user()->id;
        $formFiles['tags'] = $blog['tags'];

        Blog::create($formFiles);

        return redirect('/')->with('message', 'Successfully create new blog');
    }

    //edit blog
    public function edit(Blog $blog): View
    {
        return view('blogs.edit', ['blog' => $blog]);
    }

    // update blog
    public function update(Request $req, Blog $blog)
    {
        $formFiles =  $req->validate([
            'title' => ['string', 'min:3'],
            'content' => ['string'],
            'tags' => ['string']
        ]);
        $blog->update($formFiles);

        return back()->with('message', 'Successfully edited');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return redirect('/')->with('message', 'Successfully delete the blog');
    }

    public function showLoginUserBlogs(): View
    {
        $blogs = Blog::where('author_id', auth()->user()->id)->get();
        return view('dashboard.index', ['blogs' => $blogs]);
    }
}
