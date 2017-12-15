@extends('layouts.app')

@section('content')
    <h1>Użytkownik: {{ $item->name }}</h1>
    <div class="jumbotron text-center">
        <p>
            <strong>Nazwa:</strong> {{ $item->name }}<br>
            <strong>Imię:</strong> {{ $item->first_name }}<br>
            <strong>Nazwisko:</strong> {{ $item->second_name }}<br>
            <strong>Email:</strong> {{ $item->email }}<br>
            <strong>Data:</strong> {{ $item->birth_date }}<br>
            <strong>Administrator:</strong>
            @if($item->admin != null)
                {{ $item->admin->id }}
            @endif<br>
            <strong>Strażnik:</strong>
            @if($item->officer != null)
                {{ $item->officer->id }}
            @endif<br>
        </p>
    </div>
@endsection
