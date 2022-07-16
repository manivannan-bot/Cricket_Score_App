<!DOCTYPE html>
<html>
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
  <lable>Team Name: {{$member->short_name}}</lable>     
   <br><div class="alert-danger">{{$errors->first('team_id')}}</div>


  <label for="fname">player  Name:</label><br>
  <input type="text"  name="name" value="{{$member->name}}" required><br>
  <div class="alert-danger">{{$errors->first('name')}}</div>
@endforeach


  <br>
  <br>
  <input type="submit" value="Submit">
</form> 


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

</body>
</html>