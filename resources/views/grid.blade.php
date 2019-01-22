<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="/js/grid.js"></script>

        <!-- Styles -->
        <style>
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
        </style>
    </head>
    <body>



        <div class="links">
            <a href="/">Home</a>
            <a href="https://laracasts.com">Nouvelle grille</a>

        </div>
        <div>
            <table id="gridtable" class="gridtable table table-sm table-bordered" >

                    <tr>
                        <th>Grille d'évaluation</th>
                        <th>Au 1/10</th>
                        <th>Finale</th>
                        <th>Total des points</th>
                    @foreach($criterium as $ckey => $criteria)

                            <th class="header" id="criteria-"{{$ckey}}>{{$criteria['description']}}</th>

                    @endforeach

                    </tr>

                @foreach($students as $skey => $student)

                        <tr>
                                <td style="font-weight:bold" id="student-"{{$skey}}>{{$student}}</td>
                                <td>{{$noteDixieme[$skey]}}</td>
                                <td>{{$noteFinale[$skey]}}</td>
                                <td>{{$totalPoints[$skey]}}</td>
                            @foreach($criterium as $ckey => $criteria)

                                    <td  id="point" data-sid={{$skey}} data-cid={{$ckey}}>{{$points[$skey][$ckey]}}</td>

                            @endforeach


                        </tr>

                @endforeach
            </table>
        </div>
            <h3> Modifier la grille</h3>
        <div>
            <p>Élève</p>
            <form>
                <div id="student" >?</div>
                <input type="hidden" id="sid" name="sid">;

                <p>Critère</p>
                <div id="criteria">?</div>
                <input type="hidden" id="cid" name="cid">;
            </form>
        </div>
    </body>
</html>
