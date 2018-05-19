@extends('layouts.frontend')

@section('title_and_meta')
    <title>Suche | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
    <meta name="description" content="beachfelder.de ist die Beachvolleyballfeld-Suchmaschine mit der größten und umfangreichsten Datenbank an Feldern. Auf beachfelder.de kannst du deine Felder bewerten, dir Favoriten speichern und uns neue Beachvolleyballfelder vorschlagen." />
@endsection

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
                  <input type="text" name="postcode13" value="{{ $plz }}" class="input__field" placeholder="PLZ">
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
                <input type="hidden" class="input-toggle__hidden" name="isPublic" value="{{ $isPublic ?? 1 }}">
                <input type="checkbox"class="input-toggle__field public" name="isPublic" value="{{ $isPublic ?? 1 }}">
                <span class="input-toggle__switch"></span>
                <span class="input-toggle__label">frei zugänglich</span>
              </label>
            </div>
            <div class="column column--12 column--m-6">
              <label class="input-toggle -spacing-d">
                <input type="hidden" class="input-toggle__hidden" name="isChargeable" value="{{ $isChargeable ?? 0}}">
                <input type="checkbox" class="input-toggle__field chargeable" name="isChargeable" value="{{ $isChargeable ?? 0}}">

                <span class="input-toggle__switch"></span>
                <span class="input-toggle__label">kostenpflichtig</span>
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
        @if($beachcourt->distance <= $distance)
          <div class="column column--12 column--s-6 column--m-6 column--l-4 -spacing-b -flex">
            <div class="beachcourt-item">
              <div class="beachcourt-item__image">

                @if(is_dir(public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/')))
                  <figure class="progressive">
                    <img
                      class="progressive__img progressive--not-loaded"
                      data-progressive="{{url('/')}}/uploads/beachcourts/{{$beachcourt->id}}/slider/retina/slide-image-01-retina.jpg"
                      src="{{url('/')}}/uploads/beachcourts/{{$beachcourt->id}}/slider/standard/slide-image-01.jpg"
                    />
                  
                @else
                  <img class="progressive__img progressive--not-loaded" src="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=347x180&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" data-progressive="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=600x300&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" alt="Beachvolleyballfeld in {{$beachcourt->postalCode}} {{$beachcourt->city}}">
                  <!-- <div class="no-image-hint">
                    <h4 class="-typo-headline-04 -text-color-petrol">Noch kein Bild vorhanden.</h4>
                    <p class="-typo-copy -text-color-gray-01">
                      Hilf' uns und schicke uns welche von diesem Feld. 
                    </p>
                  </div> -->
                  </figure>
                @endif
                @if ($beachcourt->latitude != '')
                  <div class="beachcourt-item__distance">
                    <span class="beachcourt-item__icon" data-feather="navigation"></span>
                    <span class="beachcourt-item__paragraph">
                      
                      <?php  
                        $dis = number_format($beachcourt->distance, 1);
                        $dis = str_replace('.', ',', $dis);  
                        echo $dis; 
                      ?>                      

                    km entfernt</span>
                  </div>
                @endif
                @if (Auth::user())
                  <favorite
                      :beachcourt={{ $beachcourt->id }}
                      :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}
                  ></favorite>
                @endif
              </div>

              <div class="beachcourt-item__info">
                <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude)) }}" class="beachcourt-item__title">Beachvolleyballfeld in {{ $beachcourt->city }}</a>
                
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
                  <span class="icon-text__icon" data-feather="compass"></span>
                  <span class="icon-text__text">{{ $beachcourt->street }} {{ $beachcourt->houseNumber }}</span>
                </div>

                <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude,)) }}" class="button-primary -spacing-a"> <span class="button-primary__label">Mehr Details</span> <span class="button-primary__label button-primary__label--hover">Mehr Details</span>
                </a>
              </div>
            </div>
          </div>
        @endif
      @endforeach
    </div>
    
  </div> <!-- .content__main ENDE -->
@endsection

@push('scripts')
  <script>

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

     $('.public').click(function() {
      if($(this).is(':checked')) {
        // $(this).parent().find('.input-toggle__label').text('frei zugänglich');
        $(this).parent().find('.input-toggle__hidden').val(1);
        $(this).val(1);
        $(".button__accept").click();
      } else {
        // $(this).parent().find('.input-toggle__label').text('nicht frei zugänglich');
        $(this).parent().find('.input-toggle__hidden').val(0);
        $(this).val(0);
        $(".button__accept").click();
      }
    });

     $('.chargeable').click(function() {
      if($(this).is(':checked')) {
        // $(this).parent().find('.input-toggle__label').text('kostenpflichtig');
        $(this).parent().find('.input-toggle__hidden').val(1);
        $(this).val(1);
        $(".button__accept").click();
      } else {
        // $(this).parent().find('.input-toggle__label').text('nicht kostenpflichtig');
        $(this).parent().find('.input-toggle__hidden').val(0);
        $(this).val(0);
        $(".button__accept").click();
      }
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
