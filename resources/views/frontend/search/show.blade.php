@extends('layouts.frontend')

@section('content')
  <div class="content__main">
    <div class="row">
      <div class="column column--12">
        <h2 class="title-page__title">Dein Suchergebnis</h2>
      </div>
    </div>
    <form action="/search" method="POST" class="form--search">
      <div class="row  -spacing-b">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="column column--12 column--m-7">
          <div class="row">
            <div class="column column--12 column--s-6 column--m-3">
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
                  <span class="button-primary__label button-primary__label--hover">bestätigen</span>
                </button>
              </div>
            </div>

            <div class="column column--12 column--s-6 column--m-3">
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
                  <span class="button-primary__label button-primary__label--hover">bestätigen</span>
                </button>
              </div>
            </div>

            <div class="hint">
              <div class="hint__container">
                <img src="images/hint-search.png" class="hint__image">
              </div>
            </div>

            <div class="column column--12 column--s-6 column--m-3">
              <div class="icon-text icon-text--hoverable trigger-flyout">
                <span class="icon-text__icon" data-feather="award"></span>
                <span class="icon-text__text">mindestens<br><span class="output__value">{{ $ratingmin }}</span> Beachbälle</span>
              </div>
              <div class="flyout flyout--rating-search">
                <span class="flyout__icon" data-feather="x-circle"></span>
                <p class="-typo-copy -text-color-gray-01">Anzahl der Beachbälle ändern</p>
                <label class="input-range -spacing-b">
                  <input type="range" name="ratingmin" class="input-range__field" value="{{ $ratingmin }}" min="1" max="5">
                  <span class="input-range__value">1</span>
                </label>
                <button class="button-primary -spacing-b button__accept">
                  <span class="button-primary__label">bestätigen</span>
                  <span class="button-primary__label button-primary__label--hover">bestätigen</span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="column column--12 column--m-5">
          <div class="row">
            <div class="column column--12 column--m-6">
              <label class="input-toggle -spacing-d">
                <input type="hidden" class="input-toggle__hidden" name="isPublic" value="{{ $isPublic ?? '1' }}">
                <input type="checkbox" class="input-toggle__field public" name="isPublic" value="{{ $isPublic ?? '1' }}">
                <span class="input-toggle__switch"></span>
                <span class="input-toggle__label">frei zugänglich</span>
              </label>
            </div>
            <div class="column column--12 column--m-6">
              <label class="input-toggle -spacing-d">
                <input type="hidden" class="input-toggle__hidden" name="isChargeable" value="{{ $isChargeable ?? '0'}}">
                <input type="checkbox" class="input-toggle__field chargeable" name="isChargeable" value="{{ $isChargeable ?? '0'}}">
                <span class="input-toggle__switch"></span>
                <span class="input-toggle__label">nicht kostenpflichtig</span>
              </label>
            </div>
          </div>
          <!-- <button class="button-primary -spacing-b button__accept">
            <span class="button-primary__label">bestätigen</span>
            <span class="button-primary__label button-primary__label--hover">bestätigen</span>
          </button> -->
        </div>
      </div>
    </form>
    
    <div class="row">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>

    <div class="row -spacing-a -flex -flex--direction-row -flex--wrap">
      @foreach ($results as $beachcourt)
        <div class="column column--12 column--s-6 column--m-6 column--l-4 -spacing-b -flex">
          <div class="beachcourt-item">
            <div class="beachcourt-item__image">
              <figure class="progressive">
                <img class="progressive__img progressive--not-loaded" data-progressive="/uploads/beachcourts/{{$beachcourt->id}}/slider/slide-image-01-retina.jpg" src="/uploads/beachcourts/{{$beachcourt->id}}/slider/slide-image-01.jpg">
              </figure>
              <div class="beachcourt-item__distance">
                <span class="beachcourt-item__icon" data-feather="navigation"></span>
                <span class="beachcourt-item__paragraph">
                  <?php
                    $pi80 = M_PI / 180;
                    $lat1 = $latitude; $lat1 *= $pi80;
                    $lng1 = $longitude; $lng1 *= $pi80;
                    $lat2 = $beachcourt->latitude; $lat2 *= $pi80;
                    $lng2 = $beachcourt->longitude; $lng2 *= $pi80;
                    $r = 6372.797; // mean radius of Earth in km
                    $dlat = $lat2 - $lat1; $dlng = $lng2 - $lng1;
                    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
                    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
                    $dis = $r * $c * 0.621371192 * 2;
                    echo floor($dis);
                   ?>
                km entfernt</span>
              </div>
              @if (Auth::user())
                <favorite
                    :beachcourt={{ $beachcourt->id }}
                    :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}
                ></favorite>
              @endif
            </div>

            <div class="beachcourt-item__info">
              <h3 class="beachcourt-item__title">Beachvolleyballfeld in {{ $beachcourt->city }}</h3>
              <div class="icon-text beachcourt-item__rating -spacing-b">
                <span class="icon-text__icon" data-feather="award"></span>
                <span class="icon-text__text">Dieses Feld wurde mit <br> <span class="-typo-copy--bold">{{ $beachcourt->rating }}</span>/5 Bällen bewertet</span>
                <span class="beachcourt-item__info-icon" data-feather="info"></span>

                <div class="flyout beachcourt-item__info-flyout">
                  <span class="flyout__icon" data-feather="x-circle"></span>

                  <h4 class="-typo-headline-04 -text-color-gray-01">Wie bewerten wir?</h4>
                  <p class="-typo-copy -text-color-gray-01 -spacing-b">
                    <a href="#" class="link-text">Hier</a> kannst du mehr dafürber erfahren, wie wir die Beachvolleyballfelder bewerten.
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

              <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude,)) }}" class="button-primary -spacing-a"> <span class="button-primary__label">Mehr Details</span> <span class="button-primary__label button-primary__label--hover">Mehr Details</span>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div> <!-- .content__main ENDE -->
@endsection

@push('scripts')
  <script>

    $(document).ready(function() {
      var checkbox = $('.public');
      var checkboxchargeable = $('.chargeable');

      if(checkbox.val() == 1) {
        checkbox.attr('checked', true);
        checkbox.parent().find('.input-toggle__label').text('frei zugänglich');
      }
      if(checkboxchargeable.val() == 1) {
        checkboxchargeable.attr('checked', true);
        checkboxchargeable.parent().find('.input-toggle__label').text('kostenpflichtig');
      }
    });

     $('.public').click(function() {
      if($(this).is(':checked')) {
        $(this).parent().find('.input-toggle__label').text('frei zugänglich');
        $(this).parent().find('.input-toggle__hidden').val(1);
        $(this).val(1);
      } else {
        $(this).parent().find('.input-toggle__label').text('nicht frei zugänglich');
        $(this).parent().find('.input-toggle__hidden').val(0);
        $(this).val(0)
      }
    });

     $('.chargeable').click(function() {
      if($(this).is(':checked')) {
        $(this).parent().find('.input-toggle__label').text('kostenpflichtig');
        $(this).parent().find('.input-toggle__hidden').val(1);
        $(this).val(1);
      } else {
        $(this).parent().find('.input-toggle__label').text('nicht kostenpflichtig');
        $(this).parent().find('.input-toggle__hidden').val(0);
        $(this).val(0);
      }
    });

    $('input[type="checkbox"]').on('change', function() {
      $('.form--search').submit();
    });

    //grab the values of input slider
    var rangeSlider = function(){
      var slider = $('.input-range'),
          range = $('.input-range__field'),
          value = $('.input-range__value');

      slider.each(function(){

        value.each(function(){
          var value = $(this).prev().attr('value');
          $(this).html(value);
        });

        range.on('input', function(){
          $(this).next(value).html(this.value);
          $(this).attr({'value':parseInt(this.value)});
        });
      });
    };

    rangeSlider();
  </script>
@endpush
