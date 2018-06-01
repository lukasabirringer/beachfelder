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

    <div class="row">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>
    
    <form action="/search" method="POST" class="form form--search">
      <div class="row -spacing-b">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="column column--12 column--m-4">
        	<!-- <p class="-typo-copy -text-color-gray-01">Deine PLZ</p> -->
        	<input type="search" class="input__field" id="address-input-seachResults" placeholder="Deine PLZ" value=" {{ $plz }}"/>
        	<input type="hidden" id="form-postcode13-searchResults" name="postcode13">
        	<input type="hidden" id="form-long-searchResults" name="long">
          <input type="hidden" id="form-lat-searchResults" name="lat">
        	<span class="input__icon" data-feather="search" onclick="document.querySelector('.form--search').submit();"></span>
        	<span class="input__label">Deine PLZ</span>
        	
        	<!-- <label class="input">
        		<input type="text" name="postcode13" value="{{ $plz }}" class="input__field" placeholder="PLZ" />
        		<span class="input__icon" data-feather="map-pin"></span>
        		<span class="input__label">PLZ</span>
        	</label> -->
        </div>
        <div class="column column--12 column--m-4">
        	<p class="-typo-copy -text-color-gray-01">Entfernung in km</p>
					<label class="input-range -spacing-b">
	          <input type="range" name="distance" class="input-range__field" value="{{ $distance }}" min="0" max="100">
	          <span class="input-range__value">0</span>
	        </label>
        </div>
        <div class="column column--12 column--m-4">
        	<p class="-typo-copy -text-color-gray-01">Anzahl der Bälle</p>
					<label class="input-range -spacing-b">
            <input type="range" name="ratingmin" class="input-range__field" value="{{ $ratingmin }}" min="0" max="5">
            <span class="input-range__value">0</span>
          </label>
        </div>
       </div>
       <div class="row">
       	<div class="column column--12 -spacing-b">
       		<ul class="accordion-vertical">
       			<li class="accordion-vertical__item">
       				<a href="#" class="accordion-vertical__title">Mehr Optionen <span class="accordion-vertical__icon" data-feather="chevron-down"></span></a>
							<div class="accordion-vertical__content row">
								<div class="column column--12 column--s-6 column--m-3">
									<label class="input-radio-icon -spacing-b">
									  <input type="radio" class="input-radio-icon__field" name="filter" value="public" {{ $filter == 'public' ? 'checked' : '' }}>
									  <div class="input-radio-icon__container">
									    <span class="input-radio-icon__label">öffentlich</span>
									  </div>
									</label>
								</div>
								<div class="column column--12 column--s-6 column--m-3">
									<label class="input-radio-icon -spacing-b">
									  <input type="radio" class="input-radio-icon__field" name="filter" value="facilities" {{ $filter == 'facilities' ? 'checked' : '' }}>
									  <div class="input-radio-icon__container">
									    <span class="input-radio-icon__label">in Einrichtungen</span>
									  </div>
									</label>
								</div>
								<div class="column column--12 column--s-6 column--m-3">
									<label class="input-radio-icon -spacing-b">
									  <input type="radio" class="input-radio-icon__field" name="filter" value="free" {{ $filter == 'free' ? 'checked' : '' }}>
									  <div class="input-radio-icon__container">
									    <span class="input-radio-icon__label">komplett kostenfrei</span>
									  </div>
									</label>
								</div>
							</div>
       			</li>
       		</ul>
       	</div>
       </div>
       <div class="row">
       	<!-- <div class="column column--12 column--s-6 column--m-3">
       		<button class="button-primary -spacing-a button__accept">
       		  <span class="button-primary__label">Suchen</span>
       		  <span class="button-primary__label button-primary__label--hover">Suchen</span>
       		</button>
       	</div> -->
      </div><!-- .row ENDE -->
    </form>

    <div class="row -spacing-a -flex -flex--direction-row -flex--wrap">
      @if ($results->isEmpty()) 
      	<div class="column column--12 -align-center">
      			<img src="{{url('/')}}/images/image-no-search-results.png" class="image">
      			<h3 class="-typo-headline-03 -text-color-green">Tut uns leid</h3>
      		  <p class="-typo-copy -text-color-gray-01 -spacing-c">Im gewählten Suchumkreis ist bisher kein Beachfeld verzeichnet.</p>	
      		  <p class="-typo-copy -text-color-gray-01 -spacing-d">
      		  	Bitte vergrößere den Suchumkreis und wiederhole die Suche.
      		  </p>
      	</div>
      @endif
      @foreach ($results as $beachcourt)
        @if($beachcourt->distance <= $distance)
          <div class="column column--12 column--s-6 column--m-6 column--l-4 -spacing-b -flex">
            <div class="beachcourt-item">
              <div class="beachcourt-item__image">

                @if(is_dir(public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/')))
                  <figure class="progressive">
                    <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude,)) }}">
                      <img
                        class="progressive__img progressive--not-loaded"
                        data-progressive="{{url('/')}}/uploads/beachcourts/{{$beachcourt->id}}/slider/retina/slide-image-01-retina.jpg"
                        src="{{url('/')}}/uploads/beachcourts/{{$beachcourt->id}}/slider/standard/slide-image-01.jpg"
                      />
                    </a>
                  
                @else
                  <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude,)) }}" >
                    <img class="progressive__img progressive--not-loaded" src="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=347x180&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" data-progressive="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=600x300&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" alt="Beachvolleyballfeld in {{$beachcourt->postalCode}} {{$beachcourt->city}}">
                  </a>
                  </figure>
                @endif
                @if ($beachcourt->latitude != '')
                  <div class="beachcourt-item__distance">
                    <span class="beachcourt-item__icon" data-feather="navigation"></span>
                    <span class="beachcourt-item__paragraph">
                     <?php
                      $dist = number_format($beachcourt->distance, 1);
                      $dist = str_replace('.', ',', $dist);
                      echo $dist; 
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
                <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude)) }}" class="beachcourt-item__title">Beachfeld in {{ $beachcourt->city }} 
                  @if ($beachcourt->district != '') 
                    - {{ $beachcourt->district }}
                  @endif
                </a>
                
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
        $(this).parent().find('.input-toggle__label').text('frei zugänglich');
        $(this).parent().find('.input-toggle__hidden').val(1);
        $(this).val(1);
        $(".button__accept").click();
      } else {
        $(this).parent().find('.input-toggle__label').text('nicht frei zugänglich');
        $(this).parent().find('.input-toggle__hidden').val(0);
        $(this).val(0);
        $(".button__accept").click();
      }
    });

     $('.chargeable').click(function() {
      if($(this).is(':checked')) {
        $(this).parent().find('.input-toggle__label').text('kostenpflichtig');
        $(this).parent().find('.input-toggle__hidden').val(1);
        $(this).val(1);
        $(".button__accept").click();
      } else {
        $(this).parent().find('.input-toggle__label').text('nicht kostenpflichtig');
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


    var allPanels = $('.accordion-vertical__content').hide();
    	    
    $('.accordion-vertical__title').click(function() {
    	allPanels.slideUp();
      $(this).next().slideDown();
      return false;
    });

    $('input').on('change', function() {
    	$('.form--search').submit();
    });

    var placesAutocompleteSearchResults = places({
      type: 'city',
      countries: 'de',
      language: 'de_DE',
      useDeviceLocation: true,
      container: document.querySelector('#address-input-seachResults')
    });

    $('#address-input-seachResults').on('keyup', function() {
    
      var input = document.querySelector("#address-input-seachResults");
      var soll = document.querySelector("#form-postcode13");
      
      if (isNaN(input.value) || input.value.length > 6){
          placesAutocompleteSearchResults.on('change', function(e) {
              document.querySelector('#form-postcode13-searchResults').value = e.suggestion.postcode || '';
              document.querySelector('#form-lat-searchResults').value = e.suggestion.latlng.lat || '';
              document.querySelector('#form-long-searchResults').value = e.suggestion.latlng.lng || '';     
          });
        } else {
              soll.value = input.value;
            placesAutocompleteSearchResults.on('change', function(e) {
              document.querySelector('#form-lat-searchResults').value = e.suggestion.latlng.lat || '';
              document.querySelector('#form-long-searchResults').value = e.suggestion.latlng.lng || ''; 
          });
        }
    });
    
  </script>
@endpush
