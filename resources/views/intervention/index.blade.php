@extends('layouts.app')

@section('content')
    <h1>Lista Interwencji</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Opis</td>
            <td>Typ interwencji</td>
            <td>Jednostka</td>
            <td>Zakonczona</td>
            <td>Data</td>
            <td>Akcje</td>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->description }}</td>
                <td>{{ $value->interventionType->name }}</td>
                <td>{{ $value->unit->id }}</td>
                <td>@if($value->finished = 1)
                        Tak
                    @else
                        Nie
                    @endif
                </td>
                <td>{{ $value->date }}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('intervention/' . $value->id) }}">Pokaż</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('intervention/' . $value->id . '/edit') }}">Edytuj</a>
                    <a class="btn btn-small btn-danger" href="{{ URL::to('intervention/' . $value->id . '/destroy') }}">Usuń</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
