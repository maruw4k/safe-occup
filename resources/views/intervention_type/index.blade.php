@extends('layouts.app')

@section('content')
    <h1>Lista typów interwencji</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Nazwa</td>
            <td>Interwencje</td>
            <td>Akcje</td>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>@foreach($value->interventions as $intervention)
                        <p>{{ $intervention->id }}</p>
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('interventionType/' . $value->id) }}">Pokaż</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('interventionType/' . $value->id . '/edit') }}">Edytuj</a>
                    <a class="btn btn-small btn-danger" href="{{ URL::to('interventionType/' . $value->id . '/destroy') }}">Usuń</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
