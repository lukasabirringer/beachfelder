
@extends('layouts.frontend')

@section('content')
<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5aba9ef91fff98001395a6c0&product=inline-share-buttons' async='async'></script>
<div class="content__main">
    <div class="row">
      <div class="column column--12">
        <h1 class="title-page__title">Beachvolleyballfeld in {{ $beachcourt->city }}</h1>
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <div class="row">
          <div class="column column--12 column--s-6 column--m-3">
            <div class="icon-text -spacing-b">
              <span class="icon-text__icon" data-feather="map-pin"></span>
              <span class="icon-text__text">{{ $beachcourt->postalCode }} {{ $beachcourt->city }}<br>{{ $beachcourt->street }} {{ $beachcourt->houseNumber }}</span>
            </div>
          </div>
          <div class="column column--12 column--s-6 column--m-3">
            <div class="icon-text -spacing-b">
              <span class="icon-text__icon" data-feather="navigation"></span>
              <span class="icon-text__text">{{ $beachcourt->longitude }}<br>{{ $beachcourt->latitude }}</span>
            </div>
          </div>
          <div class="column column--12 column--s-6 column--m-3">
            <div class="icon-text -spacing-b">
              <span class="icon-text__icon" data-feather="info"></span>
              <span class="icon-text__text">Felder outdoor: {{ $beachcourt->courtCountOutdoor }}<br>Felder indoor: {{ $beachcourt->courtCountIndoor }}</span>
            </div>
          </div>
          <div class="column column--12 column--s-6 column--m-3">
            <div class="infobox">
              <span class="infobox__icon" data-feather="{{ $icon }}"></span>
              <span class="infobox__title">Aktuell <br>({{ $weather->lastUpdate->format('d.m.Y H:i') }})</span>
              <span class="infobox__text">{{ $roundedWheater }} {{ $weather->temperature->getUnit() }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>

    <div class="row">
      <div class="column column--12 -spacing-a">
        <div class="row">
          <div class="column column--12 column--m-9">
            <div class="rating">

              @if($beachcourt->rating <1)
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
              @elseif($beachcourt->rating >=1 && $beachcourt->rating <2)
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
              @elseif($beachcourt->rating >=2 && $beachcourt->rating <3)
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
              @elseif($beachcourt->rating >=3 && $beachcourt->rating <4)
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
              @elseif($beachcourt->rating >=4 && $beachcourt->rating <5)
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
              @elseif($beachcourt->rating =5)
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
              @endif

              @if ($beachcourt->ratingCount = 1)
                <p class="rating__count">Diese Bewertung stammt von beachfelder.de <span class="icon-text__icon" data-feather="info"></span></p>
              @elseif ($beachcourt->ratingCount > 10)
                <p class="rating__count">{{ $beachcourt->ratingCount }} Bewertungen</p>
              @endif

              <a href="{{ URL::route('beachcourts.rate', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude) )}}" class="rating__count link-icon-text">
                <span class="link-icon-text__icon" data-feather="thumbs-up"></span><span class="link-icon-text__copy">Bewertung abgeben</span>
              </a>
            </div>
          </div>


          <div class="column column--12 column--m-3 -align-right">
              <favorite
              :beachcourt={{ $beachcourt->id }}
              :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}
              ></favorite>
            <!-- <a href="#" class="rating__count link-icon-text">
              <span class="link-icon-text__icon" data-feather="heart"></span><span class="link-icon-text__copy">zu Favoriten hinzufügen</span>
            </a> -->
          </div>
        </div>
        <div class="row">
          <div class="column column--6 column--s-3 -hidden--xxs">
            <p class="-typo-copy -text-color-gray-01 -spacing-b">
              <span class="-typo-copy--bold">Sand {{ $beachcourt->ratingSand }} von 34 Punkten</span>
              <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
            </p>
          </div>
          <div class="column column--6 column--s-3 -hidden--xxs">
            <p class="-typo-copy -text-color-gray-01 -spacing-b">
              <span class="-typo-copy--bold">Netz {{ $beachcourt->ratingNet }} von 28 Punkten</span>
              <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
            </p>
          </div>
          <div class="column column--6 column--s-3 -hidden--xxs">
            <p class="-typo-copy -text-color-gray-01 -spacing-b">
              <span class="-typo-copy--bold">Feld {{ $beachcourt->ratingCourt }} von 27 Punkten</span>
              <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
            </p>
          </div>
          <div class="column column--6 column--s-3 -hidden--xxs">
            <p class="-typo-copy -text-color-gray-01 -spacing-b">
              <span class="-typo-copy--bold">Umgebung {{ $beachcourt->ratingEnvironment }} von 11 Punkten</span>
              <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
              <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="column column--12 column--m-6 -spacing-a">
        <div class="image-slide">
            <div class="owl-carousel owl-carousel--detailpage">
              <img class="owl-lazy" data-src="/uploads/beachcourts/{{$beachcourt->id}}/slider/slide-image-01.jpg" data-src-retina="/uploads/beachcourts/{{$beachcourt->id}}/slider/slide-image-01-retina.jpg" alt="Beachvolleyballfeld in Tiefenbronn-Mühlhausen">
              <img class="owl-lazy" data-src="/uploads/beachcourts/{{$beachcourt->id}}/slider/slide-image-02.jpg" data-src-retina="/uploads/beachcourts/{{$beachcourt->id}}/slider/slide-image-02-retina.jpg" alt="Beachvolleyballfeld in Tiefenbronn-Mühlhausen">
              <img class="owl-lazy" data-src="/uploads/beachcourts/{{$beachcourt->id}}/slider/slide-image-03.jpg" data-src-retina="/uploads/beachcourts/{{$beachcourt->id}}/slider/slide-image-03-retina.jpg" alt="Beachvolleyballfeld in Tiefenbronn-Mühlhausen">
            </div>

            <span class="owl-navigation-item owl-navigation-item--left" data-feather="chevron-left"></span>
            <span class="owl-navigation-item owl-navigation-item--right" data-feather="chevron-right"></span>
        </div>
      </div>

      <div class="column column--12 column--m-6 -spacing-a">
        <h4 class="-typo-headline-04 -text-color-petrol">Kann ich auf diesem Feld kostenlos spielen?</h4>
        @if ($beachcourt->isChargeable == 1 )
          <p class="-typo-copy -text-color-gray-01 -spacing-b">Nein, das Spielen auf diesem Feld ist <span class="-typo-copy -typo-copy--bold">kostenpflichtig</span>. Die Preise dafür kannst du beim Betreiber in Erfahrung bringen.</p>
        @else
          <p class="-typo-copy -text-color-gray-01 -spacing-b">Ja, das Spielen auf diesem Feld ist <span class="-typo-copy -typo-copy--bold">kostenfrei</span>. Geh gleich los und spiele eine Runde oder zwei.</p>
        @endif

        <h4 class="-typo-headline-04 -text-color-petrol -spacing-a">Betreiber des Feldes</h4>
        <p class="-typo-copy -text-color-gray-01 -spacing-b">
          {{ $beachcourt->operator }}<br>
          <span class="-text-color-red">75233 Tiefenbronn-Mühlhausen</span>
        </p>
        <p class="-text-color-green -typo-copy -text-color-red">
          <a href="https://tsvmuehlhausen.de/" class="link-icon-text" target="_blank"><span data-feather="external-link" class="link-icon-text__icon"></span><span class="link-icon-text__copy">https://tsvmuehlhausen.de</span></a>
        </p>
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <div class="map">
          <iframe width="100%" height="450" frameborder="0" zoom="5" style="border:0" allowfullscreen src="https://maps.google.de/maps?q={{ $beachcourt->latitude }},{{ $beachcourt->longitude }}&hl=es;z=14&amp;output=embed"></iframe>
        </div>
      </div>
    </div>

  </div> <!-- .content__main ENDE -->
@endsection
