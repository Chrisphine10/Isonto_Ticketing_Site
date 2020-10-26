<?php

namespace App\Http\Controllers;

use App\Post;
use App\Image;
use App\Comment;
use Storage;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
         return view('post.postlist', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        return view('post.addpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);
        $image = new Image();
        $path = Storage::putFile('public', $request->file('image'));
        $url = Storage::url($path);
        
        $post = new Post();
        $post->title = $request->title;     
        $post->body = $request->body;
        $post->user_id = \Auth::User()->id;
        $post->image_url = $url;
        $post->save();

        return redirect('/posts')->with('success', 'Post created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', '=', $id)->orderBy('created_at', 'desc')->paginate(10);
        $image_id = $post->images_id;
        $image = Image::find($image_id);
        return view('post.viewpost', ['post' => $post, 'comments' => $comments, 'image' => $image]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('create', Post::class);
        $post= Post::find($id);
        return view('post.editpost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('create', Post::class);
        $post = Post::find($id);
        $post->body = $request->body;
        $post->title = $request->title;
        $post->save();

        return redirect('/posts')->with('success', 'Post Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('create', Post::class);
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post deleted!');
    }
}
