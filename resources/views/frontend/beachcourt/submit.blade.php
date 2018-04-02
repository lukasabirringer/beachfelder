
@extends('layouts.frontend')

@section('content')
  <div class="content__main">
    <div class="row">
      <div class="column column--12">
        <h2 class="title-page__title">Beachvolleyballfeld einreichen</h2>
      </div>
    </div>

    @if (\Session::has('success'))
      <ul class="notification">
        <li class="notification__item">
          <span class="notification__icon" data-feather="info"></span>
          <p class="notification__text">{!! \Session::get('success') !!}</p>

          <button class="button-secondary notification__button close" data-dismiss="alert" aria-label="close">
            <span class="button-secondary__label">OK</span>
          </button>
        </li>
      </ul>
    @endif

    <div class="row -spacing-a">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>

    <div class="row -spacing-b">
      <div class="column column--12">
        <p class="-typo-copy -text-color-gray-01">
          Du hast ein Beachvolleyballfeld in deiner Nähe, dieses aber noch nicht auf <span class="-typo-copy--bold">beachfelder.de</span> gefunden?
        </p>
        <p class="-typo-copy -text-color-gray-01 -spacing-d">Dann hilf' uns doch einfach und reiche das Feld ein, damit wir es hier aufnehmen können. Somit hilfst du uns dabei, dass <span class="-typo-copy--bold">beachfelder.de</span> die größte und umfangreichste Suchmaschine für Beachvolleyballfelder wird.
        </p>

        <p class="-typo-copy -text-color-gray-01 -spacing-d">Du musst nicht alle Felder ausfüllen. Wichtig für uns sind allerdings die <span class="-typo-copy--bold">Koordinaten</span> des Feldes. Denn mit Hilfe dieser können wir das Feld bei unserer Recherche am Optimalsten orten.
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
        <h4 class="-typo-headline-04 -text-color-green">Allgemeines</h4>
      </div>
    </div>

    
    <form method="POST" action="{{ URL::route('beachcourtsubmit.store') }}" id="form--submit-beachcourt" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="row">
        <div class="column column--12">
          <label class="input" style="overflow: visible;">
            <input type="search" class="input__field" id="form-address" placeholder="Wo befindet sich das Feld?" />
            <span class="input__label">Wo befindet sich das Feld?</span>
            <div class="input__border"></div>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="row row--zero">
          <div class="column column--12 column--s-6 column--m-2 -spacing-a">
            <label class="input">
              <input type="text" name="postalCode" class="input__field" placeholder="Postleitzahl" id="form-zip">
              <span class="input__label">Postleitzahl</span>
              <div class="input__border"></div>
            </label>
            @if ($errors->has('postalCode'))
              <div class="alert alert-danger">{{ $errors->first('postalCode', ':message') }}</div>
            @endif
          </div>

          <div class="column column--12 column--s-6 column--m-4 -spacing-a">
            <label class="input">
              <input type="text" name="city" class="input__field" placeholder="Ort" id="form-city">
              <span class="input__label">Ort</span>
              <div class="input__border"></div>
            </label>
            @if ($errors->has('city'))
              <div class="alert alert-danger">{{ $errors->first('city', ':message') }}</div>
            @endif
          </div>

          <div class="column column--12 column--s-6 column--m-4 -spacing-a">
            <label class="input">
              <input type="text" name="street" class="input__field" placeholder="Straße" id="form-street">
              <span class="input__label">Straße</span>
              <div class="input__border"></div>
            </label>
            @if ($errors->has('street'))
              <div class="alert alert-danger">{{ $errors->first('street', ':message') }}</div>
            @endif
          </div>

          <div class="column column--12 column--s-6 column--m-2 -spacing-a">
            <label class="input">
              <input type="text" name="houseNumber" class="input__field" id="form-number" placeholder="Nr.">
              <span class="input__label">Nr.</span>
              <div class="input__border"></div>
            </label>
            @if ($errors->has('street'))
              <div class="alert alert-danger">{{ $errors->first('street', ':message') }}</div>
            @endif
          </div>
        </div>
      </div>
      <div class="row">
        <div class="column column--12 column--m-6 -spacing-b">

          <label class="input">
            <input type="text" id="form-state" class="input__field" name="state" placeholder="Bundesland">
            <span class="input__label">Bundesland</span>
            <div class="input__border"></div>
          </label>

          @if ($errors->has('state'))
            <div class="alert alert-danger">{{ $errors->first('state', ':message') }}</div>

          @endif
        </div>
        <div class="column column--12 column--m-6 -spacing-b">
          <label class="input">
            <input type="text" id="form-country" class="input__field" name="country" placeholder="Land">
            <span class="input__label">Land</span>
            <div class="input__border"></div>
          </label>

          @if ($errors->has('country'))
            <div class="alert alert-danger">{{ $errors->first('country', ':message') }}</div>

          @endif
        </div>
      </div>

      <div class="row">
        <div class="column column--12 column--m-6 -spacing-a">
          <label class="input">
            <input type="text" name="operator" class="input__field" placeholder="Betreiber des Feldes">
            <span class="input__label">Betreiber des Feldes</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('operator'))
          <div class="alert alert-danger">{{ $errors->first('operator', ':message') }}</div>
          @endif
        </div>

        <div class="column column--12 column--m-6 -spacing-a">
          <label class="input">
            <input type="url" name="operatorURL" class="input__field" placeholder="Website des Betreiber">
            <span class="input__label">Website des Betreiber</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('operatorURL'))
          <div class="alert alert-danger">{{ $errors->first('operatorURL', ':message') }}</div>
          @endif
        </div>

        <div class="row -spacing-a">
          <div class="column column--12">
            <h4 class="-typo-headline-04 -text-color-green">Das Feld</h4>
          </div>
        </div>
      <div class="row">
        <div class="column column--12 column--m-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Ist das Feld ein öffentliches?</p>
          <label class="input-toggle -spacing-d">

            <input type="hidden" class="input-toggle__hidden" name="isPublic" value="1">
            <input type="checkbox" class="input-toggle__field" name="isPublic" value="1">

            <span class="input-toggle__switch"></span>
            <span class="input-toggle__label">Nein</span>
            <input type="hidden" class="hidden" name="isPublic" value="0">
          </label>
          @if ($errors->has('isPublic'))
          <div class="alert alert-danger">{{ $errors->first('isPublic', ':message') }}</div>
          @endif
        </div>

        <div class="column column--12 column--m-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Kann man dort kostenlos spielen?</p>
          <label class="input-toggle -spacing-d">
            <input type="hidden" class="input-toggle__hidden" name="isChargeable" value="1">
            <input type="checkbox" class="input-toggle__field" name="isChargeable" value="1">

            <span class="input-toggle__switch"></span>
            <span class="input-toggle__label">Nein</span>
            <input type="hidden" class="hidden" name="isChargeable" value="0">
          </label>
          @if ($errors->has('isChargeable'))
          <div class="alert alert-danger">{{ $errors->first('isChargeable', ':message') }}</div>
          @endif
        </div>

      </div>

      <div class="row">
        <div class="column column--12 column--m-6 -spacing-a">

          <p class="-typo-copy -text-color-petrol">Wie viele Indoor-Felder gibt es an diesem Ort?</p>
          <label class="input-range -spacing-b">
            <input type="hidden" name="courtCountIndoor" class="input-range__hidden" value="0">
            <input type="range" name="courtCountIndoor" class="input-range__field" value="0" min="0" max="10">
            <span class="input-range__value">1</span>
          </label>
          @if ($errors->has('courtCountIndoor'))
          <div class="alert alert-danger">{{ $errors->first('courtCountIndoor', ':message') }}</div>
          @endif
        </div>

        <div class="column column--12 column--m-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Wie viele Outdoor-Felder gibt es an diesem Ort?</p>
          <label class="input-range -spacing-b">
            <input type="hidden" name="courtCountOutdoor" class="input-range__hidden" value="0">
            <input type="range" name="courtCountOutdoor" class="input-range__field" value="0" min="0" max="10">
            <span class="input-range__value">1</span>
          </label>
          @if ($errors->has('courtCountOutdoor'))
          <div class="alert alert-danger">{{ $errors->first('courtCountOutdoor', ':message') }}</div>
          @endif
        </div>
      </div>

      <div class="row">
        <div class="column column--12 column--m-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Wie ist der Breitengrad des Feldes?</p>
          <label class="input">
            <input type="text" name="latitude" class="input__field" placeholder="Breitengrad des Feldes">
            <span class="input__label">Breitengrad des Feldes</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('latitude'))
            <div class="alert alert-danger">{{ $errors->first('latitude', ':message') }}</div>
          @endif
        </div>

        <div class="column column--12 column--m-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Wie ist der Längengrad des Feldes?</p>
          <label class="input">
            <input type="text" name="longitude" class="input__field" placeholder="Längengrad des Feldes">
            <span class="input__label">Längengrad des Feldes</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('longitude'))
            <div class="alert alert-danger">{{ $errors->first('longitude', ':message') }}</div>
          @endif
        </div>
      </div>

      <div class="row -spacing-a">
        <div class="column column--12">
          <h4 class="-typo-headline-04 -text-color-green">Sonstiges</h4>
        </div>
      </div>

      <div class="column column--12 -spacing-a">
        <p class="-typo-copy -text-color-petrol">Hast du uns sonst noch etwas mitzuteilen?</p>
        <label class="textarea -spacing-b">
          <textarea name="notes" class="textarea__field"></textarea>
          <span class="textarea__label">Deine Nachricht an uns</span>
        </label>
        @if ($errors->has('notes'))
        <div class="alert alert-danger">{{ $errors->first('notes', ':message') }}</div>
        @endif
      </div>


        <div class="column column--12 column--m-5 -spacing-a">
          <a href="javascript:;" onclick="document.getElementById('form--submit-beachcourt').submit();" class="button-primary">
            <span class="button-primary__label">Feld einreichen</span>
            <span class="button-primary__label button-primary__label--hover">Feld einreichen</span>
          </a>
        </div>
      </div>
    </form>







    <div class="row -spacing-a">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <div class="accordion">
          <div class="accordion__title-bar">
            <a href="#tab1" class="accordion__title accordion__title--active">Meine eingereichten Felder</a>
          </div>
          <div id="first-tab-group">
            <div class="accordion__content" id="tab1">
              <ul class="list-beachcourt">
                @forelse ($submittedCourts as $submittedCourt)
                  <li class="list-beachcourt__item">
                    <div class="list-beachcourt__image">
                      @if ($submittedCourt->submitState === 'approved')
                        <figure class="progressive">
                          <img class="progressive__img progressive--not-loaded image image--max-width" data-progressive="{{ url('/') }}/uploads/beachcourts/{{$submittedCourt->id}}/slider/slide-image-01-retina.jpg" src="{{ url('') }}/uploads/beachcourts/{{$submittedCourt->id}}/slider/slide-image-01.jpg" alt="Feld in {{ $submittedCourt->city }}">
                        </figure>
                      @else
                        <figure class="progressive">
                          <img class="progressive__img progressive--not-loaded image image--max-width" data-progressive="{{ url('') }}/uploads/beachcourts/dummy-image-submitted-retina.jpg" src="{{ url('') }}/uploads/beachcourts/dummy-image-submitted.jpg">
                        </figure>
                      @endif
                    </div>
                    <div class="list-beachcourt__info">
                      <div class="row">
                        <div class="column column--12">
                          <h4 class="-typo-headline-04 -text-color-gray-01">Feld in {{ $submittedCourt->city }}</h4>
                        </div>
                      </div>

                      <div class="row -spacing-b">
                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="map-pin"></span>
                            <span class="icon-text__text">{{ $submittedCourt->postalCode }} {{ $submittedCourt->city }} <br>{{ $submittedCourt->street }} {{ $submittedCourt->houseNumber }}</span>
                          </div>
                        </div>

                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="navigation"></span>
                            <span class="icon-text__text">{{ $submittedCourt->longitude }}<br>{{ $submittedCourt->latitude }}</span>
                          </div>
                        </div>

                      </div>
                      <div class="row -spacing-b">
                        <div class="column column--12 column--m-6">
                          @if($submittedCourt->submitState === 'approved')
                            <span class="icon-text__icon" data-feather="check-circle"></span>
                            <span class="icon-text__text">Einreichungsstatus:<br>genehmigt</span>
                          @else
                            <span class="icon-text__icon" data-feather="clock"></span>
                            <span class="icon-text__text">Einreichungsstatus:<br>in Überprüfung</span>
                          @endif
                        </div>

                        @if ($submittedCourt->submitState === 'approved')
                          <div class="column column--12 column--m-6">
                            <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($submittedCourt->city),'latitude'=>$submittedCourt->latitude,'longitude'=>$submittedCourt->longitude)) }}" class="button-primary">
                              <span class="button-primary__label">Feld ansehen</span>
                              <span class="button-primary__label button-primary__label--hover">Feld ansehen</span>
                            </a>
                          </div>
                        @endif
                      </div>
                    </div>
                  </li>
                @empty
                  <p class="-typo-copy -typo-copy--bold -text-color-gray-01">Du hast noch keine Beachvolleyballfelder eingereicht.</p>
                  <p class="-typo-copy -text-color-green"><a href="{{ URL::route('beachcourtsubmit.submit') }}" class="link-text">Jetzt Feld einreichen</a></p>
                @endforelse
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- .content__main ENDE -->
@endsection


@push('scripts')
  <script>
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
          $(this).parent().find('.input-range__hidden').val(this.value);
        });
      });
    };

    rangeSlider();

    $('.input-toggle__field').click(function() {
      if($(this).val(0)) {
        $(this).parent().find('.input-toggle__label').text('Ja');

        $(this).parent().find('.input-toggle__hidden').val(0);
        $(this).val(0);
      } else {
        $(this).parent().find('.input-toggle__label').text('Nein');
        $(this).parent().find('.input-toggle__hidden').val(1);
        $(this).val(1);

      }
    });

    //tabs navigation
    $('.accordion__title').click(function(e){
      e.preventDefault();
        var $this = $(this),
            tabgroup = '#'+$this.parents('.accordion__title-bar').data('tabgroup'),
            target = $this.attr('href');

        $('.accordion__title').removeClass('accordion__title--active');

        $this.addClass('accordion__title--active');

        $(tabgroup).children('.accordion__content').hide();
        $(target).show();
    });

    $('.notification__button').click(function() {
      $(this).parent().parent('.notification').slideUp();
    });


    (function() {
      var placesAutocomplete = places({
        container: document.querySelector('#form-address'),
        type: 'address',
        countries: 'de',
        language: 'de_DE',
        templates: {
          value: function(suggestion) {
            return suggestion.name;
          }
        }
      });
      placesAutocomplete.on('change', function resultSelected(e) {

        var address = e.suggestion.name || '';
        var matches = address.split(/(\d+)/g);
        var fullAddress = address.replace(matches[1],"");
        var streetOnly = matches[0];
        var numberOnly = matches[1];

        document.querySelector('#form-street').value = streetOnly || '';
        document.querySelector('#form-number').value = numberOnly || '';
        document.querySelector('#form-state').value = e.suggestion.administrative || '';
        document.querySelector('#form-city').value = e.suggestion.city || '';
        document.querySelector('#form-country').value = e.suggestion.country || '';
        document.querySelector('#form-zip').value = e.suggestion.postcode || '';
      });
    })();
  </script>
@endpush
