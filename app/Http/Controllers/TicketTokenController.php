<?php

namespace App\Http\Controllers;

use App\TicketToken;
use Illuminate\Http\Request;

class TicketTokenController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $ticketToken = new TicketToken();     
        $ticketToken->user_id = $request->user_id;
        $ticketToken->event_id = $request->event_id;
        $ticketToken->token =  bcrypt(rand(1, 100000000));
        $ticketToken->save();

        return redirect('/events')->with('success', 'Joined!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TicketToken  $ticketToken
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticketToken = TicketToken::find($id);
         return view('event.viewevent', ['ticket' => $ticketToken]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TicketToken  $ticketToken
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticketToken = TicketToken::find($id);
        $ticketToken->delete();

        return redirect('/events')->with('success', 'Removed!');
    }
}
