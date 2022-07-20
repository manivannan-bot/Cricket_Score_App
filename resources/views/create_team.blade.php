<!DOCTYPE html>
<html>


<style>

*{
  margin:0px;
  padding:5px;
  background-color:#fcd5ce;
}

* input{
 background-color:#f1faee;
 margin-bottom:10px;
 color:black;
 border:none;
border-radius:5px;

}

#Submit{
background-color:#1d3557;
padding:7px;
color:white;
}

*::-ms-input-placeholder{
 color:red;
}

#fname{
  font-size:20px;
}

  </style>
<body>
{{$errors->first('name')}}
<h2>Create Team Form</h2>

<form action="/create_team" method="post"><br>
  @csrf
  <label id="fname">Team Name:</label><br><br>
  <input type="text" placeholder="Enter team Name" name="name" value="" required><br>

  <label id="fname">Team Short name:</label><br><br>
  <input type="text" placeholder="Enter team short Name" name="short_name" value="" required><br><br>

  <input type="hidden"  name="status" value="A"><br><br>

  
  <input type="submit" value="Submit" id="Submit">
</form> 

<p>If you click the "Submit" button and if success you will be redirect to dashboard.</p>


@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
</body>
</html>