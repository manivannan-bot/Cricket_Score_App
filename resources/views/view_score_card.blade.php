<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

table{
    border-collapse: collapse;
    font-family: sans-serif;
}

        #bat{
            border:1px solid rgb(203, 203, 203);
            width: 600px;
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
            <lable>BATTERS</lable>
        </th>
        <th id="all"> R</th>
        <th  id="all"> B</th>
        <th  id="all"> 4s</th>
        <th  id="all"> 6s</th>
        <th id="lcol">SR</th>
    </tr>
    @foreach($scores as $score)
    <tr>
        <td id="player"> {{$score->name}}</td>
        <td>{{$score->runs}}</td>
        <td>{{$score->balls}}</td>
        <td>{{$score->fours}}</td>
        <td>{{$score->sixes}}</td>
        <td  id="lcol">{{$score->strike_rate}}</td>
    </tr>
   @endforeach
    

</table>
<table id="ball">

    <tr id="frow">
        <th>
            <lable>BOWLERS</lable>
        </th>
        <th id="all"> O</th>
        <th id="all"> M</th>
        <th id="all"> R</th>
        <th id="all"> W</th>
        <th id="lcol">ECON</th>
    </tr>
    @foreach($scores as $score)
    <tr>
        <td id="player"> {{$score->name}}  </td>
        <td>{{$score->overs}}</td>
        <td>{{$score->maidens}}</td>
        <td>{{$score->runs_conceded}}</td>
        <td>{{$score->wickets}}</td>
        <td  id="lcol">{{$score->economy}}</td>
    </tr>
@endforeach
   
   
</table>


</body>
</html>