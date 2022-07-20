<!DOCTYPE html>
<html>
  <style>

*{
  margin:0px;
  padding:0px;
}

#Submit{
background-color:#1d3557;
padding:7px;
border:none;
border-radius:5px;
color:white;
}
body{
    background-color:#fcd5ce;
    padding-left:15px;
}

#tet{
  font-weight:bold;
}
* input{
 background-color:#f1faee;
 margin-bottom:10px;
 color:black;
 border:none;
border-radius:5px;
padding:8px;

}
    </style>
<body>
{{$errors->first('name')}}
<h2>Edit Player Form</h2>

 
<form action="player_update" method="POST">
{{csrf_field()}}
{{method_field('put')}}

  @foreach($Members as $member)
  <input type="hidden"  name="id" value="{{$member->id}}"><br>
  <div class="alert-danger">{{$errors->first('id')}}</div>

  <input type="hidden" name="team_id"   value="{{$member->team_id}}" ></input> 
  <lable id="tet">Team Name: {{$member->short_name}}</lable>     
   <br><div class="alert-danger">{{$errors->first('team_id')}}</div><br>


  <label for="fname" id="tet">Player  Name:</label><br>
  <input type="text"  name="name" value="{{$member->name}}" required><br>
  <div class="alert-danger">{{$errors->first('name')}}</div>
@endforeach


  <br>
  <br>
  <input type="submit" value="Submit" id="Submit">
</form> 


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

</body>
</html>