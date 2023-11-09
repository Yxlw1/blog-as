<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->page) {
            $key = 'post'.request()->page;
        }

        else {
            $key = 'post';
        }

        if (Cache::has($key)) {
            $posts = Cache::get($key);
        } 
        
        else 
        {
            $posts = Post::where('status', 2)->orderBy('id', 'desc')->paginate(8);
            Cache::put($key, $posts);
        }

        return view('Blog_As.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $this->authorize('published', $post);

        $similares = Post::where('status', 2)
                              ->where('category_id', $post->category_id)
                              ->where('id', '!=', $post->id)
                              ->orderBy('id', 'desc')
                              ->take(4)
                              ->get();

        return view('Blog_As.posts.show', compact('post', 'similares'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // Metodos
    public function category(Category $category)
    {
        // $posts = Post::where('category_id', $category->id)->where('status', 2)->oldest('created_at')->paginate(5);
        $posts = $category->posts()->where('status', 2)->orderBy('created_at', 'desc')->paginate(5);
        $categories = Category::select('id', 'name',)->get();

        return view('Blog_As.posts.category', compact('posts', 'category', 'categories'));
    }

    public function tag(Tag $tag)
    {
        // $posts = Post::where('category_id', $category->id)->where('status', 2)->oldest('created_at')->paginate(5);
        $posts = $tag->posts()->where('status', 2)->orderBy('created_at', 'desc')->paginate(5);

        return view('Blog_As.posts.tag', compact('posts', 'tag'));
    }
}