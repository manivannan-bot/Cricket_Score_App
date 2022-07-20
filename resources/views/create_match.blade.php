<!DOCTYPE html>
<html>

<style>

*{
  margin:0px;
  padding:0px;
 
}

#container{
  background-color:#fcd5ce;
  padding:10px;


}
body{
    background-color:#fcd5ce;
  }

* input{
 background-color:#f1faee;
 margin-bottom:10px;
 color: black;
 border:none;
border-radius:5px;
padding:8px;

}


  #select{
    background-color:#f1faee;
    border-radius:5px;
    padding:5px;
}

#Submit{
background-color:#1d3557;
padding:7px;
border:none;
border-radius:5px;
color:white;
}

button a{
    color:white;
    text-decoration:none;
}
.submit{
  
position:absolute;
top:10px;
right:10px;
}


</style>
<body>
  <div id="container">
                  <h2 >Create Match Form</h2><br>

                  <form action="/create_match" method="post">
                    @csrf

                    <label for="fname">Team A Name:</label><br>

                    <select name="team_id" id="select">
                    @foreach($teams as $team)
                    <option    value="{{$team->id}}">{{$team->name}}</option>

                    @endforeach
                  </select><div class="alert-danger">{{$errors->first('team_id')}}</div>
                    
                    <br>
                    <label for="lname">Team B Name:</label><br>
                    <input type="text"  name="team_b" value="Away" required><br><br>

                    <label for="lname">Toss won by:</label><br>
                    <select name="toss_won_by" id="select">
                    <option    value="team_a"> Team A</option>
                    <option    value="Away"> Away</option>
                    </select><br><br>

                    <label for="lname">Elected to:</label><br>
                    <select  name="elected_to" id="select">
                    <option   value="BAT">BAT </option>
                    <option   value="BOWL">BOWL </option>
                  </select><br><br>
                    <label for="lname">Date:</label><br>
                    <input type="date"  name="date" value="" required><br><br>
                    <div class="alert-danger">{{$errors->first('date')}}</div>

                    <label for="lname">Match Name:</label><br>
                    <input type="text"  placeholder="Enter match Name" name="match_name" value="" required><br><br>

                    <label for="lname">Overs:</label><br>
                    <input type="number" id="lname" name="overs" value="15" required><br><br>
                    <div class="alert-danger">{{$errors->first('overs')}}</div>

                    <label for="lname">Venue:</label><br>
                    <input type="text" placeholder="Enter Venue" name="venue" value="" required><br><br>

                    <input type="submit" value="Submit" id="Submit">
                  </form> 
                  <br>
                  
                  
                  <p>If you click the "Submit" button and if success you will be redirect to dashboard.</p>


                  @if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif
             

</div>    
<div class="submit">
                  <button id="Submit"><a href="/home"  id="Submit" > click here to go home</a></button>
                  <br><br>
</div>
</body>          
</html>