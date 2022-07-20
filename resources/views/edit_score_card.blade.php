<!DOCTYPE html>
<html>
    <title> </title>
    <style>
body{
    background-color:#fcd5ce;
}


#container{
  background-color:#fcd5ce;
  padding:10px;


}
* input{
 background-color:#f1faee;
 margin-bottom:10px;
 color:black;
 border:none;
border-radius:5px;
padding:8px;

}


#Submit{
background-color:#1d3557;
padding:7px;
border:none;
border-radius:5px;
color:white;
}

.hed{
    font-size:20px;
    font-weight:bold;
}

    </style>

<body>
    <div id="container">

                        {{$errors->first('name')}}
                        <form action="update" method="post">
                        <label class="hed">Edit Players Score Card</label>
                        @csrf
                        @foreach($scores as $score)
                        <input type="hidden"  name="id" value="{{$score->id}}">
                        <input type="hidden"  name="match_id" value="{{$score->match_id}}">
                        <input type="hidden"  name="player_id" value="{{$score->player_id}}"><br><br>

                        <label for="lname">Player Name:</label><br>
                        <input type="text"  name="name" value="{{$score->name}}" required><br><br>

                        <label for="fname">Runs:</label><br>
                        <input type="number" placeholder="Enter runs" name="runs" value="{{$score->runs}}" required><br>
                        <div class="alert-danger">{{$errors->first('runs')}}</div>

                        <label for="lname">Balls:</label><br>
                        <input type="number" placeholder="Enter balls" name="balls" value="{{$score->balls}}" required><br><br>
                        <div class="alert-danger">{{$errors->first('balls')}}</div>

                        <label for="lname">Fours:</label><br>
                        <input type="number" placeholder="Enter fours" name="fours" value="{{$score->fours}}" required><br><br>
                        <div class="alert-danger">{{$errors->first('fours')}}</div>

                        <label for="lname">Sixes:</label><br>
                        <input type="number" placeholder="Enter sixes" name="sixes" value="{{$score->sixes}}" required><br>
                        <div class="alert-danger">{{$errors->first('sixes')}}</div>

                        <label for="lname">Dismissed status:</label><br>
                        <select name="dismissed_status">
                        <option value="NOT OUT">NOT OUT</option>
                        <option value="OUT">OUT</option>
                        </select><br>
                        
                        <label for="lname">Overs:</label><br>
                        <input type="number" placeholder="Enter overs" name="overs" value="{{$score->overs}}" required><br><br>
                        <div class="alert-danger">{{$errors->first('overs')}}</div>

                        <label for="lname">Maidens:</label><br>
                        <input type="number" placeholder="Enter maidens" name="maidens" value="{{$score->maidens}}" required><br><br>
                        <div class="alert-danger">{{$errors->first('maidens')}}</div>

                        <label for="lname">Runs_conceded:</label><br>
                        <input type="number" placeholder="Enter runs conceded" name="runs_conceded" value="{{$score->runs_conceded}}" required><br><br>
                        <div class="alert-danger">{{$errors->first('runs_conceded')}}</div>

                        <label for="lname">Wickets:</label><br>
                        <input type="number" placeholder="Enter wickets" name="wickets" value="{{$score->wickets}}" required><br><br>
                        <div class="alert-danger">{{$errors->first('wickets')}}</div>


                        <input type="submit" value="Submit" id="Submit">
                        @endforeach
                        </form>


                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
</div>
</body>
</html>