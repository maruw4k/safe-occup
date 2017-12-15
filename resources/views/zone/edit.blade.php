@extends('layouts.app')

@section('content')
    <h1>Edytuj:</h1>


    {{ Form::model($item, array('route' => array('zone.update', $item->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nazwa') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('map_id', 'Mapa') }}
        {!! Form::select('map_id', $maps, null, ['id' => 'map_id','class' => 'form-control']) !!}
    </div>

    {{ Form::submit('Wyślij', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
