@extends('layouts.app')

@section('content')
    <h1>Edytuj:</h1>


    {{ Form::model($item, array('route' => array('officer.update', $item->id), 'method' => 'PUT')) }}
    <div class="form-group">
        {{ Form::label('user_id', 'Użytkownik') }}
        {!! Form::select('user_id', $users, null, ['id' => 'user_id','class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {{ Form::label('rank_id', 'Stopień') }}
        {!! Form::select('rank_id', $ranks, null, ['id' => 'rank_id','class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {{ Form::label('station_id', 'Posterunek') }}
        {!! Form::select('station_id', $stations, null, ['id' => 'station_id','class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {{ Form::label('unit_id', 'Id Jednostki') }}
        {!! Form::select('unit_id', $units, null, ['id' => 'unit_id','class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {{ Form::label('drivers_licence', 'Prawo jazdy') }}
        {{ Form::checkbox('drivers_licence', $item->drivers_licence) }}
    </div>
    {{ Form::submit('Wyślij', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
