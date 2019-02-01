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
            .container{
                display:flex;
                flex-direction: row;
                justify-content:space-between;
                padding: 0 0 0 0;
            }



        </style>
    </head>
    <body>



        <div class="links">
            <a href="/grid/{{$id}}">Back to grid</a>
            <a href="/">Home</a>
            <a href="https://laracasts.com">Nouvelle grille</a>
        </div>

        <div class="container">
            <div class="content">
                <h2>Classe</h2>
                <h5>{{$gridinfo['class']}}</h5>
                <br>
                <h2>Module</h2>
                <h5>{{$gridinfo['module']}}</h5>
                <br>
                <h2>Date</h2>
                <h5>{{$gridinfo['date']}}</h5>
            </div>
            <div class="content">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>id</th>
                        <th>Nom</th>
                    </tr>
                    @foreach ($students as $sid => $student)
                        <tr>
                            <td>{{$sid}}</td>
                            <td>{{$student}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="content">
                <table class="table table-striped table-hover">
                    <tr>
                        <th>id</th>
                        <th>Description</th>
                    </tr>
                    @foreach ($criterion as $cid => $criteria)
                        <tr>
                            <td>{{$cid}}</td>
                            <td>{{$criteria}}</td>
                        </tr>
                    @endforeach
                </table>

            </div>
            <div class="content">
                <h2 style="padding-bottom:15px;">Ajouter un élève</h2>
                <form method="post" action="/grid/{{$id}}/edit/addstudent" style="padding-bottom:50px;">
                    @csrf
                    <input type="text" id="student" name="student">
                    <input class="btn btn-primary" type="submit" id="addStudent" name="addstudent" value="Ajouter">
                </form>
                <h2 style="padding-bottom:15px;"> Ajouter un critère</h2>
                <form method="post" action="/grid/{{$id}}/edit/addcriteria">
                    @csrf
                    <input type="text" id="criteria" name="criteria">
                    <input class="btn btn-primary" type="submit" id="addcriteria" name="addcriteria" value="Ajouter">
                </form>
            </div>
        </div>
    </body>
</html>
