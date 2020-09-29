<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $this->validate_data($request);
        $slug = Str::slug($data['slug']);
        $image_path = $this->store_image($request->image, 'blog_images');
        $data = array_merge($data, ['image' => $image_path, 'slug' => $slug]);
        Post::create($data);
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('admin.blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        if ($request->hasFile('image')) {
            $data  =  $this->validate_data($request, $post->id);
            $image_path = $this->store_image($request->image, 'blog_images');
            $data = array_merge($data, ['image' => $image_path]);
            $post->update($data);
        } else {
            $data = $this->validate_data($request, $post->id);
            $data = array_merge($data, ['image' => $post->image]);
            $post->update($data);
        }

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $image = $post->image;
        $image = explode('/', $image, 2);

        Storage::delete($image[1]);
        $post->delete();
        return redirect(route('post.index'));
    }

    public function validate_data(Request $request, $id = null)
    {
        if ($request->isMethod('post')) {
            return $request->validate([
                'title' => 'required|min:10|unique:posts,title',
                'slug' => 'required',
                'body' => 'required',
                'author_name' => 'required',
                'image' => 'required|image|mimes:jpg,jpeg,png,svg'
            ]);
        } else {
            if ($id != null) {

                return $request->validate([
                    'title' => "required|min:10|unique:posts,title,$id",
                    'slug' => 'required',
                    'body' => 'required',
                    'author_name' => 'required',
                    'image' => 'image|mimes:jpg,jpeg,png,svg'
                ]);
            }
        }
    }

    public function store_image($file, $path)
    {
        if ($file) {
            $file_path = $file->store($path, 'public');
            $file_path = 'storage/' . $file_path;
            return $file_path;
        }
    }
}
