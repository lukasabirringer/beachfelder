
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

      <div class="tab -spacing-a" id="sand">
        @include('frontend.beachcourt.ratingSteps.ratingStep-1')
      </div> <!-- .tab #sand ENDE -->

      <div class="tab -spacing-a" id="net">
        @include('frontend.beachcourt.ratingSteps.ratingStep-2')
      </div> <!-- .tab #net ENDE -->

      <div class="tab -spacing-a" id="playground">
        @include('frontend.beachcourt.ratingSteps.ratingStep-3')
      </div> <!-- .tab #playground ENDE -->

      <div class="tab -spacing-a" id="environment">
        @include('frontend.beachcourt.ratingSteps.ratingStep-4')
      </div> <!-- .tab #environment ENDE -->
      <div class="tab -spacing-a" id="security">
      	  @include('frontend.beachcourt.ratingSteps.ratingStep-4')
      </div> <!-- .tab #security ENDE -->
      @if (Auth::check())
      <div class="column column--12 column--m-6 -spacing-b">
        <button type="button" id="prevBtn" class="button-primary button-primary--dark-gray prevBtn" onclick="nextPrev(-1)">
          <span class="button-primary__label">Schritt zurück</span>
          <span class="button-primary__label button-primary__label--hover">Schritt zurück</span>
        </button>
      </div>
    
      <div class="column column--12 column--m-6 -spacing-b">
        <button type="button" id="nextBtn" class="button-primary nextBtn" onclick="nextPrev(1)">
          <span class="button-primary__label">Schritt weiter</span>
          <span class="button-primary__label button-primary__label--hover">Schritt weiter</span>
        </button>
      </div>
      @else
      	<div class="column column--12 column--m-6 -spacing-b">
      		
      	</div>
      	<div class="column column--12 column--m-6 -spacing-b">
      		<button type="button" id="nextBtn" class="button-primary nextBtn" onclick="nextPrev(1)" disabled="disabled">
      		  <span class="button-primary__label">Schritt weiter</span>
      		  <span class="button-primary__label button-primary__label--hover">Schritt weiter</span>
      		</button>
      		<p class="-typo-copy -text-color-gray-01 -spacing-b">Um ein Feld zu bewerten, musst du dich zuvor als User registrieren und angemeldet sein. <a class="link-text" href="{{ route('register') }}">Registriere dich hier</a> oder <a class="link-text" href="{{ route('login') }}">melde dich an.</a></p>	
      		
      	</div>
      @endif
    </form>
  </div><!-- .row ENDE -->
</div><!-- .content__main ENDE -->
@endsection

@push('scripts')
  <script>

  	//TABS
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form ...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      // ... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "<span class='button-primary__label'>Deine Bewertung abgeben</span> <span class='button-primary__label button-primary__label--hover'>Deine Bewertung abgeben</span>";
      } else {
        document.getElementById("nextBtn").innerHTML = "<span class='button-primary__label'>weiter</span> <span class='button-primary__label button-primary__label--hover'>weiter</span>";
      }
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");

      //if (n == 1 && !validateForm()) return false;

      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form... :
      if (currentTab >= x.length) {
        //...the form gets submitted:
        document.getElementById("form-rating").submit();

        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {

    }

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
