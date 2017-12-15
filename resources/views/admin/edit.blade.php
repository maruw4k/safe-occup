@extends('layouts.app')

@section('content')
    <h1>Edytuj:</h1>


    {{ Form::model($item, array('route' => array('admin.update', $item->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('user_id', 'Użytkownik') }}
        {!! Form::select('user_id', $users, null, ['id' => 'user_id','class' => 'form-control']) !!}
    </div>

    {{ Form::submit('Wyślij', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
