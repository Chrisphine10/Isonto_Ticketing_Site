<?php

namespace App\Http\Controllers;

use App\Commentreaction;
use Illuminate\Http\Request;

class CommentreactionController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commentreaction  $commentreaction
     * @return \Illuminate\Http\Response
     */
    public function show(Commentreaction $commentreaction)
    {
        //
    }

    public function destroy(Commentreaction $commentreaction)
    {
        //
    }
}
