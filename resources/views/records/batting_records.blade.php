<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batting Records</title>

    <style>
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

table{
    border-collapse: collapse;
    font-family: sans-serif;
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
    <div id="container">
                                            <table id="bat">

                                                <tr id="frow">
                                                    <th>
                                                        <lable>BATTING RECORDS:</lable>
                                                    </th>
                                                    <th id="all"> R</th>
                                                    <th  id="all"> B</th>
                                                    <th  id="all"> 4s</th>
                                                    <th  id="all"> 6s</th>
                                                    <th id="lcol">SR</th>
                                                    <th id="lcol">Batting Avg</th>

                                                    <th id="lcol">Matches</th>
                                                    <th id="lcol">NOT OUT</th>
                                                    
                                                </tr>
                                                @foreach($players as $player)
                                                <tr>
                                            
                                                    <td id="player"> {{$player->name}}</td>
                                                    <td>{{$player->truns}}</td>
                                                    <td>{{$player->tballs}}</td>
                                                    <td>{{$player->tfours}}</td>
                                                    <td>{{$player->tsixes}}</td>
                                                    <td  id="lcol">{{$player->tstrike_rate}}</td>
                                                    
                                                    <td  id="lcol"> <script> var i=({{$player->truns}}/{{$player->tout}});
                                            if({{$player->tout}}==0)
                                            document.writeln({{$player->truns}});
                                            else
                                            document.writeln(i);</script> </td>
                                                        
                                                    <td  id="lcol">{{$player->tmatches}}</td>
                                                    <td  id="lcol">{{$player->tnotout}}</td>
                                                </tr>
                                            @endforeach
                                                

                                            </table>

    </div>
</body>
</html>