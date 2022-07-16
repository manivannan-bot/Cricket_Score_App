<?php

namespace App\Http\Controllers;
use App\Models\teams;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TeamsController extends Controller
{ public function index(Request $request)
    {
     $this->validate($request,[
      'name'=> 'required',
      'short_name'=> 'required',
      'status'=> 'required',
         ]);         
    
       $user= new teams();
       $user->name= $request['name'];
       $user->short_name= $request['short_name'];
       $user->status= $request['status'];
       $user->user_id= auth()->user()->id;
 
      $user->save();   

         
      return redirect('/home')->with('message','success match added successfully');
     }

     public function show(){
      $teams=teams::select('teams.id','teams.name')
                        ->where('teams.user_id',Auth::user()->id)
                        ->get();
      $data = DB::table('teams')
                ->join('players', 'teams.id', '=', 'players.team_id')
                ->select('teams.id','teams.name','teams.short_name','players.team_id','teams.user_id',DB::raw(' count(players.id) as total'))
                ->where('teams.user_id',Auth::user()->id)
                ->groupBY('teams.id')
                ->get(); 
        //dd($teams);
      return view('create_player',array('Members'=>$data,'Teams'=>$teams));

     }
     public function view($team_id){
  
      $data = DB::table('teams')
                ->join('players', 'teams.id', '=', 'players.team_id')
                ->select('players.id','players.name','teams.short_name')
                ->where('teams.user_id',Auth::user()->id)
                ->where('players.team_id',$team_id)
                ->get(); 
        //dd($data);
      return view('view_player',['players'=>$data]);

     }

     




}
