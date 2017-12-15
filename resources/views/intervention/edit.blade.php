@extends('layouts.app')

@section('content')
    <h1>Edytuj:</h1>


    {{ Form::model($item, array('route' => array('intervention.update', $item->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('description', 'Opis') }}
        {{ Form::textarea('description', $item->description, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('interventionType_id', 'Typ Interwencji') }}
        {!! Form::select('interventionType_id', $interventiontypes, null, ['id' => 'station_id','class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {{ Form::label('unit_id', 'Id jednostki') }}
        {!! Form::select('unit_id', $units, null, ['id' => 'unit_id','class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {{ Form::label('finished', 'Zakonczona') }}
        {{ Form::checkbox('finished', $item->finished, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('date', 'Data') }}
        {{ Form::date('date', $item->date, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Wyślij', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
