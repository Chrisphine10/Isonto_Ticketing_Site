<?php

namespace App\Http\Controllers;

use App\Event;
use App\Image;
use App\EventComment;
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
        $this->authorize('create', Event::class);
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
        $this->authorize('create', Event::class);
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
        $event = Event::findOrFail($id);
        $user_id = $event->user_id;
        $eventcomments = EventComment::where('event_id', '=', $id)->orderBy('created_at', 'desc')->firstOrFail();
        $ticketToken = TicketToken::where('event_id', '=', $id)->orderBy('created_at', 'desc')->get();
        $images = Image::where('event_id', '=', $id)->orderBy('created_at', 'desc')->get();
        $church = Church::where('user_id', '=', $user_id)->orderBy('created_at', 'desc')->firstOrFail();
        return view('event.viewevent', ['event' => $event, 'images' => $images, 'church' => $church, 'ticket' => $ticketToken, 'eventcomments' => $eventcomments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('create', Event::class);
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
        $this->authorize('create', Event::class);
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
        $this->authorize('create', Event::class);
        $event = Event::find($id);
        $event->delete();

        return redirect('/events')->with('success', 'Event deleted!');
    }
}
