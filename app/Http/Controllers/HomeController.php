<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $matches=DB::table('matches')
                ->select('matches.*')
                ->where('matches.user_id',Auth::user()->id)
                ->get();
 

        return view('home',array('user'=>'','Matches'=>$matches));
        
    }
    
}
