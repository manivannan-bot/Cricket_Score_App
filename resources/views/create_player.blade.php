<!DOCTYPE html>
<html>
<body>

<h2>Create Player Form</h2>
{{$errors->first('name')}}
 
<form action="create_player" method="post">
  @csrf
  <lable> Team Name:</lable><br>
  <select name="team_id">
   @foreach($Teams as $Team)                        
      <option   value="{{$Team->id}}" >{{$Team->name}}</option>      
   @endforeach                     
   </select><div class="alert-danger">{{$errors->first('team_id')}}</div>
   <br>
   <br>
  <label for="fname">player  Name:</label><br>
  <input type="text" placeholder="Enter player Name" name="name" value="" required><br>
  <br><div class="alert-danger">{{$errors->first('name')}}</div>
  <br>
  <input type="submit" value="Submit">
</form> 

<br>
<br>
<lable> Teams Table:</lable>
                    <table border="1">
                            <tr>
                                <td>id</td>
                                <td>Team Name</td>
                                <td>short_name</td>
                                <td>Count</td>
                            </tr>
                        
                           
                            @foreach($Members as $member)
                            <tr>
                                <td>{{$member->id}}</td>
                                <td>{{$member->name}}</td>
                                <td>{{$member->short_name}}</td>
                                <td>{{$member->total}}</td>
                               <td> <a href="view_players/{{{$member->team_id}}}">view players</a></td>
                            @endforeach     
                            </tr>
                        
                    </table>

<br>
<br>
<button><a href="/home"> click here to go home</a></button>


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
</body>
</html>