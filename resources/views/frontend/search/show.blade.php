@extends('layouts.frontend')

@section('content')

<div class="content__main">
  <div class="row">
    <div class="column column--12">
      <h2 class="title-page__title">Dein Suchergebnis</h2>
    </div>
  </div>
  <div class="row  -spacing-b">
    <form action="/search" method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="column column--8">
      <div class="row">
        <div class="column column--12 column--s-6 column--m-4">
          <div class="icon-text icon-text--hoverable trigger-flyout">
            <span class="icon-text__icon" data-feather="map-pin"></span>
            <span class="icon-text__text">PLZ: <br> <span class="output__value">{{ $plz }}</span></span>
          </div>

          <div class="flyout flyout--zip-search flyout--fade">
            <span class="flyout__icon" data-feather="x-circle"></span>
            <p class="-typo-copy -text-color-gray-01">PLZ ändern</p>

            <label class="input -spacing-b">
              <input type="text" name="postcode" value="{{ $plz }}" class="input__field" placeholder="PLZ">
              <span class="input__label">PLZ</span>
            </label>
            <button class="button-primary -spacing-b button__accept">
              <span class="button-primary__label">bestätigen</span>
            </button>
          </div>
        </div>
        <div class="column column--12 column--s-6 column--m-4">
          <div class="icon-text icon-text--hoverable trigger-flyout">
            <span class="icon-text__icon" data-feather="crosshair"></span>
            <span class="icon-text__text">{{$distance}} <span class="output__value"></span> km <br> entfernt</span>
          </div>

          <div class="flyout flyout--rating-search">
            <span class="flyout__icon" data-feather="x-circle"></span>
            <p class="-typo-copy -text-color-gray-01">Entfernung ändern</p>
            <label class="input-range -spacing-b">
              <input type="range" name="distance" class="input-range__field" value="{{ $distance }}" min="0" max="100">
              <span class="input-range__value">0</span>
            </label>
            <button class="button-primary -spacing-b button__accept">
              <span class="button-primary__label">bestätigen</span>
            </button>
          </div>
        </div>
        <div class="hint">
          <div class="hint__container">
            <img src="images/hint-search.png" class="hint__image">
          </div>
        </div>
        <div class="column column--12 column--s-6 column--m-4">
          <div class="icon-text icon-text--hoverable trigger-flyout">
            <span class="icon-text__icon" data-feather="award"></span>
            <span class="icon-text__text">mindestens<br><span class="output__value">{{ $ratingmin }}</span> Beachbälle</span>
          </div>
          <div class="flyout flyout--rating-search">
            <span class="flyout__icon" data-feather="x-circle"></span>
            <p class="-typo-copy -text-color-gray-01">Anzahl der Beachbälle ändern</p>
            <label class="input-range -spacing-b">
              <input type="range" name="ratingmin" class="input-range__field" value="{{ $ratingmin }}" min="1" max="5">
              <span class="input-range__value">0</span>
            </label>
            <button class="button-primary -spacing-b button__accept">
              <span class="button-primary__label">bestätigen</span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <div class="column column--12 column--m-4">
      <button type="submit" class="button-secondary -spacing-d">
        <span class="button-secondary__label">Suche starten</span>
      </button>
    </div>
    </x>
  </div>

  <div class="row">
    <div class="column column--12">
      <hr class="divider">
    </div>
  </div>

</div>

<div class="row -spacing-a -flex -flex--direction-row -flex--wrap">
          <div class="column column--12 column--s-6 column--m-4 -spacing-b -flex">
            @foreach ($results as $beachcourt)
            <div class="beachcourt-item">
              <div class="beachcourt-item__image" style="background: url(/uploads/beachcourts/{{$beachcourt->id}}/1.jpg); background-size: cover;">
                <div class="beachcourt-item__distance">
                  <span class="beachcourt-item__icon" data-feather="navigation"></span>
                  <span class="beachcourt-item__paragraph">{{ $distance }}km entfernt</span>
                </div>
                <div class="beachcourt-item__favorite">
                  <span data-feather="heart"></span>
                  @if (Auth::user())
                    <favorite
                        :beachcourt={{ $beachcourt->id }}
                        :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}
                    ></favorite>
                    @endif
                </div>
              </div>
              <div class="beachcourt-item__info">
                <h3 class="beachcourt-item__title">Beachvolleyballfeld in {{ $beachcourt->city }}</h3>
                <div class="icon-text beachcourt-item__rating -spacing-b">
                  <span class="icon-text__icon" data-feather="award"></span>
                  <span class="icon-text__text">Dieses Feld wurde mit <br> <span class="-typo-copy--bold">{{ $beachcourt->rating }}</span>/5 Bällen bewertet</span>
                  <span class="beachcourt-item__info-icon" data-feather="info"></span>

                  <div class="flyout beachcourt-item__info-flyout">
                    <span class="flyout__icon" data-feather="x-circle"></span>
                    <h4 class="-typo-headline-04 -text-color-gray-01">
                      Wie bewerten wir?
                    </h4>
                    <p class="-typo-copy -text-color-gray-01 -spacing-b">
                      <a href="#" class="link-text">Hier</a> kannst du mehr dafürber erfahren, wie wir die Beachvolleyballfelder bewerten.</a>
                    </p>
                  </div>
                </div>

                <div class="icon-text -spacing-b">
                  <span class="icon-text__icon" data-feather="map-pin"></span>
                  <span class="icon-text__text">{{ $beachcourt->postalCode }}<br>{{ $beachcourt->city }}</span>
                </div>

                <div class="icon-text -spacing-b">
                  <span class="icon-text__icon" data-feather="info"></span>
                  <span class="icon-text__text">Felder outdoor: {{ $beachcourt->courtCountOutdoor }} <br> Felder indoor: {{ $beachcourt->courtCountIndoor }}</span>
                </div>

                <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude,)) }}" class="button-primary -spacing-a">
                  <span class="button-primary__label">Mehr Details</span>
                </a>
              </div>
              @endforeach
            </div>
          </div>


@endsection
