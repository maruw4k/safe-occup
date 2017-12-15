@extends('layouts.app')

@section('content')
    <h1>Utwórz Interwencje</h1>


    {{ Form::open(array('url' => 'intervention')) }}
    <div class="form-group">
        {{ Form::label('description', 'Opis') }}
        {{ Form::textarea('description', old('description'), array('class' => 'form-control')) }}
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
        {{ Form::checkbox('finished', true) }}

    </div>
    <div class="form-group">
        {{ Form::label('date', 'Data') }}
        {{ Form::date('date', \Carbon\Carbon::now(), array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Wyślij', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
