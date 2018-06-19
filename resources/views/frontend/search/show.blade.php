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

    @include('frontend.reusable-includes.divider')
    
    <form action="/search" method="POST" class="form form--search">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
    	
    	@include('frontend.search.includes.sidebar-filter')

      <div class="row -spacing-b">
        
        <div class="column column--12 column--m-4">

          <p class="-typo-copy -text-color-gray-01">Deine PLZ</p>
          <label class="input">
          		<input type="search" name="postcode13" class="input__field" id="address-input-seachResults" placeholder="Deine PLZ" value="{{ $plz }}"/>
          		{{-- <input type="hidden" id="form-postcode13-searchResults" name="postcode13"> --}}
          		<input type="hidden" id="form-long-searchResults" name="long" value="{{$slong}}">
          	  <input type="hidden" id="form-lat-searchResults" name="lat" value="{{$slat}}">
          </label>
        </div>
        <div class="column column--12 column--m-4">
        	<p class="-typo-copy -text-color-gray-01">Entfernung in km</p>
					<label class="input-range -spacing-b">
	          <input type="range" name="distance" class="input-range__field" value="{{ $distance }}" min="0" max="50">
	          <span class="input-range__value">0</span>
	        </label>
        </div>
        <div class="column column--12 column--m-4">
        	<p class="-typo-copy -text-color-gray-01">Mindest-Bewertung (beachfelder.de-Bälle)</p>
					<label class="input-range -spacing-b">
            <input type="range" name="ratingmin" class="input-range__field" value="{{ $ratingmin }}" min="0" max="5">
            <span class="input-range__value">0</span>
          </label>
        </div>
       </div>
       <div class="row">
       	<div class="column column--12 -align-center -spacing-a">
       		<p class="-typo-copy -text-color-gray-01">
       			<a href="#" class="link-icon-text btn--more-filter -text-color-gray-01">
       				<span class="link-icon-text__icon" data-feather="filter"></span><span class="link-icon-text__copy">mehr Filter</span>
       			</a>	
       		</p>
       	</div>
       </div>
      <div class="row">
      	<div class="column column--m-4"></div>
      	<div class="column column--12 column--m-4 -spacing-c">
      		<button class="button-primary button__accept">
      		  <span class="button-primary__label">Suchen</span>
      		  <span class="button-primary__label button-primary__label--hover">Suchen</span>
      		</button>
      	</div>
      	<div class="column column--m-4"></div>
      </div>
    </form>

    <div class="row -spacing-a -flex -flex--direction-row -flex--wrap">
      @if ($results->isEmpty()) 
      	<div class="column column--12 -align-center">
      			<img src="{{url('/')}}/images/image-no-search-results.png" class="image">
      			<h3 class="-typo-headline-03 -text-color-green -spacing-b">Kein Treffer</h3>
      		  <p class="-typo-copy -text-color-gray-01 -spacing-c">Im gewählten Suchradius ist in unserer Datenbank leider kein Beachfeld mit den gewünschten Kriterien verzeichnet. </p>	
      		  <p class="-typo-copy -text-color-gray-01 -spacing-d">Bitte erweitere den Suchradius oder verändere deine Suchkriterien.</p>
      	</div>
      @endif
      @foreach ($results as $beachcourt)
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
                <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude)) }}" class="beachcourt-item__title">Beachfeld in {{ $beachcourt->city }}@if ($beachcourt->district != '')-{{ $beachcourt->district }}
                  @endif
                </a>
								
                @if ($beachcourt->bfdeRating)
                	<div class="rating -spacing-b">
                		@for ($i = 1; $i <= $beachcourt->bfdeRating; $i++)
                		  <div class="rating__item">
                		    <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                		  </div>
                		@endfor
                		<?php $starsLeft = 5 - $beachcourt->bfdeRating; ?>
                		@if (count($starsLeft) > 0)
	                    @for ($i = 1; $i <= $starsLeft; $i++)
	                    <div class="rating__item">
	                      <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
	                    </div>
	                    @endfor
	                    <p class="-typo-copy -typo-copy--small -text-color-gray-01 -text-color-gray-01">Vorläufige Bewertung von beachfelder.de</p>
	                  </div>
                  @endif

                @elseif ($beachcourt->ratingCount < 10)
                	<div class="rating -spacing-b">
	                	@for ($i = 1; $i <= 5; $i++)
	                		<div class="rating__item">
	                		  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
	                		</div>
	                	@endfor
	                	<p class="-typo-copy -typo-copy--small -text-color-gray-01 ">Momentan liegen noch zu wenige Bewertungen vor.</p>
                	</div>
                @else
                	@for ($i = 1; $i <= $beachcourt->rating; $i++)
	                	<div class="rating__item">
	                	  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
	                	</div>
	                @endfor
	                <?php $starsLeft = 5 - $beachcourt->rating; ?>
	                @if (count($starsLeft) > 0)
	                	@for ($i = 1; $i <= $starsLeft; $i++)
	                		<div class="rating__item">
	                		  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
	                		</div>
	                	@endfor
	                @endif

	              	<p class="-typo-copy -text-color-gray-01 -text-color-gray-0 -spacing-d">{{ $beachcourt->ratingCount }} Bewertungen</p>
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
      @endforeach
    </div>

    @include('frontend.reusable-includes.divider')

    @include('frontend.reusable-includes.teaser-contest')

    @include('frontend.reusable-includes.divider')
    
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

    $('.btn--more-filter, .icon--close').click(function(e) {
    	e.stopPropagation();
    	$('body').toggleClass('no-scroll');
    	$('.sidebar-filter').toggleClass('sidebar-filter--open');
    });

    $('.sidebar-filter').click( function(e) {
			e.stopPropagation();
		});

    $('body').click(function() {
    	$('.sidebar-filter').removeClass('sidebar-filter--open');
    	$('body').removeClass('no-scroll');
    });

    $('.button__reset').click(function() {
    	$('input[type="radio"]').attr('checked', false) ;
    	$('.form--search').submit();
    	$('body').removeClass('no-scroll');
    });
    
  </script>
@endpush
