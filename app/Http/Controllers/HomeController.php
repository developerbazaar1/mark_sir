<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sitetypes;
use App\Models\Sites;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sitetypes = Sitetypes::orderBy('id','DESC')->get();  
        $sites = Sites::orderBy('id','DESC')->get();
        return view('home', compact('sitetypes', 'sites'));
    }


    public function getsites($id)
    {
        $sites = Sites::where('type', $id)->get();
        return response()->json($sites);
       
    }
}
