@extends('layouts.app')

@section('content')
    <h1>Lista Użytkowników</h1>

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
