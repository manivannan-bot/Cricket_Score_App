
<style>
/* 
 *{
  margin:0px;
  padding:0px;

}

.container{
  display:flex;

} 

 .card-header{

  width:100%;
  height:100px;
  background-color:blue;
}  */







</style>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                
                <div class="card-body">
                

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} 
                      <br>
                      <br>
                    <a href="create_team"> <button>Step 1: Create Team</button></a><br><br>
                     
                    <a href="create_player"> <button>Step 2:Create Player</button></a><br><br>

                    <a href="create_match"> <button>Stem 3:Create match</button></a><br><br>

                    
                    <br>
                    <br>
                    
                </div>
                <table border="1">
                  <lable>Matches Table:</lable>
                <tr>
                    <td>team_a</td>
                    <td>team_b</td>
                    <td>toss_won_by</td>
                    <td>elected_to</td>
                    <td>date</td>
                    <td>match_name</td>
                    <td>overs</td>
                    <td>venue</td>
                  </tr>
                
                @foreach($Matches as $Match)
                  <tr>
                    <td>{{$Match->team_a}}</td>
                    <td>{{$Match->team_b}}</td>
                    <td>{{$Match->toss_won_by}}</td>
                    <td>{{$Match->elected_to}}</td>
                    <td>{{$Match->date}}</td>
                    <td>{{$Match->match_name}}</td>
                    <td>{{$Match->overs}}</td>
                    <td>{{$Match->venue}}</td>
                    <td><button><a href="/create_score_card/{{$Match->id}}">Create Score Card</button> </a>
                    <td><button><a href="view_score_card/{{$Match->id}}">View Score Card </butto></a>
                  </tr>
                  @endforeach  
                </table>
                
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
