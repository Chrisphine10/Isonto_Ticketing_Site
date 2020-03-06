<?php

namespace App\Http\Controllers;

use App\Event;
use App\Image;
use App\Church;
use App\TicketToken;
use Storage;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('event.eventlist', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('event.addevent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new Image();
        $path = Storage::putFile('public', $request->file('image'));
        $url = Storage::url($path);

        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->city = $request->city;
        $event->date = $request->date;
        $event->venue = $request->venue;
        $event->time = $request->time;
        $event->user_id = \Auth::User()->id;
        $event->location_id = 1;
        $event->image_url = $url;
        $event->save();

        return redirect('/events')->with('success', 'Event created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);
        $user_id = $event->user_id;
        $ticketToken = TicketToken::where('event_id', '=', $id)->orderBy('created_at', 'desc')->paginate(10);
        $image = Image::where('event_id', '=', $id);
        $church = Church::find($user_id);
        return view('event.viewevent', ['event' => $event, 'image' => $image, 'church' => $church]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('event.editevent', compact('event'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        $event->name = $request->name;
        $event->description = $request->description;
        $event->venue = $request->venue;
        $event->time = $request->time;
        $event->city = $request->city;
        $event->date = $request->date;
        $event->save();

        return redirect('/events')->with('success', 'Event updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect('/events')->with('success', 'Event deleted!');
    }
}
