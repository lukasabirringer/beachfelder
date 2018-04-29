
@extends('layouts.backend')

@section('content')

  <div class="container">
    <div class="row">
      <div class="column column--12">
        <h2 class="-typo-headline-02 -text-color-gray-01">Profil von {{ $user->userName }}</h2>
      </div>
    </div>
    <div class="row -spacing-a">
      <div class="column column--12">
        <p class="-typo-copy -text-color-gray-01">Rolle: {{ $user->role }}</p>
        <p class="-typo-copy -text-color-gray-01">Vorname: {{ $user->firstName }}</p>
        <p class="-typo-copy -text-color-gray-01">Nachname: {{ $user->lastName }}</p>
        <p class="-typo-copy -text-color-gray-01">Email-Adresse: {{ $user->email }}</p>
        <p class="-typo-copy -text-color-gray-01">PLZ: {{ $user->postalCode }}</p>
        <p class="-typo-copy -text-color-gray-01">Stadt: {{ $user->city }}</p>
        <p class="-typo-copy -text-color-gray-01">Geburtstag: {{ $user->birthdate }}</p>
        <p class="-typo-copy -text-color-gray-01">Geschlecht: {{ $user->sex }}</p>
        <p class="-typo-copy -text-color-gray-01 -spacing-a"><a href="{{ URL::previous() }}" class="link-text">Zurück zur Übersicht</a></p>
      </div>
    </div>
  </div>

@endsection
