
@extends('layouts.frontend')

@section('content')
<div style="background: #ff8400; padding: 10px">
  <h4>Aktuelles Wetter <small>({{ $weather->lastUpdate->format('d.m.Y H:i') }})</small></h4>
  {{ $weather->temperature->now }}
</div>

@if($pictures === 'false')
<img src="https://beachfelder.de/img/beachcourt-summary-bg-dummy.jpg" class="beachcourt-summary__image">
@else
<img height="200" src="/uploads/beachcourts/{{$beachcourt->id}}/1.jpg" class="beachcourt-summary__image">
<img height="200" src="/uploads/beachcourts/{{$beachcourt->id}}/2.jpg" class="beachcourt-summary__image">
<img height="200" src="/uploads/beachcourts/{{$beachcourt->id}}/3.jpg" class="beachcourt-summary__image">
<img height="200" src="/uploads/beachcourts/{{$beachcourt->id}}/4.jpg" class="beachcourt-summary__image">
<img height="200" src="/uploads/beachcourts/{{$beachcourt->id}}/5.jpg" class="beachcourt-summary__image">
@endif
@if (Auth::user())
<favorite
:beachcourt={{ $beachcourt->id }}
:favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}
></favorite>
@endif
<div class="row">
  <div class="col">
    <h1>Beachfeld in {{ $beachcourt->city }}</h1>
    <hr>
  </div>
</div>
<div class="row">
  <div class="col">
    <h2>Infos</h2>
    <hr>
    Longitude: {{ $beachcourt->longitude }}<br>
    Latitude: {{ $beachcourt->latitude }}<br>
    Ort: {{ $beachcourt->postalCode }} {{ $beachcourt->city }}
  </div>
  <div class="col">
    <h2>Bilder</h2>
    <hr>
  </div>
</div>
<div class="row">

  <div class="col">
    <h2>Favorite</h2>
    <hr>
  </div>
</div>

<div class="row">
  <div class="col">
<h2>Rating</h2>
<hr>
      <div class="notification-box-rating ">
        <div class="notification-box-rating__summary">
          <h4 class="notification-box-rating__points">{{ $beachcourt->rating }} von 5</h4>
        </div>
        <div class="notification-box-rating__details">
          <dl>
            <dt class="notification-box-rating__label"> Sand </dt>
            <dd class="notification-box-rating__rating"> {{ $beachcourt->ratingSand }} von 34 Punkten </dd>
          </dl>
          <dl>
            <dt class="notification-box-rating__label"> Netz </dt>
            <dd class="notification-box-rating__rating"> {{ $beachcourt->ratingNet }} von 28 Punkten </dd>
          </dl>
          <dl>
            <dt class="notification-box-rating__label"> Feld </dt>
            <dd class="notification-box-rating__rating"> {{ $beachcourt->ratingCourt }} von 27 Punkten </dd>
          </dl>
          <dl>
            <dt class="notification-box-rating__label"> Umgebung </dt>
            <dd class="notification-box-rating__rating"> {{ $beachcourt->ratingEnvironment }} von 11 Punkten </dd>
          </dl>
        </div>
      </div>
    </div>
    </div>

</div>
<hr>



@endsection
