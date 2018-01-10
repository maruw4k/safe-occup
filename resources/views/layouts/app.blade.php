<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SafeOccup</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--    dodane-->

    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />

    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" media="all" />

    <!--//theme-style-->

    <style>
        ul {
            list-style: none;
        }

    </style>
</head>

<body>

    <div id="app">
        <div class="header"> </div>
        <div class="header-top">
            <div class="container">
                <div class="logo">
                    <h3 style="color: #e0cb57;"><a style=" color: inherit; text-decoration: inherit; " href="{{ URL::to('home/')}}">SafeOccup</a></h3>
                </div>
                <div class="top-nav">
                    <ul>
                        @if (Auth::user())
                        <li><a href="{{ URL::to('intervention/') }}"> Interwencje </a></li>
                        <li><a href="{{ URL::to('officer/') }}"> Strażnicy </a></li>
                        <li><a href="{{ URL::to('zone/') }}"> Strefy </a></li>
                        <li><a href="{{ URL::to('stats/') }}"> Statystyki </a></li>
                        @endif

                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Zaloguj</a></li>
                        <li><a href="{{ route('register') }}">Rejestracja</a></li>
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Wyloguj
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                        <div class="clearfix"></div>
                    </ul>
                    <script>
                        $("span.menu").click(function() {
                            $(".top-nav ul").slideToggle(500, function() {});
                        });

                    </script>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>


        <div class="container">
            <div class="row">

                @if (Auth::user())
                <div class="col-md-3">
                    <div class="panel panel-default padding-top-section">
                        <div class="panel-heading">Menu</div>

                        <div class="panel-body">
                            <h3>Strażnicy</h3>
                            <ul>
                                <li><a href="{{ URL::to('officer/') }}">Lista strażników</a></li>
                                <li><a href="{{ URL::to('officer/create') }}">Utwórz strażnika</a></li>
                            </ul>
                            <h3>Samochody</h3>
                            <ul>
                                <li><a href="{{ URL::to('car') }}">Lista samochodów</a></li>
                                <li><a href="{{ URL::to('car/create') }}">Utwórz samochodów</a></li>
                            </ul>
                            <h3>Stopnie</h3>
                            <ul>
                                <li><a href="{{ URL::to('rank') }}">Lista stopni</a></li>
                                <li><a href="{{ URL::to('rank/create') }}">Utwórz stopień</a></li>
                            </ul>
                            <h3>Mapy</h3>
                            <ul>
                                <li><a href="{{ URL::to('map') }}">Lista map</a></li>
                                <li><a href="{{ URL::to('map/create') }}">Utwórz mapę</a></li>
                            </ul>
                            <h3>Strefy</h3>
                            <ul>
                                <li><a href="{{ URL::to('zone') }}">Lista stref</a></li>
                                <li><a href="{{ URL::to('zone/create') }}">Utwórz stefe</a></li>
                            </ul>
                            <h3>Posterunki</h3>
                            <ul>
                                <li><a href="{{ URL::to('station/') }}">Lista posterunków</a></li>
                                <li><a href="{{ URL::to('station/create') }}">Utwórz posterunek</a></li>
                            </ul>
                            <h3>Jednostki</h3>
                            <ul>
                                <li><a href="{{ URL::to('unit/') }}">Lista jednostek</a></li>
                                <li><a href="{{ URL::to('unit/create') }}">Utwórz jednostke</a></li>
                            </ul>
                            <h3>Interwencje</h3>
                            <ul>
                                <li><a href="{{ URL::to('intervention/') }}">Lista interwencji</a></li>
                                <li><a href="{{ URL::to('intervention/create') }}">Utwórz interwencje</a></li>
                            </ul>
                            <h3>Typy Interwencji</h3>
                            <ul>
                                <li><a href="{{ URL::to('interventionType/') }}">Lista typów interwencji</a></li>
                                <li><a href="{{ URL::to('interventionType/create') }}">Utwórz typ interwencji</a></li>
                            </ul>
                            <h3>Statystyki</h3>
                            <ul>
                                <li><a href="{{ URL::to('stats/') }}">Lista statystyk</a></li>
                            </ul>
                            <h3>Użytkownicy</h3>
                            <ul>
                                <li><a href="{{ URL::to('user/') }}">Lista Użytkowników</a></li>
                                <li><a href="{{ URL::to('user/create') }}">Utwórz użytkownika</a></li>
                            </ul>
                            <h3>Administratorzy</h3>
                            <ul>
                                <li><a href="{{ URL::to('admin/') }}">Lista Administratorów</a></li>
                                <li><a href="{{ URL::to('admin/create') }}">Utwórz administratora</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                <div class="col-md-9">
                    <div class="panel panel-default padding-top-section">
                        <div class="panel-heading">Panel główny</div>
                        <div class="panel-body">
                            @yield('content')
                        </div>
                    </div>
                </div>


            </div>
        </div>

        <div class="footer">
            <div class="container">
                <div class="footer-top">
                    <ul class="social">
                        <li><a href="#"><i> </i></a></li>
                        <li><a href="#"><i class="rss"> </i></a></li>
                        <li><a href="#"><i class="twitter"> </i></a></li>
                        <li><a href="#"><i class="dribble"> </i></a></li>
                        <li><a href="#"><i class="linked"> </i></a></li>
                        <li><a href="#"><i class="camera"> </i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
