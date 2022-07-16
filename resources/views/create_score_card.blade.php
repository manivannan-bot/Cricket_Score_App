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


    </style>

  </head>
<body>

  <div class="con2">
  
<form action="create" method="post">
<label class="hed"> Create Players Score Card</label>
  @csrf
  <input type="hidden"  name="match_id" value="{{$match_id}}"><br><br>
 
  <label for="lname">players:</label><br>
  <select name="player_id">
  @foreach($players as $player)
  <option value="{{$player->id}}">{{$player->name}}</option>
  @endforeach
</select>
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

  <label for="lname">Dismissed status:</label><br>
  <select name="dismissed_status">
  <option value="NOT OUT">NOT OUT</option>
  <option value="OUT">OUT</option>
  </select><br>
  
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

  <input type="submit" value="Submit">
</form> 
<br>
<br>
<button><a href="/home"> click here to go home</a></button>
  </div>

<p class="card">SCORE CARD:</p>


<table border="1" class="table">
                <tr> <td>name</td>
                    <td>runs</td>
                    <td>balls</td>
                    <td>fours</td>
                    <td>sixes</td>
                    <td>strike_rate</td>
                    <td>dismissed_status</td>
                    <td>overs</td>
                    <td>maidens</td>
                    <td>runs_conceded</td>
                    <td>wickets</td>
                    <td>economy</td>
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
                    <td><a href="edit/{{{$score->id}}}">edit</a></td>
                    <td><a href="delete/{{{$score->id}}}">delete</a></td>
        
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