<?php

namespace App\Http\Controllers;

use App\AdminEvent;
use App\Event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('event.events', compact('events'));
    }

}
