
@extends('layouts.frontend')

@section('title_and_meta')
    <title>Bewerte dieses Feld | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
    <meta name="description" content="beachfelder.de ist die Beachvolleyballfeld-Suchmaschine mit der größten und umfangreichsten Datenbank an Feldern. Auf beachfelder.de kannst du deine Felder bewerten, dir Favoriten speichern und uns neue Beachvolleyballfelder vorschlagen." />
@endsection

@section('content')

<div class="content__main">
  <div class="row">
    @if (\Session::has('success'))
      <ul class="notification">
        <li class="notification__item">
          <span class="notification__icon" data-feather="info"></span>
          <p class="notification__text">{!! \Session::get('success') !!}</p>

          <button class="button-secondary notification-button close" data-dismiss="alert" aria-label="close">
            <span class="button-secondary__label notification-button__label">OK</span>
          </button>
        </li>
      </ul>
    @endif
    <div class="column column--xxs-12 column--xs-4 column--s-6 column--m-4">
      @if(is_dir(public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/')))
        <figure class="progressive">
          <img class="progressive__img progressive--not-loaded image image--max-width" data-progressive="{{ url('/') }}/uploads/beachcourts/{{$beachcourt->id}}/slider/retina/slide-image-01-retina.jpg" src="{{ url('/') }}//uploads/beachcourts/{{$beachcourt->id}}/slider/standard/slide-image-01.jpg">
        </figure>
      @else 
        <img class="progressive__img" src="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=347x180&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" data-progressive="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=600x300&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" alt="Beachvolleyballfeld in {{$beachcourt->postalCode}} {{$beachcourt->city}}">
      @endif
    </div>
    <div class="column column--xxs-12 column--xs-8 column--s-6 column--m-8">

      <h2 class="title-page__title">Bewerte das Beachvolleyballfeld</h2>
      <h4 class="title-page__subtitle">
      	in {{ $beachcourt->city }}
      	@if($beachcourt->district)
      		- {{ $beachcourt->district }}
      	@endif
      </h4>

      <div class="row">
        <div class="column column--12 column--m-4">
          <div class="icon-text -spacing-b">
            <span class="icon-text__icon" data-feather="map-pin"></span>
            <span class="icon-text__text">
            	{{ $beachcourt->postalCode }} {{ $beachcourt->city }} <br>
            	{{ $beachcourt->street }} {{ $beachcourt->houseNumber }}
            </span>
          </div>
        </div>
        <div class="column column--12 column--m-4">
          <div class="icon-text -spacing-b">
            <span class="icon-text__icon" data-feather="navigation"></span>
            <span class="icon-text__text">{{ $beachcourt->latitude }}<br>{{ $beachcourt->longitude }}</span>
          </div>
        </div>
        <div class="column column--12 column--m-4">
          <div class="icon-text -spacing-b">
            <span class="icon-text__icon" data-feather="info"></span>
            <span class="icon-text__text">
            	Felder outdoor: {{ $beachcourt->courtCountOutdoor }}<br>
            	Felder indoor: {{ $beachcourt->courtCountIndoor }}</span>
          </div>
        </div>
      </div>
      <p class="-typo-copy -typo-copy--small -text-color-gray-01 -spacing-c">
        Wieder das Feld anschauen? Dann gehe
        <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude,)) }}" class="link-text">zurück</a>
        </a>
      </p>
      
    </div>
  </div>

  @include('frontend.reusable-includes.divider')

  <div class="row">
    <form action="{{ url('/rating/new') }}" method="POST" class="form-rating" id="form-rating" enctype="multipart/form-data" novalidate="novalidate">
      {{ csrf_field() }}
      <input type="hidden" value="{{ $beachcourt->id }}" content="text" name="beachcourtname">

      <div class="tab tab--active -spacing-a" id="tab-01">
        @include('frontend.beachcourt.ratingSteps.ratingStep-1')

        @if (Auth::check())
      	  <div class="column column--12 column--m-6 -spacing-b">
      	    <button type="button" id="prevBtn" class="button-primary button-primary--dark-gray prevBtn">
      	      <span class="button-primary__label">Schritt zurück</span>
      	      <span class="button-primary__label button-primary__label--hover">Schritt zurück</span>
      	    </button>
      	  </div>
      	  
      	  <div class="column column--12 column--m-6 -spacing-b">
      	    <button type="button" id="nextBtn" class="button-primary nextBtn">
      	      <span class="button-primary__label">Schritt weiter</span>
      	      <span class="button-primary__label button-primary__label--hover">Schritt weiter</span>
      	    </button>
      	  </div>
      	  @else 
	      	  <div class="column column--12 column--m-6 -spacing-b">
	      	  	
	      	  </div>
	      	  <div class="column column--12 column--m-6 -spacing-b">
	      	  	<button type="button" id="nextBtn" class="button-primary nextBtn" disabled="disabled">
	      	  	  <span class="button-primary__label">Schritt weiter</span>
	      	  	  <span class="button-primary__label button-primary__label--hover">Schritt weiter</span>
	      	  	</button>
	      	  	<p class="-typo-copy -text-color-gray-01 -spacing-b">Um ein Feld zu bewerten, musst du dich zuvor als User registrieren und angemeldet sein. <a class="link-text" href="{{ route('register') }}">Registriere dich hier</a> oder <a class="link-text" href="{{ route('login') }}">melde dich an.</a></p>	
	      	  	
	      	  </div>
      	  @endif
      </div> <!-- .tab #sand ENDE -->

      <div class="tab -spacing-a" id="tab-02">
        @include('frontend.beachcourt.ratingSteps.ratingStep-2')

        @if (Auth::check())
      	  <div class="column column--12 column--m-6 -spacing-b">
      	    <button type="button" id="prevBtn" class="button-primary button-primary--dark-gray prevBtn">
      	      <span class="button-primary__label">Schritt zurück</span>
      	      <span class="button-primary__label button-primary__label--hover">Schritt zurück</span>
      	    </button>
      	  </div>
      	  
      	  <div class="column column--12 column--m-6 -spacing-b">
      	    <button type="button" id="nextBtn" class="button-primary nextBtn">
      	      <span class="button-primary__label">Schritt weiter</span>
      	      <span class="button-primary__label button-primary__label--hover">Schritt weiter</span>
      	    </button>
      	  </div>
      	  @else 
	      	  <div class="column column--12 column--m-6 -spacing-b">
	      	  	
	      	  </div>
	      	  <div class="column column--12 column--m-6 -spacing-b">
	      	  	<button type="button" id="nextBtn" class="button-primary nextBtn" disabled="disabled">
	      	  	  <span class="button-primary__label">Schritt weiter</span>
	      	  	  <span class="button-primary__label button-primary__label--hover">Schritt weiter</span>
	      	  	</button>
	      	  	<p class="-typo-copy -text-color-gray-01 -spacing-b">Um ein Feld zu bewerten, musst du dich zuvor als User registrieren und angemeldet sein. <a class="link-text" href="{{ route('register') }}">Registriere dich hier</a> oder <a class="link-text" href="{{ route('login') }}">melde dich an.</a></p>	
	      	  	
	      	  </div>
      	  @endif
      </div> <!-- .tab #net ENDE -->

      <div class="tab -spacing-a" id="tab-03">
        @include('frontend.beachcourt.ratingSteps.ratingStep-3')

        @if (Auth::check())
      	  <div class="column column--12 column--m-6 -spacing-b">
      	    <button type="button" id="prevBtn" class="button-primary button-primary--dark-gray prevBtn">
      	      <span class="button-primary__label">Schritt zurück</span>
      	      <span class="button-primary__label button-primary__label--hover">Schritt zurück</span>
      	    </button>
      	  </div>
      	  
      	  <div class="column column--12 column--m-6 -spacing-b">
      	    <button type="button" id="nextBtn" class="button-primary nextBtn">
      	      <span class="button-primary__label">Schritt weiter</span>
      	      <span class="button-primary__label button-primary__label--hover">Schritt weiter</span>
      	    </button>
      	  </div>
      	  @else 
	      	  <div class="column column--12 column--m-6 -spacing-b">
	      	  	
	      	  </div>
	      	  <div class="column column--12 column--m-6 -spacing-b">
	      	  	<button type="button" id="nextBtn" class="button-primary nextBtn" disabled="disabled">
	      	  	  <span class="button-primary__label">Schritt weiter</span>
	      	  	  <span class="button-primary__label button-primary__label--hover">Schritt weiter</span>
	      	  	</button>
	      	  	<p class="-typo-copy -text-color-gray-01 -spacing-b">Um ein Feld zu bewerten, musst du dich zuvor als User registrieren und angemeldet sein. <a class="link-text" href="{{ route('register') }}">Registriere dich hier</a> oder <a class="link-text" href="{{ route('login') }}">melde dich an.</a></p>	
	      	  	
	      	  </div>
      	  @endif
      </div> <!-- .tab #playground ENDE -->

      <div class="tab -spacing-a" id="tab-04">
        @include('frontend.beachcourt.ratingSteps.ratingStep-4')

        @if (Auth::check())
      	  <div class="column column--12 column--m-6 -spacing-b">
      	    <button type="button" id="prevBtn" class="button-primary button-primary--dark-gray prevBtn">
      	      <span class="button-primary__label">Schritt zurück</span>
      	      <span class="button-primary__label button-primary__label--hover">Schritt zurück</span>
      	    </button>
      	  </div>
      	  
      	  <div class="column column--12 column--m-6 -spacing-b">
      	    <button type="button" id="nextBtn" class="button-primary nextBtn">
      	      <span class="button-primary__label">Schritt weiter</span>
      	      <span class="button-primary__label button-primary__label--hover">Schritt weiter</span>
      	    </button>
      	  </div>
      	  @else 
	      	  <div class="column column--12 column--m-6 -spacing-b">
	      	  	
	      	  </div>
	      	  <div class="column column--12 column--m-6 -spacing-b">
	      	  	<button type="button" id="nextBtn" class="button-primary nextBtn" disabled="disabled">
	      	  	  <span class="button-primary__label">Schritt weiter</span>
	      	  	  <span class="button-primary__label button-primary__label--hover">Schritt weiter</span>
	      	  	</button>
	      	  	<p class="-typo-copy -text-color-gray-01 -spacing-b">Um ein Feld zu bewerten, musst du dich zuvor als User registrieren und angemeldet sein. <a class="link-text" href="{{ route('register') }}">Registriere dich hier</a> oder <a class="link-text" href="{{ route('login') }}">melde dich an.</a></p>	
	      	  	
	      	  </div>
      	  @endif
      </div> <!-- .tab #environment ENDE -->
      <div class="tab -spacing-a" id="tab-05">
      	  @include('frontend.beachcourt.ratingSteps.ratingStep-5')

      	  @if (Auth::check())
      	  <div class="column column--12 column--m-6 -spacing-b">
      	    <button type="button" id="prevBtn" class="button-primary button-primary--dark-gray prevBtn">
      	      <span class="button-primary__label">Schritt zurück</span>
      	      <span class="button-primary__label button-primary__label--hover">Schritt zurück</span>
      	    </button>
      	  </div>
      	  
      	  <div class="column column--12 column--m-6 -spacing-b">
      	    <button type="submit" class="button-primary">
      	      <span class="button-primary__label">Bewertung abgeben</span>
      	      <span class="button-primary__label button-primary__label--hover">Bewertung abgeben</span>
      	    </button>
      	  </div>
      	  @else 
	      	  <div class="column column--12 column--m-6 -spacing-b">
	      	  	
	      	  </div>
	      	  <div class="column column--12 column--m-6 -spacing-b">
	      	  	<button type="button" class="button-primary " disabled="disabled">
	      	  	  <span class="button-primary__label">Bewertung abgeben</span>
	      	  	  <span class="button-primary__label button-primary__label--hover">Bewertung abgeben</span>
	      	  	</button>
	      	  	<p class="-typo-copy -text-color-gray-01 -spacing-b">Um ein Feld zu bewerten, musst du dich zuvor als User registrieren und angemeldet sein. <a class="link-text" href="{{ route('register') }}">Registriere dich hier</a> oder <a class="link-text" href="{{ route('login') }}">melde dich an.</a></p>	
	      	  	
	      	  </div>
      	  @endif
      </div> <!-- .tab #security ENDE -->
    </form>
  </div><!-- .row ENDE -->
</div><!-- .content__main ENDE -->
@endsection

@push('scripts')
  <script>
  	function updateParentState( clicked_radio_field ) {  
  	  var this_radio_group = clicked_radio_field.parent().parent().parent();

  	  this_radio_group.data('valide', 'true')  
  	}

  	function nextTab( this_tab, next_tab ) {
  	  var error = [];
  	  $( this_tab ).children().children('.group-rate').each(function( index ) {

  	    if ( $( this ).data('valide') == false ) {
  	        error.push( $( this ) );
  	    }    
  	    $( this ).removeClass( "group-rate--error" );
  	    $( this ).find(".group-rate--hint").hide();
  	  });
  	  if ( error == '' ){
  	    error = 'Keine Fehler gefunden!';
  	    if ( this_tab.attr('id') == $('.tab').last().attr('id') ) {
  	        $( this_tab ).removeClass( "tab--active" );
  	    } else {
  	       $( this_tab ).removeClass( "tab--active" );
  	       $( next_tab ).addClass( "tab--active" );
  	    }
  	    
  	    
  	  } else {
  	    $.each( error, function() {
  	      $( this ).addClass( "group-rate--error" );
  	      $( this ).find(".group-rate--hint").show();
  	    });
  	  }
  	}

  	function prevTab (this_tab, prev_tab) {
  		if ( this_tab.attr('id') == $('.tab').first().attr('id') ) {
  		    $( this_tab ).removeClass( "tab--active" );
  		} else {
  		   $( this_tab ).removeClass( "tab--active" );
  		   $( prev_tab ).addClass( "tab--active" );
  		}
  	}

  	// Button weiter wird angeklickt
  	$('.nextBtn').click(function() {
  	  var this_tab = $(this).parent().parent();
  	  var next_tab = this_tab.next('.tab');
  	  nextTab( this_tab, next_tab );
  	});

  	$('.prevBtn').click(function() {
  	  var this_tab = $(this).parent().parent();
  	  var prev_tab = this_tab.prev('.tab');
  	  prevTab( this_tab, prev_tab );
  	});

  	// Radio-Button wird angeklickt
  	$('.input-radio-icon__field').click(function() {
  	  var this_radio_field = $(this);
  	  updateParentState( this_radio_field );
  	});

  	// // Letzter Button wird zu "Fertig"
  	// $('.tab').last().children().children('.nextBtn').html('');

  	// Erster Zurück-Button wird ausgeblendet
  	$('.tab').first().children().children('.prevBtn').hide();


    //hide the notification
    $('.notification-button').click(function() {
	  	$(this).parent().parent('.notification').slideUp();
		});

    $(document).ready(function() {
      var checkbox = $('.input-toggle__field');

      if(checkbox.val() == 1) {
        checkbox.attr('checked', true);
        checkbox.parent().find('.input-toggle__label').text('Ja');
      }
    });

    $('.input-toggle__field').click(function() {
      if($(this).is(':checked')) {
        $(this).parent().find('.input-toggle__label').text('Ja');
        $(this).parent().find('.input-toggle__hidden').val(1);
        $(this).val(1);
      } else {
        $(this).parent().find('.input-toggle__label').text('Nein');
        $(this).parent().find('.input-toggle__hidden').val(0);
        $(this).val(0);
      }
    });
  </script>
@endpush
