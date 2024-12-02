<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        return view('pages.blog-create');
    }

    public function edit(Blog $blog)
    {
        return view('pages.blog-edit',compact('blog'));
    }

    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->description = $request->description;
        $blog->slug = Str::slug($request->input('title'));
        $blog->author = $request->input(key: 'author');
        $blog->tags = $request->input(key: 'tags');
        $blog->image = $request->input(key: 'image');
        $blog->category = $request->input(key: 'category');

        $blog->save();

        return redirect()->route('blogs.index');
    
    }

    public function update(Blog $blog,Request $request)
    {
        $blog->title = $request->input('title');
        $blog->description = $request->description;
        $blog->slug = Str::slug($request->input('title'));
        $blog->author = $request->input(key: 'author');
        $blog->tags = $request->input(key: 'tags');
        $blog->image = $request->input(key: 'image');
        $blog->category = $request->input(key: 'category');

        $blog->save();

        return redirect()->route('blogs.index');
    
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index');
    
    }


    //Todo : replace String with Blog
    public function show(Blog $blog)
    {    
        // $blog = Blog::find($blog);
        // $blog = Blog::findOrFail($blog);
        return view('pages.blog-detail', compact('blog'));
    }
}
