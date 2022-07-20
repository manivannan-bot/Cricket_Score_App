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

#Sum{

 
  margin-left:300px;
  margin-top:80px;
  font-size:18px;
}


#won{
  font-size:25px;
  text-transform:Uppercase;
  font-weight:bold;
  margin-left:-100px;

}
    </style>



  </head>
<body>


  <div class="con2">
  
<form action="create" method="post">
<label class="hed"> Create Match Summary</label><br>
  @csrf
  <input type="hidden"  name="match_id" value="{{$matches[0]->id}}"><br><br>
 
  <label for="lname">Team A : </label>
  {{$matches[0]->team_a}}
  <br>
  <label for="fname"> Total Runs:</label><br>
  <input type="number" placeholder="Enter Runs" name="runs_a" value="" required id="runs"><br>
  <div class="alert-danger">{{$errors->first('runs_a')}}</div>
  <label for="lname">Wickets:</label><br>
  <input type="number" placeholder="Enter Wickets" name="wickets_a" value="" required><br><br>
  <div class="alert-danger">{{$errors->first('wickets_a')}}</div>

  <label for="lname">Overs:</label><br>
  <input type="number" placeholder="Enter Overs" name="overs_a" value="" required><br><br>
  <div class="alert-danger">{{$errors->first('overs_a')}}</div>

  <label for="lname">Extras:</label><br>
  <input type="number" placeholder="Enter Extras" name="extras_a" value="" required><br>
  <div class="alert-danger">{{$errors->first('extras_a')}}</div>

  <label for="lname">Team B:  </label>
  <label for="lname">{{$matches[0]->team_b}}</label><br><br>
  
  
  <label for="lname">Total Runs:</label><br>
  <input type="number" placeholder="Enter Runs" name="runs_b" value="" required><br><br>
  <div class="alert-danger">{{$errors->first('runs_b')}}</div>

  <label for="lname">Wickets:</label><br>
  <input type="number" placeholder="Enter Wickets" name="wickets_b" value="" required><br><br>
  <div class="alert-danger">{{$errors->first('wickets_b')}}</div>

  <label for="lname">Overs:</label><br>
  <input type="number" placeholder="Enter Overs" name="overs_b" value="" required><br><br>
  <div class="alert-danger">{{$errors->first('overs_b')}}</div>

  <label for="lname">Extras:</label><br>
  <input type="number" placeholder="Enter Extras" name="extras_b" value="" required><br><br>
  <div class="alert-danger">{{$errors->first('extras_b')}}</div>
  

  <input type="hidden"  name="won_by" value="{{$matches[0]->id}}"><br><br>

  <input type="submit" value="Submit" id="Submit">
</form> 
<br>
<br>
</div>
<div id="back">
<button  id="Submit" ><a href="/home" id="Submit"> click here to go home</a></button>
</div>


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div id="Sum">
  @foreach($wonby as $won)
  <label for="fname">  Team A Total Runs:</label>
   {{$won->runs_a}}<br>
  <label for="lname">Wickets:</label>
  {{$won->wickets_a}}<br>
  <label for="lname">Overs:</label>
  {{$won->overs_a}}<br>
  <label for="lname">Extras:</label>
  {{$won->extras_a}}<br><br>
  <label for="lname">Team B Total Runs:</label>
  {{$won->runs_b}}<br>
  <label for="lname">Wickets:</label>
  {{$won->wickets_b}}<br>
  <label for="lname">Overs:</label>
  {{$won->overs_b}}<br>
  <label for="lname">Extras:</label>
  {{$won->extras_b}}<br><br>
  <label for="lname" id="won">WON BY:</label>
  {{$won->won_by}}<br>
  
  @endforeach
</div>

</body>

</html>