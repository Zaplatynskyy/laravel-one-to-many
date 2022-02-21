<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{

    protected $validation = [
        'title' => 'required|string|max:100',
        'content' => 'required',
        'published' => 'sometimes|accepted',
        'category_id' => 'nullable|exists:categories,id',
        'image' => 'nullable|mimes:jpg,jpeg,bmp,png,webp|max:2048'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();

        return view('admin.posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate($this->validation);

        $data = $request->all();

        $new_post = new Post();
        $new_post->title = $data['title'];

        $slug = Str::of($data['title'])->slug('-');
        $count = 1;
        while( Post::where('slug', $slug)->first() ) {
            $slug = Str::of($data['title'])->slug('-')."-{$count}";
            $count++;
        }
        $new_post->slug = $slug;
        
        $new_post->content = $data['content'];
        $new_post->category_id = $data['category_id'];
        
        if(isset($data['image'])) {
            $path_image = Storage::put('uploads', $data['image']);
            $new_post->image = $path_image;
        }

        $new_post->published = isset($data['published']);
        $new_post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate($this->validation);

        $data = $request->all();

        // dd($data);
        if( $post->title != $data['title'] ) {
            $post->title = $data['title'];

            $slug = Str::of($data['title'])->slug('-');
            $count = 1;
            while( Post::where('slug', $slug)->first() ) {
                $slug = Str::of($data['title'])->slug('-')."-{$count}";
                $count++;
            }
            $post->slug = $slug;
        }
        
        $post->content = $data['content'];
        $post->category_id = $data['category_id'];

        if(isset($data['image'])) {
            Storage::delete($post->image);

            $path_image = Storage::put('uploads', $data['image']);
            $post->image = $path_image;
        }

        $post->published = isset($data['published']);
        $post->save();

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->image) {
            Storage::delete($post->image);
        }
        $post->delete();

        return redirect()->route('posts.index');
    }
}
