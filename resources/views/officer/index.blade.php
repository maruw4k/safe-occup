@extends('layouts.app')  


@section('content') 

<div class="flex-container">
    <div style="flex-grow: 5">
        <h1>Lista strażników</h1>
    </div>
    <div style="flex-grow: 5">
        <div>
            <a class="btn icon-btn btn-success add-button" href="{{ URL::to('officer/create') }}">
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

            <table class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Użytkownik</td>
                        <td>Stopień</td>
                        <td>Jednostka</td>
                        <td>Posterunek</td>
                        <td>Prawo jazdy</td>
                        <td>Akcje</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $key => $value)
                    <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->user->name }}</td>
                        <td>{{ $value->rank->name }}</td>
                        <td>{{ $value->unit->id }}</td>
                        <td>{{ $value->station->name }}</td>
                        <td>@if($value->drivers_licence = 1) Tak @else Nie @endif
                        </td>
                        <td>
                            <a class="btn btn-small btn-success" href="{{ URL::to('officer/' . $value->id) }}">Pokaż</a>
                            <a class="btn btn-small btn-info" href="{{ URL::to('officer/' . $value->id . '/edit') }}">Edytuj</a>
                            <a class="btn btn-small btn-danger" href="{{ URL::to('officer/' . $value->id . '/destroy') }}">Usuń</a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

@endsection
