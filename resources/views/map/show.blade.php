@extends('layouts.app')

@section('content')

    <h1>Mapa: {{ $item->name }}</h1>
    <div class="jumbotron text-center">
        <h2>{{ $item->name }}</h2>
        <strong>Strefy:</strong>
        @foreach($item->zones as $zone)
            <p>{{ $zone->name }}</p>
        @endforeach<br>
    </div>



<!--
    <h1>Mapa: {{ $item->name }}</h1>
    <div>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
          console.log('Dupa');
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 8
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBc-dUJJDfEJbiG9DBr81GTl-npw06p4g4&callback=initMap"
    async defer></script>
</div>


<iframe width="600" height="450" frameborder="0" style="border:0"
src="https://www.google.com/maps/embed/v1/undefined?origin=...&q=...&destination=...&center=...&zoom=...&key=..." allowfullscreen></iframe>
-->

<!--
    <h1>Mapa: {{ $item->name }}</h1>
<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/search?q=Bemowo%Muranów%2C%20Warszawa%2C%20Polska&key=AIzaSyA7a7H_Tnh_Hkt6I9Z6pxdCqWYL4QK0j4Y" allowfullscreen></iframe>
-->


@endsection
