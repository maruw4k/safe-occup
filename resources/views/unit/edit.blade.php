@extends('layouts.app')

@section('content')
    <h1>Edytuj:</h1>


    {{ Form::model($item, array('route' => array('unit.update', $item->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('station_id', 'Posterunek') }}
        {!! Form::select('station_id', $stations, null, ['id' => 'station_id','class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {{ Form::label('car_id', 'Samochód') }}
        {!! Form::select('car_id', $cars, null, ['id' => 'car_id','class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {{ Form::label('zone_id', 'Strefa') }}
        {!! Form::select('zone_id', $zones, null, ['id' => 'zone_id','class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {{ Form::label('position', 'Pozycja') }}
        {{ Form::text('position', old('position'), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Wyślij', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
