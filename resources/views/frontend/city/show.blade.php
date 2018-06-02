@extends('layouts.frontend')

@section('title_and_meta')
    <title>Beachvolleyballfelder in {{ $name }} | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
    <meta name="description" content="Hier findest du alle Beachfelder in {{ $name }}. Sehe dir alle Beachvolleyball-Felder in {{ $name }} an und finde dein nächstes Lieblingsfeld!" />
@endsection

<title>Beachfelder in {{ $name }}</title>
@section('content')
  <div class="content__main">
    
    @include('frontend.city.includes.headline')

    @include('frontend.reusable-includes.divider')

    <div class="row">
      @foreach ($beachcourts as $beachcourt)
        @if($beachcourt-> submitState != 'submitted')
          <div class="column column--12 column--s-6 column--m-4 -spacing-b">
            @include('frontend.reusable-includes.beachcourt-item')
          </div>
        @endif
      @endforeach
    </div>
  </div> <!-- .content__main ENDE -->
@endsection