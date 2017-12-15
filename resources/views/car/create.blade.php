@extends('layouts.app')

@section('content')
    <h1>Utwórz Samochód</h1>


    {{ Form::open(array('url' => 'car')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nazwa') }}
        {{ Form::text('name', old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('station_id', 'Posterunek') }}
        {!! Form::select('station_id', $stations, null, ['id' => 'station_id','class' => 'form-control']) !!}
    </div>

    {{ Form::submit('Wyślij', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
