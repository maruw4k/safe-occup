@extends('layouts.app')

@section('content')
    <h1>Stopień: {{ $item->name }}</h1>
    <div class="jumbotron text-center">
        <h2>{{ $item->name }}</h2>
        <strong>Strażnicy:</strong>
        @foreach($item->officers as $officer)
            <p>{{ $officer->name }}</p>
        @endforeach<br>
    </div>
@endsection
