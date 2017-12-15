@extends('layouts.app')

@section('content')
    <h1>Utwórz Użytkownika</h1>


    {{ Form::open(array('url' => 'user')) }}
    <div class="form-group">
        {{ Form::label('name', 'Nazwa') }}
        {{ Form::text('name', old('name'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('first_name', 'Imię') }}
        {{ Form::text('first_name', old('first_name'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('second_name', 'Nazwisko') }}
        {{ Form::text('second_name', old('second_name'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', old('email'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Hasło') }}
        {{ Form::password('password', old('password'), array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('birth_date', 'Data Urodzenia') }}
        {{ Form::date('birth_date', \Carbon\Carbon::now(), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Wyślij', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
