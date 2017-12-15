@extends('layouts.app')

@section('content')
    <h1>Jednostka: {{ $item->id }}</h1>
    <div class="jumbotron text-center">
        <p>
            <strong>Posterunek:</strong> {{ $item->station->name }}<br>
            <strong>Samochód:</strong> {{ $item->car->name }}<br>
            <strong>Strefa:</strong> {{ $item->zone->name }}<br>
            <strong>Pozycja:</strong> {{ $item->position }}<br>
            <strong>Strażnicy:</strong>
            @foreach($item->officers as $officer)
                <p>{{ $officer->id }}</p>
            @endforeach<br>
            <strong>Interwencje:</strong>
            @foreach($item->interventions as $intervention)
                <p>{{ $intervention->id }}</p>
            @endforeach<br>
        </p>
    </div>
@endsection
