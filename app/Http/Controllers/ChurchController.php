<?php

namespace App\Http\Controllers;

use App\Church;
use App\Image;
use App\User;
use Storage;
use Illuminate\Http\Request;

class ChurchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $churches = Church::latest()->paginate(10);
        return view('church.churchlist', compact('churches'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Church::class);
        if(Church::where('user_id', \Auth::user()->id )->exists()){
            return redirect('/churches')->with('success', 'Church saved!');
           }else {            
        return view('church.addchurch');
           }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Church::class);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:churches'],
        ]);
        $image = new Image();
        $path = Storage::putFile('public', $request->file('image'));
        $url = Storage::url($path);

        $church = new Church();
        $church->name = $request->name;
        $church->email = $request->email;
        $church->description = $request->description;
        $church->address = $request->address;
        $church->city = $request->city;
        $church->phone_number = $request->phone;
        $church->image_url = $url;
        $church->user_id = \Auth::User()->id;
        $church->location_id = 1;
        $church->save();

        return redirect('/churches')->with('success', 'Church saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $church = Church::find($id);
        $image = Image::where('church_id', '=', $id)->orderBy('created_at', 'desc')->paginate(10);
        return view('church.churchview', ['church' => $church, 'image' => $image]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('create', Church::class);
        $church = Church::find($id);
        return view('church.editchurch', compact('church'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('create', Church::class);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $church = Church::find($id);
        $church->name = $request->name;
        $church->email = $request->email;
        $church->description = $request->description;
        $church->address = $request->address;
        $church->city = $request->city;
        $church->phone_number = $request->phone;
        $church->save();
        return redirect('/churches')->with('success', 'Church Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('create', Church::class);
        $church = Church::find($id);
        $church->delete();

        return redirect('/churches')->with('success', 'Church deleted!');
    }

}
