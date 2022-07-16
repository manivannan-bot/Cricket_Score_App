<?php
namespace App\Http\Controllers;
use App\Models\score_card;
use App\Models\matches;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{  
     public function score($match_id){ 

         $players=   DB::table('players')
         ->select(['id', 'name', 'team_id'])
         ->whereIn('team_id', matches::select(['team_id'])
         ->where('id',$match_id))
          ->get();


    $scores = DB::table('score_cards')
        ->join('players', 'score_cards.player_id', '=', 'players.id')
        ->join('matches', 'score_cards.match_id', '=', 'matches.id')
        ->select('score_cards.*','players.team_id','players.name')
        ->where('matches.id',$match_id)
        ->get(); 

return view('create_score_card',['players'=>$players,'match_id'=>$match_id,'scores'=>$scores]);

  }




    public function index(Request $request)
    { 
        
     $this->validate($request,[
      'runs' => 'required|integer|min:0',
      'balls' => 'required|integer|min:0',
      'fours' => 'required|integer|min:0',
      'sixes' => 'required|integer|min:0',
      'overs' => 'required|integer|min:0',
      'maidens' => 'required|integer|min:0',
      'runs_conceded' => 'required|integer|min:0',
      'wickets' => 'required|integer|min:0'
         ]);         
    
         
       $user= new score_card();
       $user->match_id= $request['match_id'];
       $user->player_id= $request['player_id'];
       $player_id=DB::table('score_cards')->where('score_cards.player_id',$request['player_id'])->first();
       $match_id=DB::table('score_cards')->where('score_cards.match_id',$request['match_id'])->first();
       if($player_id===null || $match_id===null)
       {
       $user->runs= $request['runs'];
       $user->balls= $request['balls'];
       $user->fours= $request['fours'];
       $user->sixes= $request['sixes'];
       if((($request['runs']>=0))&&($request['balls']>0)){
       $user->strike_rate= (($request['runs'])/($request['balls'])*100);
       }else{
         return redirect(url('create_score_card/'.$request['match_id']))->with('message','player has 0 balls and has runs');
       }
       $user->dismissed_status= $request['dismissed_status'];
       $user->overs= $request['overs'];
       $user->maidens= $request['maidens'];
       $user->runs_conceded= $request['runs_conceded'];
       $user->wickets= $request['wickets'];

       if((($request['runs_conceded']>=0))&&($request['overs']>0)){
         $user->economy= ($request['runs_conceded'])/($request['overs']);
         }else{
           return redirect(url('create_score_card/'.$request['match_id']))->with('message','player has 0 overs and has runs_conceded');
         }
       

       $user->save();  
       } 
       else{
         return redirect(url('create_score_card/'.$request['match_id']))->with('message','player already added');
       }

       $players=   DB::table('players')
       ->select(['id', 'name', 'team_id'])
       ->whereIn('team_id', matches::select(['team_id'])
      ->where('id',$request['match_id']))
       ->get();
   
       $scores = DB::table('score_cards')
           ->join('players', 'score_cards.player_id', '=', 'players.id')
           ->join('matches', 'score_cards.match_id', '=', 'matches.id')
           ->select('score_cards.*','players.team_id','players.name')
           ->where('matches.id',$request['match_id'])
           ->get(); 
   
        return view('create_score_card',['players'=>$players,'match_id'=>$request['match_id'],'scores'=>$scores])->with('message','score added successfully');
     }


  public function edit($score_id){  
      $data = DB::table('score_cards')
      ->join('players','players.id','=','score_cards.player_id')
      ->select('score_cards.*','players.name')
      ->where('score_cards.id',$score_id)
      ->get(); 

       return view('edit_score_card',array('scores'=>$data));

     }


     public function update(Request $request)
    { 
      $this->validate($request,[
         'runs' => 'required|integer|min:0',
         'balls' => 'required|integer|min:0',
         'fours' => 'required|integer|min:0',
         'sixes' => 'required|integer|min:0',
         'overs' => 'required|integer|min:0',
         'maidens' => 'required|integer|min:0',
         'runs_conceded' => 'required|integer|min:0',
         'wickets' => 'required|integer|min:0'
            ]);         
       
       $user= score_card::find($request['id']);
       $user->match_id= $request['match_id'];
       $user->player_id= $request['player_id'];
       $user->runs= $request['runs'];
       $user->balls= $request['balls'];
       $user->fours= $request['fours'];
       $user->sixes= $request['sixes'];

       if(($request['runs']>=0)&&($request['balls']>0)){
       $user->strike_rate= (($request['runs'])/($request['balls'])*100);}
       else{  return redirect(url('create_score_card/edit/'.$request['id']))->with('message','player has 0 balls and has runs');  }
       $user->dismissed_status= $request['dismissed_status'];
       $user->overs= $request['overs'];
       $user->maidens= $request['maidens'];
       $user->runs_conceded= $request['runs_conceded'];
       $user->wickets= $request['wickets'];
       if(($request['runs_conceded']>=0)&&($request['overs']>0)){
       $user->economy= ($request['runs_conceded'])/($request['overs']);}
       else{return redirect(url('create_score_card/edit/'.$request['id']))->with('message','player has 0 overs and has runs_conceded');}
       $user->save();  
      
       
       $players=   DB::table('players')
       ->select(['id', 'name', 'team_id'])
       ->whereIn('team_id', matches::select(['team_id'])
       ->where('id',$request['match_id']))
       ->get();
   
       $scores = DB::table('score_cards')
           ->join('players', 'score_cards.player_id', '=', 'players.id')
           ->join('matches', 'score_cards.match_id', '=', 'matches.id')
           ->select('score_cards.*','players.team_id','players.name')
           ->where('matches.id',$request['match_id'])
           ->get(); 

        return redirect(url('create_score_card/'.$request['match_id']))->with(['players'=>$players,'match_id'=>$request['match_id'],'scores'=>$scores]);
     }

     public function delete($score_id){  
        DB::delete('delete from score_cards where id= ?',[$score_id]);
     
       return redirect('/home')->with('message','score deleted successfully');
    }

    public function view($match_id){  
      $scores=DB::table('score_cards')
                   ->join('players','score_cards.player_id','=','players.id')
                   ->select('score_cards.*','players.name')
                   ->where('match_id',$match_id)->get();
   
     return view('view_score_card',['scores'=>$scores])->with('message','score deleted successfully');
  }

     
}
