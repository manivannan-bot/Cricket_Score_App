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
                // ->join('summaries','matches.id','=','summaries.match_id')
                ->select('matches.*',DB::raw('(select won_by from summaries where summaries.match_id=matches.id)as won_by'))
                ->where('matches.user_id',Auth::user()->id)
                ->get();
    //    
    
        $teams = DB::table('teams')
                ->select('teams.id','teams.name','teams.short_name')
                ->where('teams.user_id',Auth::user()->id)
                ->get(); 

        return view('home',array('user'=>'','Matches'=>$matches,'Teams'=>$teams));
        
    }
    
}
