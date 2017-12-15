@extends('layouts.app')

@section('content')
    <h1>Mapa: {{ $item->name }}</h1>
    <div class="jumbotron text-center">
        <h2>{{ $item->name }}</h2>
        <strong>Strefy:</strong>
        @foreach($item->zones as $zone)
            <p>{{ $zone->name }}</p>
        @endforeach<br>
    </div>
@endsection
