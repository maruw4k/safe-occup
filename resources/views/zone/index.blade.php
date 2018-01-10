@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div style="flex-grow: 5">
        <h1>Lista stref</h1>
    </div>
    <div style="flex-grow: 5">
        <div>
            <a class="btn icon-btn btn-success add-button" href="{{ URL::to('zone/create') }}">
    <span class="glyphicon btn-glyphicon glyphicon-plus img-circle text-success"></span>
    Dodaj
    </a>
        </div>
    </div>
</div>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>Nazwa</td>
            <td>Mapa</td>
            <td>Jednostki</td>
            <td>Akcje</td>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->map->name }}</td>
                <td>@foreach($value->units as $unit)
                    <p>{{ $unit->id }}</p>
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('zone/' . $value->id) }}">Pokaż na mapie</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('zone/' . $value->id . '/edit') }}">Edytuj</a>
                    <a class="btn btn-small btn-danger" href="{{ URL::to('zone/' . $value->id . '/destroy') }}">Usuń</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
