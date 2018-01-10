@extends('layouts.app')

@section('content')
    <h1>Strefa: {{ $item->name }}</h1>
    <div class="jumbotron text-center">
        <h2>{{ $item->name }}</h2>
        <p>
            <strong>Mapa:</strong> {{ $item->map->name }}<br>
            <strong>Jednostki:</strong>
            @foreach($item->units as $unit)
            <p>{{ $unit->id }}</p>
            @endforeach<br>
        </p>
    </div>


<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/search?q={{ $item->name }}%2C%20Warszawa%2C%20Polska&key=AIzaSyA7a7H_Tnh_Hkt6I9Z6pxdCqWYL4QK0j4Y" allowfullscreen></iframe>
@endsection
