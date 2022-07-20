<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\matches;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatchController extends Controller
{
    public function index(Request $request)
    {


        $this->validate($request,[
            'team_id'=> 'required',
           'date'=> 'required',
           'overs' => 'required|integer|min:0',
           'elected_to'=> 'required',
            ]);         
        
        $user= new matches();
        $user->user_id= auth()->user()->id;
        $user->team_id= $request['team_id'];
        $team_a=DB::table('teams')->select('teams.name')->where('teams.id',$request['team_id'])->get();
        $user->team_a= $team_a[0]->name;
        $user->team_b= $request['team_b'];
        if($request['toss_won_by']=='team_a'){
            $user->toss_won_by= $team_a[0]->name;
        }
        else{
        $user->toss_won_by= $request['toss_won_by'];
        }
        $user->elected_to= $request['elected_to'];
        $user->date= $request['date'];
        $user->match_name= $request['match_name'];
        $user->overs= $request['overs'];
        $user->venue= $request['venue'];
       
    
        $user->save();   

            
       return redirect('/home')->with('message','success match added successfully');
    }
     
    public function show_team(){
       
        $teams = DB::table('teams')
                  ->select('teams.id','teams.name')
                  ->where('teams.user_id',Auth::user()->id)
                  ->get(); 
       
        return view('create_match',array('teams'=>$teams));
  
       }
    
}
