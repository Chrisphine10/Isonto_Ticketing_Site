<?php

namespace App\Http\Controllers;

use App\ChurchMember;
use Illuminate\Http\Request;

class ChurchMemberController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $churchMember = new ChurchMember();     
        $churchMember->user_id = \Auth::User()->id;
        $churchMember->church_id = $request->church_id;
        $churchMember->token = bcrypt(rand(1, 10));
        $churchMember->save();

        return redirect('/churches')->with('success', 'Joined!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChurchMember  $churchMember
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $churchMember = ChurchMember::find($id);
        return view('churches.churchview', ['member' => $churchMember]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChurchMember  $churchMember
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $churchMember = ChurchMember::find($id);
        $churchMember->delete();

        return redirect('/churches')->with('success', 'Removed!');
    }
}
