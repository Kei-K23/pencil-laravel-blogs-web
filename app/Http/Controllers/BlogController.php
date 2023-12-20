<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogUser;
use App\Models\Command;
use Illuminate\Http\Request;
use Illuminate\View\View;
use ReturnTypeWillChange;

class BlogController extends Controller
{
    // show all blogs
    public function index(Request $req): View
    {
        $blogs = Blog::latest()->filter($req->query())->paginate(10);

        return view('blogs.index', ['blogs' => $blogs]);
    }

    // show single blog
    public function show(Blog $blog): View
    {
        $blog->increment('view_count');
        $commands = Command::where('blog_id', $blog->id)->get();
        return view('blogs.show', ['blog' => $blog, 'commands' => $commands]);
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
        // Retrieve the tags string from the request and convert it into an array
        $tagsArray = explode(',', $req->input('tags'));

        // Trim and remove any extra spaces in each tag
        $tagsArray = array_map('trim', $tagsArray);

        // Remove empty tags
        $tagsArray = array_filter($tagsArray);

        // Assign the processed tags array to the form data
        $formFiles['tags'] = implode(',', $tagsArray);


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


        $formFiles['author_id'] = auth()->user()->id;
        // Retrieve the tags string from the request and convert it into an array
        $tagsArray = explode(',', $req->input('tags'));

        // Trim and remove any extra spaces in each tag
        $tagsArray = array_map('trim', $tagsArray);

        // Remove empty tags
        $tagsArray = array_filter($tagsArray);


        // Assign the processed tags array to the form data
        $formFiles['tags'] = implode(',', $tagsArray);


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

    public function like(Blog $blog)
    {

        $user = auth()->user();
        // already liked the blog
        if ($user->likedBlogs()->where('blog_id', $blog->id)->exists()) {
            $user->likedBlogs()->detach($blog->id);
            $blog->decrement('likes_count');
            return back()->with('message', 'Successfully unlike this blog.');
        }

        $user->likedBlogs()->attach($blog->id);        // $user = auth()->user();

        $blog->increment('likes_count');

        return back()->with('message', 'Successfully liked this blog.');
    }
}
