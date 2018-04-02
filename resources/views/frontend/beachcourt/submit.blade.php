
@extends('layouts.frontend')

@section('content')
  <div class="content__main">
    <div class="row">
      <div class="column column--12">
        <h2 class="title-page__title">Beachvolleyballfeld einreichen</h2>
      </div>
    </div>

    @if (\Session::has('success'))
      <div class="alert alert-success">
        <ul>
          <li>{!! \Session::get('success') !!}</li>
        </ul>
      </div>
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
        <p class="-typo-copy -text-color-gray-01 -spacing-d">Dann hilf' uns doch einfach und reiche das Feld ein, damit wir es hier aufnehmen können. Somit hilfst du uns dabei, dass <span class="-typo-copy--bold">beachfelder.de</span> die größste und umfangreichste Suchmaschine für Beachvolleyballfelder wird.
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

    <div class="row -spacing-b">
      <form method="POST" action="{{ URL::route('beachcourtsubmit.store') }}" id="form--submit-beachcourt" enctype="multipart/form-data">
      {{ csrf_field() }}

        <div class="column column--12 column--s-6 -spacing-b">
          <p class="-typo-copy -text-color-petrol">Bitte gib' die Postleitzahl des Feldes an.</p>
          <label class="input">
            <input type="text" name="postalCode" class="input__field" placeholder="Postleitzahl">
            <span class="input__label">Postleitzahl</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('postalCode'))
          <div class="alert alert-danger">{{ $errors->first('postalCode', ':message') }}</div>
          @endif
        </div>

        <div class="column column--12 column--s-6 -spacing-b">
          <p class="-typo-copy -text-color-petrol">In welcher Straße befindet sich das Feld?</p>
          <label class="input">
            <input type="text" name="street" class="input__field" placeholder="Straße">
            <span class="input__label">Straße</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('street'))
          <div class="alert alert-danger">{{ $errors->first('street', ':message') }}</div>
          @endif
        </div>

        <div class="column column--12 column--s-6 -spacing-b">
          <p class="-typo-copy -text-color-petrol">Wer ist der Betreiber des Feldes?</p>
          <label class="input">
            <input type="text" name="operator" class="input__field" placeholder="Stadt, Gemeinde oder Verein">
            <span class="input__label">Stadt, Gemeinde oder Verein</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('operator'))
          <div class="alert alert-danger">{{ $errors->first('operator', ':message') }}</div>
          @endif
        </div>

        <div class="column column--12 column--s-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Wie lautet die Website des Betreibers?</p>
          <label class="input">
            <input type="url" name="operatorURL" class="input__field" placeholder="Gib' hier die URL an">
            <span class="input__label">Gib' hier die URL an</span>
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
        <div class="column column--12 column--s-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Ist das Feld frei zugänglich?</p>
          <label class="input-toggle -spacing-d">
            <input type="checkbox" class="input-toggle__field" value="0">
            <span class="input-toggle__switch"></span>
            <span class="input-toggle__label">Nein</span>
            <input type="hidden" class="hidden" name="isPublic" value="0">
          </label>
          @if ($errors->has('isPublic'))
          <div class="alert alert-danger">{{ $errors->first('isPublic', ':message') }}</div>
          @endif
        </div>
        <div class="column column--12 column--s-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Ist der Zugang zum Feld kostenlos?</p>
          <label class="input-toggle -spacing-d">
            <input type="checkbox" class="input-toggle__field" value="0">
            <span class="input-toggle__switch"></span>
            <span class="input-toggle__label">Nein</span>
            <input type="hidden" class="hidden" name="isChargeable" value="0">
          </label>
          @if ($errors->has('isChargeable'))
          <div class="alert alert-danger">{{ $errors->first('isChargeable', ':message') }}</div>
          @endif
        </div>
        <div class="column column--12 column--s-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Bitte gib' den Breitengrad des Feldes an.</p>
          <label class="input">
            <input type="text" name="latitude" class="input__field" placeholder="Breitengrad des Feldes">
            <span class="input__label">Breitengrad des Feldes</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('latitude'))
          <div class="alert alert-danger">{{ $errors->first('latitude', ':message') }}</div>
          @endif
        </div>
        <div class="column column--12 column--s-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Bitte gib' den Längengrad des Feldes an.</p>
          <label class="input">
            <input type="text" name="longitude" class="input__field" placeholder="Längengrad des Feldes">
            <span class="input__label">Längengrad des Feldes</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('longitude'))
          <div class="alert alert-danger">{{ $errors->first('longitude', ':message') }}</div>
          @endif
        </div>
        <div class="column column--12 column--s-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Wie viele Indoor-Felder gibt es an diesem Ort?</p>
          <label class="input-range -spacing-b">
            <input type="range" name="courtCountIndoor" class="input-range__field" value="0" min="0" max="10">
            <span class="input-range__value">1</span>
          </label>
          @if ($errors->has('courtCountIndoor'))
          <div class="alert alert-danger">{{ $errors->first('courtCountIndoor', ':message') }}</div>
          @endif
        </div>

        <div class="column column--12 column--s-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Wie viele Outdoor-Felder gibt es an diesem Ort?</p>
          <label class="input-range -spacing-b">
            <input type="range" name="courtCountOutdoor" class="input-range__field" value="0" min="0" max="10">
            <span class="input-range__value">1</span>
          </label>
          @if ($errors->has('courtCountOutdoor'))
          <div class="alert alert-danger">{{ $errors->first('courtCountOutdoor', ':message') }}</div>
          @endif
        </div>
      </div>

      <div class="row -spacing-a row--fullwidth">
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

      <div class="column column--12 column--m-7"></div>

      <div class="column column--12 column--m-5 -spacing-a">
        <a href="javascript:;" onclick="document.getElementById('form--submit-beachcourt').submit();" class="button-primary">
          <span class="button-primary__label">Feld einreichen</span>
          <span class="button-primary__label button-primary__label--hover">Feld einreichen</span>
        </a>
      </div>

      </form>
    </div>






    <div class="row -spacing-a">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <div class="accordion">
          <div class="accordion__title-bar">
            <h4 class="accordion__title accordion__title--active">Meine eingereichten Felder</h4>
          </div>
          <div class="accordion__content">
            <ul class="list-beachcourt">
              @forelse ($submittedCourts as $submittedCourt)
              <li class="list-beachcourt__item">
                    <div class="list-beachcourt__image">
                      @if ($submittedCourt->submitState === 'approved')
                      <img
                        src="{{ url('') }}/uploads/beachcourts/{{$submittedCourt->id}}/slider/slide-image-01-retina.jpg"
                        srcset="{{ url('/') }}/uploads/beachcourts/{{$submittedCourt->id}}/slider/slide-image-01-retina.jpg 2x"
                        alt="Feld in {{ $submittedCourt->city }}" class="image image--max-height">
                        @else
                      <img
                        src="{{ url('') }}/images/dummy-01-retina.jpg"
                        srcset="{{ url('') }}/images/dummy-01-retina.jpg"
                        alt="Feld in {{ $submittedCourt->city }}" class="image image--max-height">
                        @endif
                    </div>
                    <div class="list-beachcourt__info">
                      <div class="row">
                        <div class="column column--12">
                          <h4 class="-typo-headline-04 -text-color-gray-01">Feld in {{ $submittedCourt->city }}</h4>
                        </div>
                      </div>

                      <div class="row  -spacing-b">
                        <div class="column column--12">
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

                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="info"></span>
                            <span class="icon-text__text">Einreichungsstatus: {{ $submittedCourt->submitState }}</span>
                          </div>
                        </div>
                      </div>
                      @if ($submittedCourt->submitState === 'approved')
                      <div class="row -spacing-b">
                        <div class="column column--12 column--s-5">

                          <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($submittedCourt->city),'latitude'=>$submittedCourt->latitude,'longitude'=>$submittedCourt->longitude)) }}" class="button-primary">
                            <span class="button-primary__label">Feld ansehen</span>
                            <span class="button-primary__label button-primary__label--hover">Feld ansehen</span>
                          </a>
                        </div>
                      </div>
                      @endif
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
        });
      });
    };

    rangeSlider();

    $('.input-toggle__field').click(function() {
      if($(this).val(0)) {
        $(this).parent().find('.input-toggle__label').text('Ja');
        $(this).val(1);
        $(this).parent().find('.hidden').val($(this).val());
      } else if ($(this).val(1)) {
        $(this).parent().find('.input-toggle__label').text('Nein');
        $(this).val(0);
        $(this).parent().find('.hidden').val($(this).val());
      }
    });
  </script>
@endpush
