@extends('layouts.app') @section('sidebar')
    @parent

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
@endsection