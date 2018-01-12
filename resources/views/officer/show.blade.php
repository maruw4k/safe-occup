@extends('layouts.app')

@section('content')
    <h1>Strażnik: {{ $item->id }}</h1>
    <div class="jumbotron text-center">
        <p>
            <strong>Użytkownik:</strong> {{ $item->user->name }}<br>
            <strong>Stopień:</strong> {{ $item->rank->name }}<br>
            <strong>Jednostka:</strong> {{ $item->unit->id }}<br>
            <strong>Posterunek:</strong> {{ $item->station->name  }}<br>
            <strong>Prawo jazdy:</strong>
            @if($item->drivers_licence = 1)
                Tak
            @else
                Nie
            @endif<br>
        </p>
    </div>
@endsection
