@extends('layouts.app') @section('content') 
<div class="content">
    <div class="content-welcome">
        <div class=" welcome">
            <h3>Statystyki </h3>
            <p>Statystyki dotyczące pracy strażników miejskich.</p>
        </div>

    </div>

    <p>Liczba strażników: {{ $items['number_of_users'] }} </p>

    <p>Najwięcej typów interwencji: {{ $items['number_of_users'] }} </p>
    
    

    <p>Ilość nieskończonych interwencji.</p>
    <div class="progress">
        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{ $items['number_of_unfinish_interventions'] }}" aria-valuemin="0" aria-valuemax="{{ $items['number_of_interventions'] }}" style="width: {{ $items['number_of_unfinish_interventions'] / $items['number_of_interventions'] * 100 }}%;"></div>
    </div>

    <p>Ilość skończonych interwencji.</p>
    <div class="progress">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuemin="0" aria-valuemax="{{ $items['number_of_interventions'] }}" style="width: {{ $items['number_of_finish_interventions'] / $items['number_of_interventions'] * 100 }}%;"></div>
    </div>


    <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="5" style="width:%">
            70%
        </div>
    </div>

    <div class="container">
        <h2>Statystyki tygodniowe</h2>
        <ul class="list-group">
            <li class="list-group-item">Ilość interwencji w ostatnim tygodniu: {{ $items['number_of_interventions'] }} </li>
            <li class="list-group-item">Skuteczność: {{ $items['number_of_finish_interventions'] / $items['number_of_interventions'] * 100 }}%</li>
        </ul>
        <h2>Statystyki miesięczne</h2>
        <ul class="list-group">
            <li class="list-group-item">Ilość interwencji w tym miesiącu: {{ $items['number_of_interventions'] }}</li>
            <li class="list-group-item">Skuteczność: {{ $items['number_of_finish_interventions'] / $items['number_of_interventions'] * 100 }}%</li>
        </ul>
        <h2>Statystyki roczne</h2>
        <ul class="list-group">
            <li class="list-group-item">Ilość interwencji w roku: {{ $items['number_of_interventions'] }}</li>
        </ul>
    </div>
</div>

@endsection
