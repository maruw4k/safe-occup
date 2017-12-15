@extends('layouts.app')

@section('content')
    <h1>Samochód: {{ $item->name }}</h1>
    <div class="jumbotron text-center">
        <h2>{{ $item->name }}</h2>
        <p>
            <strong>Posterunek:</strong> {{ $item->station->name }}<br>
            <strong>Jednostka:</strong> {{ $item->unit->id }}<br>
        </p>
    </div>
@endsection
