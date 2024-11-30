<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    private $blogs;
   
    public function home()
    {
        $blogs = Blog::all();
        return view('index', compact('blogs'));
    }
    public function index()
    {
        $blogs = Blog::all();
        return view('pages.blogs', compact('blogs'));
    }

    public function create()
    {
        return view('blog-create');
    }

    public function edit(Blog $blog)
    {
        return view('blog-edit',compact('blog'));
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->body = $request->body;
        $blog->save();

        return redirect()->route('blogs.index');
    
    }

    public function update(Blog $blog,Request $request)
    {
        $blog->title = $request->input('title');
        $blog->body = $request->body;
        $blog->save();

        return redirect()->route('blogs.index');
    
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index');
    
    }


    //Todo : replace String with Blog
    public function show(String $blog)
    {    
        return view('pages.blog-detail', compact('blog'));
    }
}
