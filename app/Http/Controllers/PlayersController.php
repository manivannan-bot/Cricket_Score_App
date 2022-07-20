<?php

namespace App\Http\Controllers;
use App\Models\players;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PlayersController extends Controller
{
    public function index(Request $request)
    {
     $this->validate($request,[
      'team_id'=> 'required',
      'name'=> 'required',
         ]);         
    
       $user= new players();
       $user->team_id= $request['team_id'];
       $user->name= $request['name'];
      
       $user->save();   

         
      return redirect('/create_player')->with('message','success player added successfully');
     }


     
     public function edit($id){  
      $data = DB::table('teams')
      ->join('players', 'teams.id', '=', 'players.team_id')
      ->select('teams.id','teams.name','teams.short_name','players.team_id','players.id','players.name')
      ->where('teams.user_id',Auth::user()->id)
      ->where('players.id',$id)
      ->get(); 
//dd($data);
return view('edit_player',array('Members'=>$data));

    }

    public function update(Request $request)
    { 
     $this->validate($request,[
      'id'=> 'required',
      'team_id'=> 'required',
      'name'=> 'required',
         ]);         
    
       $user= players::find($request['id']);
       $user->team_id= $request['team_id'];
       $user->name= $request['name'];
      
       $user->save();   

         
      return redirect('create_player')->with('message','success player updated successfully');
     }

     public function delete($id){
      $players=players::withCount('team_id')->findOrFail($id); 
      if( $players->delete())
      {
        return redirect('create_player')->with('message','success player deleted successfully');
      }
      else{
        return redirect('create_player')->with('message','cannot delete player');
      }
      return redirect('create_player')->with('message','success player deleted successfully');
     }
}
