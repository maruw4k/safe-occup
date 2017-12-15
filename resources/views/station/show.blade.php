@extends('layouts.app')

@section('content')
    <h1>Posterunek: {{ $item->name }}</h1>
    <div class="jumbotron text-center">
        <h2>{{ $item->name }}</h2>
        <p>
        <strong>Stażnicy:</strong>
        @foreach($item->officers as $officer)
            <p>{{ $officer->id }}</p>
        @endforeach<br>
        <strong>Jednostki:</strong>
        @foreach($item->units as $unit)
            <p>{{ $unit->id }}</p>
        @endforeach<br>
        <strong>Samochody:</strong>
        @foreach($item->cars as $car)
            <p>{{ $car->name }}</p>
        @endforeach<br>
        </p>
    </div>
@endsection
