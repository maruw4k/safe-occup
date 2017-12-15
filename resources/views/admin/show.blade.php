@extends('layouts.app')

@section('content')
    <h1>Administrator: {{ $item->id }}</h1>
    <div class="jumbotron text-center">
        <strong>Użytkownik:</strong> {{ $item->user->name }}<br>
    </div>
@endsection
