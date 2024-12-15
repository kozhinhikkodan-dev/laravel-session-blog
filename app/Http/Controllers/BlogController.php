<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Tag;
use App\Models\Category;
use App\Models\Comment;
use App\Models\MetaDetail;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{

    private $blogs;
    use ValidatesRequests;

    public function home()
    {
       
        $blogs = Blog::all();
        return view('index', compact('blogs'));
    }
    public function index(Request $request)
    {
// 
        $blogs = Blog::latest()->get();



        $blogs->load('comments');

        foreach ($blogs as $blog) {
            $comments = $blog->comments;
        }

        // dd($blogs->toArray());

        



        // dd($request->tag);
        if($request->tag){
            $blogs = Tag::where('name',$request->tag)->with('blogs')->get()[0]['blogs'];
        }else{
            $blogs = Blog::with('comments','tags')->latest()->get();
        }
        

        session('success','all good');
        return view('pages.blogs', data: compact('blogs'));
    }

    public function trash()
    {
        $blogs = Blog::onlyTrashed()->get();
        return view('pages.blogs', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.blog-create',compact('categories','tags')); 
    }

    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.blog-edit', compact('blog','categories','tags'));
    }

    // private function validate(Request $request){
    //     $request->validate(
    //         // Rules
    //     [
    //     'title' => 'required|min:5|max:10|unique:blogs',
    //     'description' => 'required|in:1,2,3',
    //     'category_id' => [
    //             Rule::exists('categories', 'id'),
    //             function ($attribute, $value, $fail) {
    //                 if ($value) {
    //                   $categoryName = Category::find($value)->name;
    //                   if ($categoryName === 'Laravel') {
    //                     $fail('Laravel is not a supporting now.');
    //                   }  
    //                 }
    //             }
    //         ],
    //     ],
    //      // Custom messages
    //     [
    //         'title.required' => 'Blog Title is mandatory for creating blog post',
    //         'title.unique' => 'Blog Title is already taken, try creating unique title',
    //     ],
    //     // Key Names
    //     [
    //         'description' => 'Blog description'
    //     ]
    // );
    // }

    public function store(BlogPostRequest $request)
    {

        // $this->validate($request);

        // dd($request->all());

        $blog = Blog::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => Str::slug($request->input('title')),
            'author' => $request->input(key: 'author'),
            // 'tags' => $request->input(key: 'tags'),
            'image' => $request->input(key: 'image'),
            'category' => $request->input(key: 'category'),
        ]);

        // $blogmeta =  MetaDetail::create([
        //     'blog_id' => $blog->id,
        //     'meta_title' => $request->input('meta_title'),
        //     'meta_description' => $request->input('meta_description'),
        // ]);

        // $blog->meta()->dissociate();
     
        // $blog->meta()->save(new MetaDetail([
        //     'meta_title' => $request->input('meta_title'),
        //     'meta_description' => $request->input('meta_description'),
        // ]));

        $blog->meta()->create([
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
        ]);

        foreach ($request->input( 'tags') as $tagId) {
            BlogTag::create([
                'blog_id' => $blog->id,
                'tag_id' => $tagId
            ]);
        }

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully');
    }

    public function update(Blog $blog, Request $request)
    {

        // dd($blog->tags->first()->id);

        // $blog->title = $request->input('title');
        // $blog->description = $request->description;
        // $blog->slug = Str::slug($request->input('title'));
        // $blog->author = $request->input(key: 'author');
        // $blog->tags = $request->input(key: 'tags');
        // $blog->image = $request->input(key: 'image');
        // $blog->category = $request->input(key: 'category');

        // $blog->save();

        $request->validate(
            // Rules
        [
        'title' => 'required|min:5|max:10|unique:blogs,title,'.$blog->id,
        'description' => [
            'required',
        ],
        'category_id' => 'exists:categories,id',

        ],
         // Custom messages
        [
            'title.required' => 'Blog Title is mandatory for creating blog post',
            'title.unique' => 'Blog Title is already taken, try creating unique title',
        ],
        // Key Names
        [
            'description' => 'Blog description'
        ]
    );

        $blog->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => Str::slug($request->input('title')),
            'author' => $request->input(key: 'author'),
            'image' => $request->input(key: 'image'),
            'category' => $request->input(key: 'category'),
        ]);

        // $blog->tags()->syncWithoutDetaching($request->input( 'tags'));
        

        // $blog->tags()->detach();

        // BlogTag::where([
        //     'blog_id' => $blog->id,
        // ])->delete();
        
        foreach ($request->input( 'tags') as $tagId) {
            $blog->tags()->attach([
                'tag_id' => $tagId
            ]);
        }

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
        $blog = Blog::with('comments','tags')->withTrashed()->findBySlug($blog);
        // dd($blog->toArray());
        return view('pages.blog-detail', compact('blog'));
    }

    // commentStore
    public function commentStore(Request $request)
    {
    //    Comment::create([
    //        'blog_id' => $request->blog_id,
    //        'comment' => $request->comment
    //    ]);

    $blog = Blog::find($request->blog_id);
    $blog->comments()->create(
        [
        'comment' => $request->comment,
        ],
    );


       return redirect()->back()->with('success', 'Comment added successfully');
    }
}
