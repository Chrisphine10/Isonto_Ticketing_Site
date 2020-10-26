<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Church;
use Illuminate\Http\Request;

class AdminChurchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $churches = Church::latest()->paginate(10);
        return view('church.churches', compact('churches'));
    }

}
