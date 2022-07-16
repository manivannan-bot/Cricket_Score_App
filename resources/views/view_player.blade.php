<!DOCTYPE html>
<html>
<body>
{{$errors->first('name')}}
<h3>Players List</h3>
<br>
<br>
<lable> players Table:</lable>
                    <table border="1">
                            <tr>
                                <td>id</td>
                                <td>Name</td>
                                <td>options</td>
                                
                            </tr>
                        
                            
                            @foreach($players as $player)
                            <tr>
                                <td>{{$player->id}}</td>
                                <td>{{$player->name}}</td>
                                <td><a href='player_edit/{{{$player->id}}}'>edit</a></td>
                                <td><a href='player_delete/{{{$player->id}}}'>delete</a></td>

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