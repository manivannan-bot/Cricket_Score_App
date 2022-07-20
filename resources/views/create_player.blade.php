<!DOCTYPE html>
<html>
    
<style>

*{
  margin:0px;
  padding:0px;
 
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



* input{
 background-color:#f1faee;
 margin-bottom:10px;
 color:black;
 border:none;
border-radius:5px;
padding:8px;

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
  text-align:center;
  justify-content:center;
}

#col{
 width: 100px;
}

#container{
  background-color:#fcd5ce;
  padding:10px;

}

#Submit{
background-color:#1d3557;
padding:7px;
color:white;
}

th{
  height:40px;
}
#Select{
    background-color:#f1faee;
    border-radius:5px;
    padding:8px;
}

button a{
    color:white;
    text-decoration:none;
}

button{
    border-radius:5px;
    border:none;
}

#fname{
  font-size:20px;
}


#table{
width:40%;
}

</style>


<body>

<div id="container">
                  <h2>Create Player Form</h2>
                  {{$errors->first('name')}}
                  
                  <form action="create_player" method="post">
                    @csrf
                    <lable id="fname"> Team Name:</lable><br><br>
                    <select name="team_id" id="Select">
                    @foreach($Teams as $Team)                        
                        <option   value="{{$Team->id}}" >{{$Team->name}}</option>      
                    @endforeach                     
                    </select><div class="alert-danger">{{$errors->first('team_id')}}</div>
                    <br>
                    <br>
                    <label id="fname">Player  Name:</label><br><br>
                    <input type="text" placeholder="Enter player Name" name="name" value="" required><br>
                    <br><div class="alert-danger">{{$errors->first('name')}}</div>
                    <br>
                    <input type="submit" value="Submit" id="Submit">
                  </form> 

                  <br>
                  <br>
                  <lable id="fname"> Teams Table:</lable>
                                      <table id="table">
                                              <tr>
                                                  <th>Id</td>
                                                  <th>Team Name</td>
                                                  <th>short_name</td>
                                                  <th>Count</td>
                                                  <th colspan="2">Actions</td>
                    
                                              </tr>
                                          
                                            
                                              @foreach($Members as $member)
                                              <tr>
                                                  <td>{{$member->id}}</td>
                                                  <td>{{$member->name}}</td>
                                                  <td>{{$member->short_name}}</td>
                                                  <td>{{$member->total}}</td>
                                                <td id="col"><button><a href="view_players/{{{$member->team_id}}}">view players</a></button></td>
                                              @endforeach     
                                              </tr>
                                          
                                      </table>

                  <br>
                  <br>
                  <button id="Submit"><a href="/home" id="Submit"> click here to go home</a></button>


                  @if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif
</div>
</body>
</html>