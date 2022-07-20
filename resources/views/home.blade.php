
<style>
 .container{
  background-color:#fcd5ce;
  padding-left:10px;
 }



.card-body{
  display:flex;
  padding:20px;
  border-radius:5px;
  
 
}

.card-body button{
  padding:8px;
  border-radius:5px;
  border:none;
  color:white;
  background-color:#1d3557;

}

.con1{
 
  margin-right:100px;
  margin-bottom:20px;
 
}

.con2{
  margin-right:100px; 
   margin-bottom:20px;
} 
 
.con3{
  margin-right:100px; 
  margin-bottom:20px; 
}

#col a{
text-decoration:none;
color:white;
background-color:#1d3557;

}

#col button{

border:none;
padding :5px;
font-size:15px;
color:white;
  background-color:#1d3557;
  border-radius:5px;
}

body{
  background-color:#fcd5ce;
}

tr:nth-child(odd){
  background-color:#e9edc9;
}

tr:nth-child(even){
  background-color:#fefae0;
}

.ndTable{
width:100%;
empty-cells: hide;

}
.ndTable button{

}

.Ftable{
  width:55%;
 
}
tr{
  height:30px;
}

 .Ftable button{
  background-color:red;
} 

#date{
width:100px;
}

.he{
  color:black;
  font-size:18px;
  font-weight:bold;
  padding-bottom:20px;
}

th{
  background-color:#1d3557;
  color:white;
  }


#col{
 
  width:150px;
  padding-left:10px;
 
}

.last{
  text-align:left;
}




</style>
@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center"> 
        <div class="col-md-8">
            <div class="card">
               
                
                <div class="card-body">
                

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- {{ __('You are logged in!') }}  -->
                     
                      <div class="con1">
                    <a href="create_team" > <button> Create Team</button></a>
                    </div>
                    <div class="con2">
                    <a href="create_player"> <button> Create Player</button></a>
                  </div>
                  <div class="con3">
                    <a href="create_match"> <button> Create match</button></a>
</div>
                    
                </div>

                <lable class="he">Teams Table:</lable><br><br>

                <table class="Ftable" >
                 
                <tr>
                    <th>Team Name</th>
                    <th>Team short name</th>
                    <th colspan="2">Actions</td>
                    
                  </tr>
                
                @foreach($Teams as $Team)
                  <tr>
                    <td>{{$Team->name}}</td>
                    <td>{{$Team->short_name}}</td>
                    <td id="col"><button><a href="batting_records/{{$Team->id}}">Batting records</button> </a>
                    <td id="col" class="last"><button><a href="bowling_records/{{$Team->id}}">Bowling records</butto></a>
                  </tr>
                  @endforeach  
                </table>
<br>

<lable class="he">Matches Table:</lable><br><br>
                <table class="ndTable">
                  
                <tr>
                    <th>Team_A</th>
                    <th>Team_B</th>
                    <th>Toss_won_by</th>
                    <th>Elected_to</th>
                    <th id="date">Date</th>
                    <th>Match_name</th>
                    <th>Overs</th>
                    <th>Venue</th>
                    <th>Won By</th>

                    <th colspan="3">Actions</th>
                    
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
                    <td><script>
                     if('{{$Match->won_by}}')
                     document.writeln('{{$Match->won_by}}');
                     else
                     document.writeln("no result");
                    </script></td>
                    
                    <td id="col"><button><a href="create_summary/{{$Match->id}}">Create Summary </butto></a>
                    <td id="col"><button><a href="/create_score_card/{{$Match->id}}">Create Score Card</button> </a>
                    <td id="col" class="last"><button><a href="view_score_card/{{$Match->id}}">View Score Card </butto></a>
                    
                  </tr>
                  @endforeach  
                </table>
                
                <br>
            </div>
        </div>
    </div>
</div>
@endsection
