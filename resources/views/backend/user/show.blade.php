
@extends('layouts.backend')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <h1>Profil von {{ $user->userName }}</h1>
      <p>Rolle: {{ $user->role }}</p>
      <p>Vorname: {{ $user->firstName }}</p>
      <p>Nachname: {{ $user->lastName }}</p>
      <p>Email-Adresse: {{ $user->email }}</p>
      <p>PLZ: {{ $user->postalCode }}</p>
      <p>Stadt: {{ $user->city }}</p>
      <p>Geburtstag: {{ $user->birthdate }}</p>
      <p>Geschlecht: {{ $user->sex }}</p>
      <a href="{{ URL::previous() }}">Zurück zur Übersicht</a>
      <hr>

    </div>
  </div>
</div>

@endsection
