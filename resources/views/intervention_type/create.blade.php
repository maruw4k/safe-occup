@extends('layouts.app')

@section('content')
    <h1>Utwórz Typ Interwencji</h1>


    {{ Form::open(array('url' => 'interventionType')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nazwa') }}
        {{ Form::text('name', old('name'), array('class' => 'form-control')) }}
    </div>
    {{ Form::submit('Wyślij', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
