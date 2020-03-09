<?php

namespace App\Http\Controllers;

use App\AdminPost;
use App\Post;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        return view('post.posts', compact('posts'));
    }

   
}
