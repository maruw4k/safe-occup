@extends('layouts.app')

@section('content')
    <h1>Typ interwencji: {{ $item->name }}</h1>
    <div class="jumbotron text-center">
        <h2>{{ $item->name }}</h2>
        <strong>Interwencje:</strong>
        @foreach($item->interventions as $intervention)
            <p>{{ $intervention->name }}</p>
        @endforeach<br>
    </div>
@endsection
