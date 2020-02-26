<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
class CommentController extends Controller
{
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.viewpost');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();     
        $comment->comment = $request->comment;
        $comment->post_id = $request->post_id;
        $comment->user_id = \Auth::User()->id;
        $comment->save();
        $post_id = $comment->post_id;
        
        return redirect()->action(
            'PostController@show', $post_id
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::find($id);

        return view('post.viewpost', ['comment' => $comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment= Comment::find($id);
        return view('comment.editcomment', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);    
        $comment->comment = $request->comment;
        $post_id = $comment->post_id;
        $comment->save();

        return redirect()->action(
            'PostController@show', $post_id
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post_id;
        $comment->delete();

        return redirect()->action(
            'PostController@show', $post_id
        );
    }
}
