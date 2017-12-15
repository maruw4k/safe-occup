@extends('layouts.app')

@section('content')
    <h1>Utwórz Administratora</h1>


    {{ Form::open(array('url' => 'admin')) }}

    <div class="form-group">
        {{ Form::label('user_id', 'Użytkownik') }}
        {!! Form::select('user_id', $users, null, ['id' => 'user_id','class' => 'form-control']) !!}
    </div>
    {{ Form::submit('Wyślij', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
@endsection
