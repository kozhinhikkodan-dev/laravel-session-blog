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
        $blogs = Blog::latest()->get();
        return view('pages.blogs', data: compact('blogs'));
    }

    public function trash()
    {
        $blogs = Blog::onlyTrashed()->get();
        // dd($blogs->toArray());
        return view('pages.blogs', compact('blogs'));
    }

    public function create()
    {
        return view('pages.blog-create');
    }

    public function edit(Blog $blog)
    {
        return view('pages.blog-edit', compact('blog'));
    }

    public function store(Request $request)
    {
        // $blog = new Blog();
        // $blog->title = $request->input('title');
        // $blog->description = $request->description;
        // $blog->slug = Str::slug($request->input('title'));
        // $blog->author = $request->input(key: 'author');
        // $blog->tags = $request->input(key: 'tags');
        // $blog->image = $request->input(key: 'image');
        // $blog->category = $request->input(key: 'category');

        // $blog->save();

        Blog::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => Str::slug($request->input('title')),
            'author' => $request->input(key: 'author'),
            'tags' => $request->input(key: 'tags'),
            'image' => $request->input(key: 'image'),
            'category' => $request->input(key: 'category'),
        ]);

        return redirect()->route('blogs.index');
    }

    public function update(Blog $blog, Request $request)
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

    public function forceDestroy(String $blog)
    {
        $blog = Blog::withTrashed()->findOrFail($blog);
        $blog->forceDelete();
        return redirect()->route('blogs.index');
    }


    //Todo : replace String with Blog
    public function show(String $blog)
    {
        $blog = Blog::withTrashed()->where('slug', $blog)->firstOrFail();
        return view('pages.blog-detail', compact('blog'));
    }
}
