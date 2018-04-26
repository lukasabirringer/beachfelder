
@extends('layouts.frontend', ['body_class' => 'home'])

@section('frontpage')
  <div class="section section--start">
    <button onclick="window.location.href='{{URL::route('login')}}'" class="button-secondary hide-on-mobile section__button"><span class="button-secondary__label">Anmelden / Registrieren</span></button>

    <h1 class="-typo-headline-01 -text-color-white">Willkommen @if (Auth::check()) {{ Auth::user()->userName }} @endif</h1>
    <p class="-typo-copy -text-color-white -align-center">
    <span class="-typo-copy--bold">beachfelder.de</span> ist die Beachvolleyballfeld-Suchmaschine mit der größten und umfangreichsten Datenbank an Feldern. Auf <span class="-typo-copy--bold">beachfelder.de</span> kannst du deine Felder bewerten, dir Favoriten speichern und uns neue Beachvolleyballfelder vorschlagen.</p>

    <form action="/search" method="POST" class="form--search">
      <label class="input section__input" style="overflow: visible;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" class="form-control" id="form-postcode" name="postcode">

        <input type="search" class="input__field" id="address-input" placeholder="PLZ oder Ort" />
        <span class="input__icon" data-feather="search" onclick="document.querySelector('.form--search').submit();"></span>
        <span class="input__label">PLZ oder Ort</span>
        <div class="input__border"></div>
        {{ $errors->postcode->first('postcode') }}
      </label>
    </form>
    <span class="section__link" data-feather="chevrons-down"></span>
  </div>
@endsection

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <div class="content__main">
    <!-- <div class="row">
      <div class="column column--12 column--s-6">
        <h1 class="title-page__title home__title">Willkommen @if (Auth::check()) {{ Auth::user()->userName }} @endif</h1>
        <p class="title-page__subtitle">
        <span class="-typo-copy--bold">beachfelder.de</span> ist die Beachvolleyballfeld-Suchmaschine mit der größten und umfangreichsten Datenbank an Feldern.</p>

        <p class="-typo-copy -text-color-gray-01 -spacing-a">Wir bieten dir die Möglickeit, Felder zu bewerten, Favoriten zu speichern und neue Beachvolleyballfelder uns vorzuschlagen.</p>
      </div>
    </div> -->
    <div class="row">
        <div class="column column--12">
          <h2 class="-typo-headline-02 -text-color-gray-01">Unsere neuesten Felder</h2>
          <div class="owl-carousel owl-carousel--frontpage -spacing-b">
            @foreach ($beachcourts as $beachcourt)
              <div class="beachcourt-item">
                <div class="beachcourt-item__image">
                  <figure class="progressive">
                    <img class="progressive__img progressive--not-loaded" data-progressive="/uploads/beachcourts/{{$beachcourt->id}}/slider/slide-image-01-retina.jpg" src="/uploads/beachcourts/{{$beachcourt->id}}/slider/slide-image-01.jpg">
                  </figure>
                  @if (Auth::user())
                      <favorite :beachcourt={{ $beachcourt->id }} :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}></favorite>
                  @endif
                </div>
                <div class="beachcourt-item__info">
                  <h3 class="beachcourt-item__title">Beachvolleyballfeld in {{ $beachcourt->city }}</h3>
                  @if ($beachcourt->rating >= 1)
                    <div class="icon-text beachcourt-item__rating -spacing-b">
                      <span class="icon-text__icon" data-feather="award"></span>
                      <span class="icon-text__text">Dieses Feld wurde mit <br> <span class="-typo-copy--bold">{{ $beachcourt->rating }}</span>/5 Bällen bewertet</span>
                    </div>
                  @else
                    <div class="icon-text beachcourt-item__rating -spacing-b">
                      <span class="icon-text__icon" data-feather="award"></span>
                      <span class="icon-text__text">Dieses Feld wurde noch <br> <span class="-typo-copy--bold">nicht </span> bewertet</span>
                    </div>
                  @endif

                  <div class="icon-text -spacing-b">
                    <span class="icon-text__icon" data-feather="map-pin"></span>
                    <span class="icon-text__text">{{ $beachcourt->postalCode }}<br>{{ $beachcourt->city }}</span>
                  </div>

                  <div class="icon-text -spacing-b">
                    <span class="icon-text__icon" data-feather="info"></span>
                    <span class="icon-text__text">Felder outdoor: {{ $beachcourt->courtCountOutdoor }} <br> Felder indoor: {{ $beachcourt->courtCountIndoor }}</span>
                  </div>

                  <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude)) }}" class="button-primary -spacing-a">
                    <span class="button-primary__label">Mehr erfahren</span>
                    <span class="button-primary__label button-primary__label--hover">Mehr erfahren</span>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="row -spacing-a">
        <div class="column column--12">
          <hr class="divider">
        </div>
      </div>
      <div class="row -spacing-a">
        
        <div class="column column--12">
          <h2 class="-typo-headline-02 -text-color-gray-01">Felder in den größten deutschen Städten</h2>
        </div>
      </div>
      <div class="row">
        @foreach($cities as $city)
          <div class="column column--12 column--s-6 -spacing-b">
            <div class="teaser">
              <a href="{{ URL('/') }}/stadt/{{strtolower($city->name) }}" class="teaser__link">
                <img src="{{ asset('uploads/cities') }}/{{strtolower($city->name) }}.jpg" class="teaser__image">
                <div class="teaser__info">
                  <h3 class="teaser__title">{{ $city->name }}</h3>
                  <p class="teaser__subtitle">XYZ Beachvolleyballfelder</p>  
                </div>
              </a>
            </div>
          </div>
        @endforeach
      </div>
  </div> <!-- .content__main ENDE -->
@endsection