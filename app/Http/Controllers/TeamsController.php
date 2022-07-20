<?php

namespace App\Http\Controllers;
use App\Models\teams;
use App\Models\score_cards;
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
       
      return view('view_player',['players'=>$data]);
     }
    


     public function batting_records($team_id){
  
      $data = DB::table('players as p')
              ->select('p.id','p.name','p.team_id',
              DB::raw('(select sum(runs) from score_cards where score_cards.player_id=p.id) as truns'),
              DB::raw('(select sum(balls) from score_cards where score_cards.player_id=p.id) as tballs'),
              DB::raw('(select sum(fours) from score_cards where score_cards.player_id=p.id) as tfours'),
              DB::raw('(select sum(sixes) from score_cards where score_cards.player_id=p.id) as tsixes'),
              DB::raw('(select round(avg(strike_rate),2) from score_cards where score_cards.player_id=p.id) as tstrike_rate'),
              DB::raw('(select count(match_id) from score_cards where score_cards.player_id=p.id) as tmatches'),
              DB::raw('(select count(dismissed_status) from score_cards where score_cards.player_id=p.id and dismissed_status="OUT") as tout'),
              DB::raw('(select count(dismissed_status) from score_cards where score_cards.player_id=p.id and dismissed_status="NOT OUT") as tnotout'),
              )
              ->where('p.team_id','=',$team_id)
              ->get();
        //dd($data);
      return view('records.batting_records',['players'=>$data]);
     }



     public function bowling_records($team_id){
  
      $data = DB::table('players as p')
              ->select('p.id','p.name','p.team_id',
              DB::raw('(select sum(overs) from score_cards where score_cards.player_id=p.id) as tovers'),
              DB::raw('(select sum(maidens) from score_cards where score_cards.player_id=p.id) as tmaidens'),
              DB::raw('(select sum(runs_conceded) from score_cards where score_cards.player_id=p.id) as truns_conceded'),
              DB::raw('(select sum(wickets) from score_cards where score_cards.player_id=p.id) as twickets'),
              DB::raw('(select avg(economy) from score_cards where score_cards.player_id=p.id) as teconomy'),
              DB::raw('(select count(match_id) from score_cards where score_cards.player_id=p.id) as tmatches'),
              
              )
              ->where('p.team_id','=',$team_id)
              ->get();

      return view('records.bowling_records',['players'=>$data]);
     }

}
