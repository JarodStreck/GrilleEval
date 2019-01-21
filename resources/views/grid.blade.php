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

                empty-cells: show;

            }
            th{
                transform: rotate(270deg);
                white-space:pre-wrap;
                width: 50px;
            }
            .first{
            

            }
            .headerdiv{
                width: 150px;
                height: 50px;
                vertical-align: text-top;
                display: inline-block;
    margin-left: 50px;

            }
            .contentdiv:first{

            }
        </style>
    </head>
    <body>



    <div class="links">
        <a href="/">Home</a>
        <a href="https://laracasts.com">Nouvelle grille</a>

    </div>

        <table class="gridtable" >

                <tr class="first">
                    <th>&nbsp;</th>
                @foreach($criterium as $ckey => $criteria)

                        <th><div class="headerdiv">{{$criteria['description']}}</div></th>

                @endforeach

                </tr>


            @foreach($students as $skey => $student)

                    <tr>

                            <td>{{$student}}</td>

                        @foreach ($points[$skey] as $pkey => $point)
                            <td>{{$point}}</td>
                        @endforeach

                    </tr>

            @endforeach
        </table>






    </body>
</html>
