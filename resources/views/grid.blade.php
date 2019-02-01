<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="/js/grid.js"></script>

        <!-- Styles -->
        <style>
            @import url('//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }


            .gridtable{
                border-collapse: collapse;



            }
            th{
                height: 140px;
                width: 50px;

            }

            .errorMsg{
                color: #D8000C;
                background-color: #FFD2D2;
                margin:10px 22px;
                font-size:2em;
                vertical-align:middle;
                visibility: hidden;
            }
        </style>
    </head>
    <body>



        <div class="links">
            <a href="/grid/{{$id}}/edit">Edit Grid</a>
            <a href="/">Home</a>
            <a href="https://laracasts.com">Nouvelle grille</a>

        </div>
        <div class="errorMsg">
           <i class="fa fa-times-circle"></i>
           Erreur ! Nombre de points incorrectes
        </div>
        <div>
            <table id="gridtable" class="gridtable table table-sm table-bordered" >

                    <tr>
                        <th>Grille d'évaluation</th>
                        <th>Au 1/10</th>
                        <th>Finale</th>
                        <th>Total des points</th>
                    @foreach($criterion as $ckey => $criteria)

                            <th class="header" id='criteria-{{$ckey}}'>{{$criteria['description']}}</th>

                    @endforeach

                    </tr>
                    <tr style="font-weight:bold">
                        <td>Maximum</td>
                        <td>6</td><td>6</td><td>{{$maxPoint}}</td>
                        @foreach($criterion as $ckey => $criteria)

                                <td id='criteria-{{$ckey}}'>{{$criteria['maxPoint']}}</td>

                        @endforeach
                    </tr>
                @foreach($students as $skey => $student)

                        <tr>
                                <td style="font-weight:bold" id='student-{{$skey}}'>{{$student}}</td>
                                <td>{{$noteDixieme[$skey]}}</td>
                                <td>{{$noteFinale[$skey]}}</td>
                                <td>{{$totalPoints[$skey]}}</td>
                            @foreach($criterion as $ckey => $criteria)

                                    <td  id="point" data-sid={{$skey}} data-cid={{$ckey}} data-mpts={{$criteria['maxPoint']}}>{{$points[$skey][$ckey]}}</td>

                            @endforeach


                        </tr>

                @endforeach
            </table>
        </div>
            <h3> Modifier Points</h3>
        <div>
            <p>Élève</p>

            <form method="post" action="{{$id}}/update" id="updateForm">
                @csrf
                <div id="student" >?</div>
                <input type="hidden" id="sid" name="sid">

                <p>Critère</p>
                <b><div id="criteria">?</div></b>
                <input type="hidden" id="cid" name="cid">
                <input type="hidden" id="mpts" name="mpts">
                <input type="text" name="pts" id="pts">
                <input class="btn btn-primary" type="submit" name="update">
            </form>
        </div>
    </body>
</html>
