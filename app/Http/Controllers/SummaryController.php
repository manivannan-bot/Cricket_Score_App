<?php

namespace App\Http\Controllers;
use App\Models\summary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SummaryController extends Controller
{
    public function index($match_id)
    { 
        $user = Auth::user();
        $matches=DB::table('matches')
                ->select('matches.*')
                ->where('matches.user_id',Auth::user()->id)
                ->where('matches.id',$match_id)
                ->get();

        $wonby=DB::table('summaries')
                ->select('summaries.*')
                ->where('summaries.match_id',$match_id)
                ->get();
        
        return view('records.create_summary',array('matches'=>$matches,'wonby'=>$wonby));
        
    }
    
    public function create(Request $request){
    $this->validate($request,[
        'runs_a' => 'required|integer|min:0',
        'wickets_a' => 'required|integer|min:0',
        'overs_a' => 'required|integer|min:0',
        'extras_a' => 'required|integer|min:0',
        'runs_b' => 'required|integer|min:0',
        'wickets_b' => 'required|integer|min:0',
        'overs_b' => 'required|integer|min:0',
        'extras_b' => 'required|integer|min:0',
        
           ]); 

           if(($request['runs_a'])>$request['runs_b']){
            $won=DB::table('matches')->select('team_a','team_b')->where('id',$request['match_id'])->get();
            $request['won_by']= $won[0]->team_a;
           }else if($request['runs_a']==$request['runs_b']){
               $request['won_by']="draw";
           }
            else{
               $won=DB::table('matches')->select('team_a','team_b')->where('id',$request['match_id'])->get();
               $request['won_by']= $won[0]->team_b;
                }
    

        $match_id=DB::table('summaries')->where('summaries.match_id',$request['match_id'])->first();
       
         if($match_id===null){
                $user= new summary();
                $user->match_id= $request['match_id'];
                $user->runs_a= $request['runs_a'];
                $user->wickets_a= $request['wickets_a'];
                $user->overs_a= $request['overs_a'];
                $user->extras_a= $request['extras_a'];
                $user->runs_b= $request['runs_b'];
                $user->wickets_b= $request['wickets_b'];
                $user->overs_b= $request['overs_b'];
                $user->extras_b= $request['extras_b'];
                $user->won_by= $request['won_by'];
                
                $user->save();  
         }else{
            $user=summary::find($match_id->id);
            $user->match_id= $request['match_id'];
            $user->runs_a= $request['runs_a'];
            $user->wickets_a= $request['wickets_a'];
            $user->overs_a= $request['overs_a'];
            $user->extras_a= $request['extras_a'];
            $user->runs_b= $request['runs_b'];
            $user->wickets_b= $request['wickets_b'];
            $user->overs_b= $request['overs_b'];
            $user->extras_b= $request['extras_b'];
            $user->won_by= $request['won_by'];
            
            $user->save();   
         }

         return redirect(url('create_summary/'.$request['match_id']));
         
        }
}
