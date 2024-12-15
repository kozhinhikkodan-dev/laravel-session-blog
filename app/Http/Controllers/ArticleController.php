<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Article;
// use App\Models\Blog;
// use App\Models\BlogTag;
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

class ArticleController extends Controller
{

    // private $blogs;
    use ValidatesRequests;

    public function home()
    {
       
        $articles = Article::all();
        return view('index', compact('articles'));
    }
    public function index(Request $request)
    {

        $articles = Article::latest()->get();
        $articles->load('comments');

        foreach ($articles as $article) {
            $comments = $article->comments;
        }
        if($request->tag){
            // $articles = Tag::where('name',$request->tag)->with('blogs')->get()[0]['blogs'];
        }else{
            $articles = Article::with('comments','tags')->latest()->get();
        }
        

        session('success','all good');
        return view('pages.articles.articles', data: compact('articles'));
    }

    public function trash()
    {
        $articles = Article::onlyTrashed()->get();
        return view('pages.articles', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.articles.article-create',compact('categories','tags')); 
    }

    public function edit(Article $article)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('pages.articles.article-edit', compact('article','categories','tags'));
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

        $article = Article::create([
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

        $article->meta()->create([
            'meta_title' => $request->input('meta_title'),
            'meta_description' => $request->input('meta_description'),
        ]);

        // foreach ($request->input( 'tags') as $tagId) {
        //     BlogTag::create([
        //         'blog_id' => $blog->id,
        //         'tag_id' => $tagId
        //     ]);
        // }

        return redirect()->route('articles.index')->with('success', 'Articles created successfully');
    }

    public function update(Article $article, Request $request)
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
        'title' => 'required|min:5|max:10|unique:articles,title,'.$article->id,
        'description' => [
            'required',
        ],
        'category_id' => 'exists:categories,id',

        ],
         // Custom messages
        [
            'title.required' => 'Article Title is mandatory for creating article post',
            'title.unique' => 'Article Title is already taken, try creating unique title',
        ],
        // Key Names
        [
            'description' => 'Article description'
        ]
    );

        $article->update([
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
        
        // foreach ($request->input( 'tags') as $tagId) {
        //     $article->tags()->attach([
        //         'tag_id' => $tagId
        //     ]);
        // }

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }

    public function forceDestroy(String $article)
    {
        $article = Article::withTrashed()->findOrFail($article);
        $article->forceDelete();
        return redirect()->route('articles.index');
    }


    //Todo : replace String with Blog
    public function show(String $article)
    {
        $article = Article::with('comments','tags')->withTrashed()->findBySlug($article);
        // dd($blog->toArray());
        return view('pages.articles.article-detail', compact('article'));
    }

    // commentStore
    public function commentStore(Request $request)
    {
    //    Comment::create([
    //        'blog_id' => $request->blog_id,
    //        'comment' => $request->comment
    //    ]);

    $article = Article::find($request->article_id);
    $article->comments()->createMany([
        [
        'comment' => $request->comment
        ],
        [
        'comment' => $request->comment
        ]
    ]);


       return redirect()->back()->with('success', 'Comment added successfully');
    }
}
