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
@endsection
