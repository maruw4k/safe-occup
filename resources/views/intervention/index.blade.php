@extends('layouts.app') @section('content')
<div class="flex-container">
    <div style="flex-grow: 5">
        <h1>Lista interwencji</h1>
    </div>
    <div style="flex-grow: 5">
        <div>
            <a class="btn icon-btn btn-success add-button" href="{{ URL::to('intervention/create') }}">
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
                        <td>@if($value->finished = 1) Tak @else Nie @endif
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
