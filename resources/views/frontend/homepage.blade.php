
@extends('layouts.frontend')

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <div class="content__main">
    <div class="row">
        <div class="column column--12 column--s-6 column--m-4">
            <h1 class="title-page__title home__title">Willkommen</h1>
            <p class="title-page__subtitle">
            <span class="-typo-copy--bold">beachfelder.de</span> ist die Beachvolleyballfeld-Suchmaschine mit der größten und umfangreichsten Datenbank an Feldern.</p>

            <p class="-typo-copy -text-color-gray-01 -spacing-a">Wir bieten dir die Möglickeit, Felder zu bewerten, Favoriten zu speichern und neue Beachvolleyballfelder uns vorzuschlagen.</p>
        </div>
        <div class="column column--12 column--s-6 column--m-8" style="position: relative;">
          <div class="overlay-gradient overlay-gradient--left">
            <button class="button-circle button-circle--left">
              <span class="button-circle__icon" data-feather="chevron-left"></span>
            </button>

            <button class="button-circle button-circle--right -spacing-b">
              <span class="button-circle__icon" data-feather="chevron-right"></span>
            </button>
          </div>

          <div class="owl-carousel owl-carousel--frontpage">
            @foreach ($beachcourts as $beachcourt)
              <div class="beachcourt-item">
                <div class="beachcourt-item__image">
                  <figure class="progressive">
                    <img class="progressive__img progressive--not-loaded" data-progressive="/uploads/beachcourts/{{$beachcourt->id}}/slider/slide-image-01-retina.jpg" src="/uploads/beachcourts/{{$beachcourt->id}}/slider/slide-image-01.jpg">
                  </figure>

                  <div class="beachcourt-item__favorite">
                    @if (Auth::user())
                      <favorite :beachcourt={{ $beachcourt->id }} :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}></favorite>
                    @endif
                  </div>
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
                    <span class="button-primary__label">Mehr Details</span>
                    <span class="button-primary__label button-primary__label--hover">Mehr Details</span>
                  </a>
                </div>
              </div>
            @endforeach
          </div>
          <div class="overlay-gradient overlay-gradient--right"> </div>
        </div>
      </div>
  </div> <!-- .content__main ENDE -->
@endsection
 