@extends('layouts.app')

@section('content')
    <h1>Interwencja: {{ $item->id }}</h1>
    <div class="jumbotron text-center">
        <p>
            <strong>Opis:</strong> {{ $item->description }}<br>
            <strong>Typ interwencji:</strong> {{ $item->interventionType->name }}<br>
            <strong>Jednostka:</strong> {{ $item->unit->id }}<br>
            <strong>Zakończona:</strong>
            @if($item->finished = 1)
                Tak
            @else
                Nie
            @endif<br>
            <strong>Data:</strong> {{ $item->date }}<br>
        </p>
    </div>
@endsection
