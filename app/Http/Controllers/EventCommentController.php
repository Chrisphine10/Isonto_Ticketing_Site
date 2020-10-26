<?php

namespace App\Http\Controllers;

use App\EventComment;
use Illuminate\Http\Request;

class EventCommentController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventComment = EventComment::latest()->paginate(10);
        return view('event.viewevent', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new EventComment();     
        $comment->comment = $request->comment;
        $comment->post_id = $request->event_id;
        $comment->user_id = \Auth::User()->id;
        $comment->save();
        $event_id = $comment->event_id;
        
        return redirect()->action(
            'EventController@show', $event_id
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\EventComment  $eventComment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventcomments = EventComment::findorFail($id);

        return view('event.viewevent', ['eventcomments' => $eventcomments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\EventComment  $eventComment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventcomment= EventComment::findorFail($id);
        return view('comment.editeventcomment', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EventComment  $eventComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $eventComment = EventComment::find($id);    
        $eventComment->comment = $request->comment;
        $event_id = $eventComment->event_id;
        $eventComment->save();

        return redirect()->action(
            'EventController@show', $event_id
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EventComment  $eventComment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = EventComment::findorFail($id);
        $event_id = $comment->event_id;
        $comment->delete();

        return redirect()->action(
            'EventController@show', $event_id
        );
    }
}
