<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;
use App\Models\Image as ModelsImage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create', 'store');
        $this->middleware('can:admin.posts.show')->only('show');
        $this->middleware('can:admin.posts.edit')->only('edit', 'update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view('Blog_As.admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('Blog_As.admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $post = Post::create($request->all());

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // El archivo está presente y válido.
            $name = Str::random(10) . '.' . $request->file('file')->getClientOriginalExtension();

            $url = storage_path() . '/app/public/posts/' . $name;

            Image::make($request->file('file'))->resize(1200, 825)->save($url);

            $post->image()->create([
                'url' => 'posts/' . $name
            ]);
        }

        Cache::flush();

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        if ($post->status == 1) {
            return redirect()->route('admin.posts.edit', $post)->with('info', 'El Post se ha creado correctamente!');
        } else {
            return redirect()->route('admin.posts.index')->with('info', 'El Post se ha creado correctamente!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('author', $post);

        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('Blog_As.admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);

        $post->update($request->all());

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // El archivo está presente y válido.
            $name = Str::random(15) . '.' . $request->file('file')->getClientOriginalExtension();

            $url = storage_path() . '/app/public/posts/' . $name;

            Image::make($request->file('file'))->resize(1200, 825)->save($url);

            if ($post->image) {
                Storage::delete($post->image->url);

                $post->image()->update([
                    'url' => 'posts/' . $name
                ]);
            } 
            
            else {
                $post->image()->create([
                    'url' => 'posts/' . $name
                ]);
            }
        }

        if ($request->tags) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->detach();
        }

        Cache::flush();

        return redirect()->route('admin.posts.edit', $post)->with('info', 'Se ha actualizado el Post correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('author', $post);

        $post->delete();

        Cache::flush();

        return redirect()->route('admin.posts.index')->with('info', 'Se ha eliminado el Post Correctamente!');
    }
}
