<!DOCTYPE html>
<html>
<body>
{{$errors->first('name')}}
<h2>Create Team Form</h2>

<form action="/create_team" method="post">
  @csrf
  <label for="fname">Team Name:</label><br>
  <input type="text" placeholder="Enter team Name" name="name" value="" required><br>

  <label for="lname">Team Short name:</label><br>
  <input type="text" placeholder="Enter team short Name" name="short_name" value="" required><br><br>

  <input type="hidden"  name="status" value="A"><br><br>

  
  <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button and if success you will be redirect to dashboard.</p>


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
</body>
</html>