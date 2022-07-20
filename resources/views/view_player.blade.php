<!DOCTYPE html>
<html>


<style>

*{
  margin:0px;
  padding:5px;

}

#container{

  background-color:#fcd5ce;
  padding:5px;

}

* input{
 background-color:#1d3557;
 margin-bottom:10px;
 color:white;
 border:none;
border-radius:5px;

}

tr:nth-child(odd)
 {
  background-color:#e9edc9;
}

tr:nth-child(even){
  background-color:#fefae0;
  z-index:10px;
}


#Submit{
background-color:#1d3557;
padding:7px;
border:none;
border-radius:5px;
color:white;
outline:none;
}

button a{
    color:white;
    text-decoration:none;
}

th{
  background-color:#1d3557;
  color:white;
  }

  body{
    background-color:#fcd5ce;
  }

  #col button{

border:none;
padding :5px;
font-size:15px;
color:white;
  background-color:#1d3557;
  border-radius:5px;
}

#col{

}

#name{
  font-size:20px;
  font-weight:bold;
}
</style>


<body>

<div id="container">
                    {{$errors->first('name')}}
                    <h3>Players List</h3>
                    <br>
                    <br>
                    <lable id="name"> Players Table:</lable>
                                        <table >
                                                <tr>
                                                    <th>Id</td>
                                                    <th>Name</td>
                                                    <th colspan="2">Actions</td>
                                                    
                                                </tr>
                                            
                                                
                                                @foreach($players as $player)
                                                <tr>
                                                    <td>{{$player->id}}</td>
                                                    <td>{{$player->name}}</td>
                                                    <td id="col"><button><a href='player_edit/{{{$player->id}}}'>edit</a></button></td>
                                                    <!-- <td id="col"><button><a href='player_delete/{{{$player->id}}}'>delete</a></button></td> -->

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