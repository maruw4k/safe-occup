@extends('layouts.app')

@section('content')
    <h1>Utwórz Strefe</h1>


    {{ Form::open(array('url' => 'zone')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nazwa') }}
        {{ Form::text('name', old('name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('map_id', 'Mapa') }}
        {!! Form::select('map_id', $maps, null, ['id' => 'map_id','class' => 'form-control']) !!}
    </div>

    {{ Form::submit('Wyślij', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
