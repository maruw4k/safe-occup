<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>ul {
            list-style: none;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav"></ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="panel panel-default">
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
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">Dashboard</div>
                        <div class="panel-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
