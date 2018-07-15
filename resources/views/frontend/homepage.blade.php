
@extends('layouts.frontend', ['body_class' => 'home'])

@section('title_and_meta')
    <title>beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
    <meta name="description" content="beachfelder.de ist die Beachvolleyballfeld-Suchmaschine mit der größten und umfangreichsten Datenbank an Feldern. Auf beachfelder.de kannst du deine Felder bewerten, dir Favoriten speichern und uns neue Beachvolleyballfelder vorschlagen." />
@endsection

@section('frontpage')
  <div class="section section--start">
  	<a href="{{ url('/') }}"><img class="sidebar__logo hide-on-desktop" src="{{ asset('images/signet-beachfelder.de_white.png') }}"></a>

    @if (Auth::check())
      <div class="profile-user hide-on-mobile section__button">
        <div class="profile-user__info">
          <a href="{{ URL::route('profile.show', Auth::user()->userName) }}" class="profile-user__title">{{ Auth::user()->userName }} </a>
          <form action="{{ URL::route('logout') }}" method="POST" class="form form--logout">
            {{ csrf_field() }}
            <a href="{{ url('/') }}/user/{{ Auth::user()->userName }}/edit" class="link-text profile-user__subtitle">Profil bearbeiten</a>
          </form>
          @if (Auth::user()->isAdmin())
            <a href="{{ url('/') }}/backend/dashboard/" class="link-text profile-user__subtitle">Adminbereich</a>
          @endif
        </div>
        <div class="profile-user__image ">
          @if(Auth::user()->pictureName !== 'placeholder-user.png' )
            <a href="{{ URL::route('profile.show', Auth::user()->userName) }}">
              <img src="{{ url('/') }}/uploads/profilePictures/{{Auth::user()->id}}/{{Auth::user()->pictureName}}" width="60">
            </a>
          @else
            <a href="{{ URL::route('profile.show', Auth::user()->userName) }}">
              <img src="{{ url('/') }}/uploads/profilePictures/fallback/placeholder-user.png" width="60">
            </a>
          @endif
        </div>
      </div>
    @else
      <button class="button-secondary hide-on-mobile section__button" onclick="window.location.href='{{URL::route('login')}}'">
        <span class="button-secondary__label">Anmelden / Registrieren</span>
      </button>
    @endif
			
		<div class="section__content" style="position: absolute; bottom: 100px; padding: 20px; background: #f3f3f3; left: 50%; transform: translateX(-50%); border-radius: 3px; box-shadow: 0 0 15px 1px rgba(0, 0, 0, 0.05); width: 50%;">
			<form action="/search" method="POST" class="form form--homepage-search" style="display: flex;">
	      <label class="input section__input" style="overflow: visible; width: 100%;">
	        <input type="hidden" name="_token" value="{{ csrf_token() }}">
	        <input type="hidden" class="form-control" id="form-postcode13-homepage" name="postcode13">
	        <input type="hidden" class="form-control" id="form-long-homepage" name="long">
	        <input type="hidden" class="form-control" id="form-lat-homepage" name="lat">

	        <input type="search" class="input__field" id="address-input-homepage" placeholder="Wo willst du dein nächstes Match spielen?"/>
	        <!-- <span class="input__icon" data-feather="search" onclick="document.querySelector('.form--homepage-search').submit();"></span> -->
	        <span class="input__label">Wo willst du dein nächstes Match spielen?</span>
	        <div class="input__border"></div>
	      </label>

	      @if ($errors->has('postcode13'))
	          <div class="message message--error -spacing-d">
	            <div class="message__icon message__icon--error">
	              <span data-feather="alert-circle"></span>
	            </div>
	            <p class="message__text message__text--error">{{ $errors->first('postcode13', 'Die Postleitzahl muss fünf Stellen besitzen.') }}</p>
	          </div>
	        @endif
	       
	        @if (session('status'))
		        <div class="message message--error -spacing-c">
		          <div class="message__icon message__icon--error">
		            <span data-feather="alert-circle"></span>
		          </div>
		          <p class="message__text message__text--error">{{ session('status') }}</p>
		        </div>
	        @endif

	        <button class="button-primary" style="width: 50%;">
	        	<span class="button-primary__label">Los geht's!</span>
	        	<span class="button-primary__label button-primary__label--hover">Los geht's!</span>
	        </button>
	    </form>
		</div>
	   
	  <div style="
	  	position: absolute; width: 100%; height: 100px; bottom: 0; left: 0;
			/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffffff+0,ffffff+14,ffffff+100&0+0,1+100 */
			background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,0.14) 14%, rgba(255,255,255,1) 100%); /* FF3.6-15 */
			background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,0.14) 14%,rgba(255,255,255,1) 100%); /* Chrome10-25,Safari5.1-6 */
			background: linear-gradient(to bottom, rgba(255,255,255,0) 0%,rgba(255,255,255,0.14) 14%,rgba(255,255,255,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00ffffff', endColorstr='#ffffff',GradientType=0 ); /* IE6-9 */
	  ">
	  	
	  </div>

    <span class="section__link" data-feather="chevrons-down"></span>
  </div>
@endsection

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <div class="content__main">
  	<div class="row">
  		<div class="column column--12">
  			<h1 class="-typo-headline-01 -text-color-gray-01">Willkommen @if (Auth::check()) {{ Auth::user()->userName }} @endif</h1>
  			<p class="-typo-copy -text-color-gray-01 -spacing-c">
  			<span class="-typo-copy--bold">beachfelder.de</span> ist die Suchmaschine mit der größten und umfangreichsten Datenbank an Beachvolleyball-Feldern. Auf <span class="-typo-copy--bold">beachfelder.de</span> kannst du deine Felder bewerten, dir Favoriten speichern und uns neue Beachvolleyballfelder vorschlagen.</p>
  		</div>
  	</div>

  	@include('frontend.reusable-includes.divider')

    <div class="row -spacing-a">
        <div class="column column--12">
          <h2 class="-typo-headline-02 -text-color-gray-01">Unsere neuesten Felder</h2>
          <div class="owl-carousel owl-carousel--frontpage -spacing-b">
            @foreach ($beachcourts as $beachcourt)
              @if($beachcourt-> submitState != 'submitted')
                @include('frontend.reusable-includes.beachcourt-item')
              @endif
            @endforeach
          </div>
        </div>
      </div>
      
      @include('frontend.reusable-includes.divider')
      
      @include('frontend.reusable-includes.teaser-contest')

      @include('frontend.reusable-includes.divider')

      <div class="row -spacing-a">
        <div class="column column--12">
          <h2 class="-typo-headline-02 -text-color-gray-01">Felder in den größten deutschen Städten</h2>
        </div>
      </div>
      <div class="row">
        @foreach($cities as $city)
          <div class="column column--12 column--s-6 -spacing-b">
            <div class="teaser" data-aos="fade-up" data-aos-duration="600" data-aos-anchor-placement="bottom-center">
              <a href="{{ URL('/') }}/stadt/{{ $city->slug }}" class="teaser__link">
                <img src="{{ asset('uploads/cities') }}/{{ $city->slug }}.jpg" class="teaser__image">
                <div class="teaser__info">
                  <h3 class="teaser__title">{{ $city->name }}</h3>
                  <!-- <p class="teaser__subtitle">XYZ Beachvolleyballfelder</p> -->
                </div>
              </a>
            </div>
          </div>
        @endforeach
      </div>
  </div> <!-- .content__main ENDE -->
@endsection

@push('scripts')
	<script>
		var placesAutocompleteHomepage = places({
		  type: 'city',
		  countries: 'de',
		  language: 'de_DE',
		  useDeviceLocation: false,
		  container: document.querySelector('#address-input-homepage')
		});

		$('#address-input-homepage').on('keyup', function() {
		
		  var input = document.querySelector("#address-input-homepage");
		  var soll = document.querySelector("#form-postcode13-homepage");
		  
		  soll.value = input.value;
		      placesAutocompleteHomepage.on('change', function(e) {
              
		          document.querySelector('#form-postcode13-homepage').value = e.suggestion.postcode || '';
		          document.querySelector('#form-lat-homepage').value = e.suggestion.latlng.lat || '';
		          document.querySelector('#form-long-homepage').value = e.suggestion.latlng.lng || '';     
		      });
		});
	</script>
@endpush