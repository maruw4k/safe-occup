@extends('layouts.app')

@section('content')
    <h1>Edytuj:</h1>


    {{ Form::model($item, array('route' => array('user.update', $item->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nazwa') }}
        {{ Form::text('name', $item->name, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('first_name', 'Imię') }}
        {{ Form::text('first_name', $item->first_name, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('second_name', 'Nazwisko') }}
        {{ Form::text('second_name', $item->second_name, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', $item->email, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('password', 'Hasło') }}
        {{ Form::password('password', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('birth_date', 'Data Urodzenia') }}
        {{ Form::date('birth_date', $item->birth_date, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Wyślij', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
