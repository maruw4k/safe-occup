<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 40vh;
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
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

             body {
                 margin: 0px;
                 overflow: hidden;
             }
            #links{
                width: 800px;
                margin-left: auto;
                margin-right: auto;
                text-align: center;
            }
            #controls{
                width: 400px;
                height: 700px;
                float: left;
                clear:none;
            }
            #obj{
                background-color: #606060;
                color: #fff;
                width: 400px;
                height: 700px;
                float: left;
                clear: none;
            }
            ul, li {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }
            button{
                width: 100px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Panel Admina</a>
                    @else
                        <a href="#">Kontakt</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    SuperDruk3Djava
                </div>

                <div class="links">
                        <h2>Galeria</h2>

                </div>
            </div>
        </div>
    <script>
    </script>
    </body>
</html>
