@extends('layouts.app')

@section('content')
<div class="flex-container">
    <div style="flex-grow: 5">
        <h1>Lista użytkowników</h1>
    </div>
    <div style="flex-grow: 5">
        <div>
            <a class="btn icon-btn btn-success add-button" href="{{ URL::to('user/create') }}">
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
            <td>Imię</td>
            <td>Nazwisko</td>
            <td>Email</td>
            <td>Data Urodzenia</td>
            <td>Administrator</td>
            <td>Użytkownik</td>
            <td>Akcje</td>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->first_name }}</td>
                <td>{{ $value->second_name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->birth_date }}</td>
                <td>@if($value->admin != null)
                        {{ $value->admin->id }}
                    @endif
                </td>
                <td>@if($value->officer != null)
                    {{ $value->officer->id }}
                    @endif
                </td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ URL::to('user/' . $value->id) }}">Pokaż</a>
                    <a class="btn btn-small btn-info" href="{{ URL::to('user/' . $value->id . '/edit') }}">Edytuj</a>
                    <a class="btn btn-small btn-danger" href="{{ URL::to('user/' . $value->id . '/destroy') }}">Usuń</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
