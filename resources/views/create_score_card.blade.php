<!DOCTYPE html>
<html>
  <head>
    <style>
    .table{align:right;
      position:absolute;
      left:300px;
      top:100px;

    }

    body{
    background-color:#fcd5ce;
    padding-left:15px;
}

* input{
 background-color:#f1faee;
 margin-bottom:10px;
 color:black;
 border:none;
border-radius:5px;
padding:8px;

}

th{
  background-color:#1d3557;
  color:white;
  }

 tr:nth-child(odd)
 {
  background-color:#e9edc9;
}

tr:nth-child(even){
  background-color:#fefae0;
  z-index:10px;
}


    body{
      display:flex;
      position: relative;
   
    }

    .card{
      margin-left: 150px;
      margin-top: 50px;
    }

    
    .con2{
      text-align:left;
      margin:15x;
 

    }
    
    .hed{
      font-weight:bold;
      font-size:18px;
    }

    #col button{

border:none;
padding :5px;
font-size:15px;
color:white;
  background-color:#1d3557;
  border-radius:5px;
}

#col a{
text-decoration:none;
color:white;
background-color:#1d3557;

}
#Submit{
background-color:#1d3557;
padding:7px;
border:none;
border-radius:5px;
color:white;
}

button a{
  text-decoration:none;
}


#Select{
    background-color:#f1faee;
    border-radius:5px;
    padding:3px;

}

#back{
  position:absolute;
  right:0px;
  top:10px;
}
th{
  height:40px;
}
.hed{
  font-size:20px;
  font-weight:bold;
}
.card{
  font-size:20px;
  font-weight:bold;
}


    </style>

  </head>
<body>

  <div class="con2">
  
<form action="create" method="post">
<label class="hed"> Create Players Score Card</label><br>
  @csrf
  <input type="hidden"  name="match_id" value="{{$match_id}}"><br><br>
 
  <label for="lname">Players:</label><br>
  <select name="player_id" id="Select">
  @foreach($players as $player)
  <option value="{{$player->id}}">{{$player->name}}</option>
  @endforeach
</select><br>
  <br>
  <label for="fname">Runs:</label><br>
  <input type="number" placeholder="Enter runs" name="runs" value="" required><br>
  <div class="alert-danger">{{$errors->first('runs')}}</div>
  <label for="lname">Balls:</label><br>
  <input type="number" placeholder="Enter balls" name="balls" value="" required><br><br>
  <div class="alert-danger">{{$errors->first('balls')}}</div>

  <label for="lname">Fours:</label><br>
  <input type="number" placeholder="Enter fours" name="fours" value="" required><br><br>
  <div class="alert-danger">{{$errors->first('fours')}}</div>

  <label for="lname">Sixes:</label><br>
  <input type="number" placeholder="Enter sixes" name="sixes" value="" required><br>
  <div class="alert-danger">{{$errors->first('sixes')}}</div>

  <label for="lname">Dismissed status:</label><br><br>
  <select name="dismissed_status" id="Select">
  <option value="NOT OUT">NOT OUT</option>
  <option value="OUT">OUT</option>
  </select><br><br>
  
  <label for="lname">Overs:</label><br>
  <input type="number" placeholder="Enter overs" name="overs" value="" required><br><br>
  <div class="alert-danger">{{$errors->first('overs')}}</div>

  <label for="lname">Maidens:</label><br>
  <input type="number" placeholder="Enter maidens" name="maidens" value="0" required><br><br>
  <div class="alert-danger">{{$errors->first('maidens')}}</div>

  <label for="lname">Runs_conceded:</label><br>
  <input type="number" placeholder="Enter runs conceded" name="runs_conceded" value="" required><br><br>
  <div class="alert-danger">{{$errors->first('runs_conceded')}}</div>

  <label for="lname">Wickets:</label><br>
  <input type="number" placeholder="Enter wickets" name="wickets" value="" required><br><br>
  <div class="alert-danger">{{$errors->first('wickets')}}</div>

  <input type="submit" value="Submit" id="Submit">
</form> 
<br>
<br>
</div>
<div id="back">
<button  id="Submit" ><a href="/home" id="Submit"> click here to go home</a></button>
</div>

<p class="card">SCORE CARD:</p>


<table class="table">
                <tr> <th>Name</th>
                    <th>Runs</th>
                    <th>Balls</th>
                    <th>Fours</th>
                    <th>Sixes</th>
                    <th>Strike_rate</th>
                    <th>Dismissed_status</th>
                    <th>Overs</th>
                    <th>Maidens</td>
                    <th>Runs_conceded</th>
                    <th>Wickets</th>
                    <th>Economy</th>
                    <th colspan="2">Actions</th>
                  </tr>
                 
                  <tr>
                  @foreach($scores as $score)
                    <td>{{$score->name}}</td>
                    <td>{{$score->runs}}</td>
                    <td>{{$score->balls}}</td>
                    <td>{{$score->fours}}</td>
                    <td>{{$score->sixes}}</td>
                    <td>{{$score->strike_rate}}</td>
                    <td>{{$score->dismissed_status}}</td>
                    <td>{{$score->overs}}</td>
                    <td>{{$score->maidens}}</td>
                    <td>{{$score->runs_conceded}}</td>
                    <td>{{$score->wickets}}</td>
                    <td>{{$score->economy}}</td>
                    <td id="col"><button><a href="edit/{{{$score->id}}}">edit</a></button></td>
                    <td id="col"><button><a href="delete/{{{$score->id}}}">delete</a></button></td>
        
                     </tr>
                     @endforeach
                    
                </table>
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

</body>

</html>