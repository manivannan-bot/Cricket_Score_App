<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>

*{
  margin:0px;
  padding:5px;

}

#container{

  background-color:#fcd5ce;
  padding:5px;

}



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

        body{
            background-color:#fcd5ce;
        }
        th{
            font-weight: 500;
            height:40px;
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

        #con{
            float:left;
            font-weight:px;;
            font-size:20px;
        }
        
        #con2{
            clear:both;
        }

        #con1{
            margin-left:35%;
            font-size:18px;
            width:300px;
        }
    </style>


</head>

                        <body>
            <div id="container">
                        @foreach($matches as $match)
                        <div id="con">
                        <lable>Team A: {{$match->team_a}}<lable><br>
                        <lable>Team B: {{$match->team_b}}<lable><br>
                        <lable>Date: {{$match->date}}<lable><br>
                        <lable>Overs: {{$match->overs}}<lable><br>

                        </div>
                        <div id="con1">
                                <lable>Toss Won By: {{$match->toss_won_by}}<lable><br>
                                <lable>Elected to: {{$match->elected_to}}<lable><br>
                                <lable>Match Name: {{$match->match_name}}<lable><br>
                                <lable>Venue: {{$match->venue}}<lable><br>
                        </div>
                        <div id="con2">
                        @endforeach
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
    </div>  

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
    </div>
                        
   
</table>



</body>
</html>