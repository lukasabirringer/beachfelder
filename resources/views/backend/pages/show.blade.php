@extends('layouts.backend')

@section('content')

  <div class="container">
    <div class="row">
      <div class="column column--12">
        <h2 class="-typo-headline-02 -text-color-gray-01">Seite {{ $page->name }}</h2>
      </div>
    </div>
    <div class="row -spacing-a">
      <div class="column column--12">
        <p class="-typo-copy -text-color-gray-01 -spacing-a"><a href="{{ URL::previous() }}" class="link-text">Zurück zur Übersicht</a></p>
      </div>
    </div>
  </div>

@endsection
