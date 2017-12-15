@extends('layouts.app')

@section('content')
    <h1>Lista Jednostek</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Posterunek</td>
            <td>Samochód</td>
            <td>Strefa</td>
            <td>Pozycja</td>
            <td>Strażnicy</td>
            <td>Interwencje</td>
            <td>Akcje</td>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->station->name }}</td>
                <td>{{ $value->car->name }}</td>
                <td>{{ $value->zone->name }}</td>
                <td>{{ $value->position }}</td>
                <td>@foreach($value->officers as $officer)
                        <p>{{ $officer->id }}</p>
                    @endforeach
                </td>
                <td>@foreach($value->interventions as $intervention)
                        <p>{{ $intervention->id }}</p>
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('unit/' . $value->id) }}">Pokaż</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('unit/' . $value->id . '/edit') }}">Edytuj</a>
                    <a class="btn btn-small btn-danger" href="{{ URL::to('unit/' . $value->id . '/destroy') }}">Usuń</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
