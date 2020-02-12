<?php

namespace App\Http\Controllers;

use App\Church;
use App\Image;
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
        return view('church.addchurch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $image = new Image();
        $image->image_url = $request->image;
        $image->save();
        $image_id = $image->id;

        $church = new Church();
        $church->name = $request->name;
        $church->email = $request->email;
        $church->description = $request->description;
        $church->address = $request->address;
        $church->city = $request->city;
        $church->image_id =  $image_id;
        $church->user_id =  1;
        $church->location_id = 1;
        $church->password = $request->password;
        $church->phone_number = $request->phone;
        $church->save();

        //return view('church.addchurch');
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
        $data = Church::find($id);

        return view('church.churchview', ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $church = Church::find($id);
        $church->delete();

        return redirect('/churches')->with('success', 'Church deleted!');
    }
}
