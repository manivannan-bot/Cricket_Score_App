<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bowling Records</title>

    <style>

table{
    border-collapse: collapse;
    font-family: sans-serif;
   
}

body{
    background-color:#fcd5ce;
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


        #bat{
            border:1px solid rgb(203, 203, 203);
            width: 60%;
            height: 100px;
            text-align: center;
        }


        #ball{
            border:1px solid rgb(203, 203, 203);
            width: 600px;
            height: 100px;
            text-align: center;
        }

        th{
            font-weight: 500;
            height:40px;
        }
        
        #player{

            color:rgb(35, 94, 222);
            width: 200px;
            text-align: left;
            padding-left: 10px;
            
        }

        #frow{
            background-color: rgb(224, 224, 224);
            text-align: left;
            
        }

        #all{
            width: 75px;
            text-align: center;

        }

      
        #lcol{

            width: 100px;
            text-align: right;
            padding-right: 10px;
        }

        tr{
            outline: 1px solid rgb(203, 203, 203);
            height:30px;
        }

        
    </style>


</head>
<body>
<table id="bat">

    <tr id="frow">
        <th>
            <lable>BOWLING RECORDS:</lable>
        </th>
        <th id="all"> OVERS</th>
        <th  id="all"> Maidens</th>
        <th  id="all"> Runs Conceded</th>
        <th  id="all"> Wickets</th>
        <th id="lcol">Economy</th>
        <th id="lcol">Matches</th>
    </tr>
    @foreach($players as $player)
    <tr>
        <td id="player"> {{$player->name}}</td>
        <td>{{$player->tovers}}</td>
        <td>{{$player->tmaidens}}</td>
        <td>{{$player->truns_conceded}}</td>
        <td>{{$player->twickets}}</td>
        <td  id="lcol">{{$player->teconomy}}</td>
        <td  id="lcol">{{$player->tmatches}}</td>
    </tr>
   @endforeach
    

</table>


</body>
</html>