
@extends('layouts.frontend')

@section('title_and_meta')
    <title>Schick' uns deine Beachvolleyballfelder | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
 @endsection

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

          <button class="button-secondary notification-button close" data-dismiss="alert" aria-label="close">
            <span class="button-secondary__label notification-button__label">OK</span>
          </button>
        </li>
      </ul>
    @endif

    @include('frontend.reusable-includes.divider')

    <div class="row -spacing-b">
      <div class="column column--12">
        <p class="-typo-copy -text-color-gray-01">
          Du hast ein Beachvolleyballfeld in deiner Nähe, dieses aber noch nicht auf <span class="-typo-copy--bold">beachfelder.de</span> gefunden?
        </p>
        <p class="-typo-copy -text-color-gray-01 -spacing-d">Dann hilf' uns doch einfach und reiche das Feld ein, damit wir es hier aufnehmen können. Somit hilfst du uns dabei, dass <span class="-typo-copy--bold">beachfelder.de</span> die größte und umfangreichste Suchmaschine für Beachvolleyballfelder wird.
        </p>

        <p class="-typo-copy -text-color-gray-01 -spacing-d">Du musst nicht alle Felder ausfüllen. Wichtig für uns sind allerdings die <span class="-typo-copy--bold">Koordinaten</span> des Feldes. Denn mit Hilfe dieser können wir das Feld bei unserer Recherche am Besten orten.
        </p>
        @if (!Auth::check())
        <p class="-typo-copy -text-color-gray-01 -spacing-d -typo-copy--bold">Beachte:</p>
        <p class="-typo-copy -text-color-gray-01">Um ein Feld einzureichen, musst du dich zuvor <a class="link-text" href="{{ route('register') }}">als User registrieren</a> oder bei beachfelder.de schon <a class="link-text" href="{{ route('login') }}">angemeldet</a> sein.</p>
        @endif
      </div>
    </div>

    @include('frontend.reusable-includes.divider')

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
              <div class="message message--error -spacing-d">
                <div class="message__icon message__icon--error">
                  <span data-feather="alert-circle"></span>
                </div>
                <p class="message__text message__text--error">{{ $errors->first('postalCode', ':message') }}</p>
              </div>
            @endif
          </div>

          <div class="column column--12 column--s-6 column--m-4 -spacing-a">
            <label class="input">
              <input type="text" name="city" class="input__field" placeholder="Ort" id="form-city">
              <span class="input__label">Ort</span>
              <div class="input__border"></div>
            </label>
            @if ($errors->has('city'))
            	<div class="message message--error -spacing-d">
            	  <div class="message__icon message__icon--error">
            	    <span data-feather="alert-circle"></span>
            	  </div>
            	  <p class="message__text message__text--error">{{ $errors->first('city', ':message') }}</p>
            	</div>
            @endif
          </div>

          <div class="column column--12 column--s-6 column--m-4 -spacing-a">
            <label class="input">
              <input type="text" name="street" class="input__field" placeholder="Straße" id="form-street">
              <span class="input__label">Straße</span>
              <div class="input__border"></div>
            </label>
            @if ($errors->has('street'))
            	<div class="message message--error -spacing-d">
            	  <div class="message__icon message__icon--error">
            	    <span data-feather="alert-circle"></span>
            	  </div>
            	  <p class="message__text message__text--error">{{ $errors->first('street', ':message') }}</p>
            	</div>
            @endif
          </div>

          <div class="column column--12 column--s-6 column--m-2 -spacing-a">
            <label class="input">
              <input type="text" name="houseNumber" class="input__field" id="form-number" placeholder="Nr.">
              <span class="input__label">Nr.</span>
              <div class="input__border"></div>
            </label>
            @if ($errors->has('houseNumber'))
            	<div class="message message--error -spacing-d">
            	  <div class="message__icon message__icon--error">
            	    <span data-feather="alert-circle"></span>
            	  </div>
            	  <p class="message__text message__text--error">{{ $errors->first('houseNumber', ':message') }}</p>
            	</div>
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
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('state', ':message') }}</p>
          	</div>
          @endif
        </div>
        <div class="column column--12 column--m-6 -spacing-b">
          <label class="input">
            <input type="text" id="form-country" class="input__field" name="country" placeholder="Land">
            <span class="input__label">Land</span>
            <div class="input__border"></div>
          </label>

          @if ($errors->has('country'))
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('country', ':message') }}</p>
          	</div>
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
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('operator', ':message') }}</p>
          	</div>
          @endif
        </div>

        <div class="column column--12 column--m-6 -spacing-a">
          <label class="input">
            <input type="url" name="operatorURL" class="input__field" placeholder="Website des Betreiber">
            <span class="input__label">Website des Betreiber</span>
            <div class="input__border"></div>
          </label>
          
          @if ($errors->has('operatorURL'))
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('operatorURL', ':message') }}</p>
          	</div>
          @endif
        </div>
      </div>

      <div class="row -spacing-a">
        <div class="column column--12">
          <h4 class="-typo-headline-04 -text-color-green">Das Feld</h4>
        </div>
      </div>

      <div class="row">
        <div class="column column--12 column--m-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Ist das Feld öffentlich zugänglich?</p>
          <label class="input-toggle  -spacing-d">

            <input type="hidden" class="input-toggle__hidden" name="isPublic" value="0">
            <input type="checkbox" class="input-toggle__field isPublic" name="isPublic" value="0">

            <span class="input-toggle__switch"></span>
            <span class="input-toggle__label">Nein</span>
          </label>
          
          @if ($errors->has('isPublic'))
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('isPublic', ':message') }}</p>
          	</div>
          @endif
        </div>

        <div class="column column--12 column--m-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Ist für das Spielen eine Platzmiete fällig?</p>
          <label class="input-toggle -spacing-d">
            <input type="hidden" class="input-toggle__hidden" name="isChargeable" value="0">
            <input type="checkbox" class="input-toggle__field isChargeable" name="isChargeable" value="0">

            <span class="input-toggle__switch"></span>
            <span class="input-toggle__label">Nein</span>
          </label>
          
          @if ($errors->has('isChargeable'))
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('isChargeable', ':message') }}</p>
          	</div>
          @endif
        </div>

      </div>

      <div class="row">
        <div class="column column--12 column--m-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Ist für den Zugang zum Feld eine einmalige Gebühr fällig?</p>
          <label class="input-toggle  -spacing-d">

            <input type="hidden" class="input-toggle__hidden" name="isSingleAccess" value="0">
            <input type="checkbox" class="input-toggle__field isSingleAccess" name="isSingleAccess" value="0">

            <span class="input-toggle__switch"></span>
            <span class="input-toggle__label">Nein</span>
          </label>
          
          @if ($errors->has('isSingleAccess'))
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('isSingleAccess', ':message') }}</p>
          	</div>
          @endif
        </div>

        <div class="column column--12 column--m-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Liegt das Feld an einem See oder in einem Freibad?</p>
          <label class="input-toggle -spacing-d">
            <input type="hidden" class="input-toggle__hidden" name="isswimmingLake" value="0">
            <input type="checkbox" class="input-toggle__field isswimmingLake" name="isswimmingLake" value="0">

            <span class="input-toggle__switch"></span>
            <span class="input-toggle__label">Nein</span>
          </label>

          @if ($errors->has('isswimmingLake'))
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('isswimmingLake', ':message') }}</p>
          	</div>
          @endif
        </div>

      </div>

      <div class="row">
        <div class="column column--12 column--m-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Ist für das Spielen eine dauerhafte Mitgliedsgebühr fällig?</p>
          <label class="input-toggle  -spacing-d">

            <input type="hidden" class="input-toggle__hidden" name="isMembership" value="0">
            <input type="checkbox" class="input-toggle__field isMembership" name="isMembership" value="0">

            <span class="input-toggle__switch"></span>
            <span class="input-toggle__label">Nein</span>
          </label>
          
          @if ($errors->has('isMembership'))
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('isMembership', ':message') }}</p>
          	</div>
          @endif
        </div>
      </div>

      @include('frontend.reusable-includes.divider')

      <div class="row">
        <div class="column column--12 column--m-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Wie viele Outdoor-Felder gibt es an diesem Ort?</p>
          <label class="input-range -spacing-b">
            <input type="hidden" name="courtCountOutdoor" class="input-range__hidden" value="0">
            <input type="range" name="courtCountOutdoor" class="input-range__field" value="0" min="0" max="20">
            <span class="input-range__value">0</span>
          </label>
          
          @if ($errors->has('courtCountOutdoor'))
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('courtCountOutdoor', ':message') }}</p>
          	</div>
          @endif
        </div>

        <div class="column column--12 column--m-6 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Wie viele Indoor-Felder gibt es an diesem Ort?</p>
          <label class="input-range -spacing-b">
            <input type="hidden" name="courtCountIndoor" class="input-range__hidden" value="0">
            <input type="range" name="courtCountIndoor" class="input-range__field" value="0" min="0" max="20">
            <span class="input-range__value">0</span>
          </label>
          
          @if ($errors->has('courtCountIndoor'))
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('courtCountIndoor', ':message') }}</p>
          	</div>
          @endif
        </div>
      </div>
			
			@include('frontend.reusable-includes.divider')

			<div class="row -spacing-a">
			  <div class="column column--12">
			    <h4 class="-typo-headline-04 -text-color-green">Koordinaten</h4>
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
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('latitude', ':message') }}</p>
          	</div>
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
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('longitude', ':message') }}</p>
          	</div>
          @endif
        </div>
      </div>

      <div class="row -spacing-a">
        <div class="column column--12">
          <h4 class="-typo-headline-04 -text-color-green">Sonstiges</h4>
        </div>
      </div>
      
      {{-- Photo Upload --}}

      <!-- <div class="row">
	  		<div class="column column--12 column--m-4">
	  			<label class="input-upload -spacing-a">
	  				<input type="file" name="photos[]" id="gallery-photo-add" class="input-upload__field" data-multiple-caption="{count} Bilder ausgewählt" multiple />	
	  				<span class="input-upload__label">
	  					<span class="input-upload__icon" data-feather="upload"></span>
	  					<span class="input-upload__text">Bilder auswählen</span>
	  				</span>
	  			</label>
	  		
	  			@if ($errors->has('photos'))
	  				<div class="alert alert-danger">{{ $errors->first('photos', ':message') }}</div>
	  			@endif

	  		</div>
		  	<div class="column column--12 column--m-8">
		  		<div class="gallery -spacing-b"></div>
		  	</div>
		  </div>

		  <div class="row">
		  	<div class="column column--12 column--s-6">
		  		<label class="input-toggle -spacing-a">
		  		  <input type="hidden" class="input-toggle__hidden" name="contestParticipation" value="0">
		  		  <input type="checkbox" class="input-toggle__field contestParticipation" name="contestParticipation" value="0">
		  		  <span class="input-toggle__switch"></span>
		  		  <span class="input-toggle__label">Ja, ich möchte an der Verlosung der 200 Preise teilnehmen</span>
		  		</label>
		  	</div>
		  	<div class="column column--12 column--s-6">
		  		
		  	</div>
		  </div> -->

  <!-- <input type="file" name="photos[]" id="gallery-photo-add" multiple />
  
  <div class="gallery">
   
  </div>
   
<button onclick="$('#gallery-photo-add').val(''); $('.gallery').empty();">clear</button> -->
      {{-- Photo Upload --}}

      <div class="row">
        <div class="column column--12 -spacing-a">
          <p class="-typo-copy -text-color-petrol">Hast du uns sonst noch etwas mitzuteilen?</p>
          <label class="textarea -spacing-b">
            <textarea name="notes" class="textarea__field"></textarea>
            <span class="textarea__label">Deine Nachricht an uns</span>
          </label>
          
          @if ($errors->has('notes'))
          	<div class="message message--error -spacing-d">
          	  <div class="message__icon message__icon--error">
          	    <span data-feather="alert-circle"></span>
          	  </div>
          	  <p class="message__text message__text--error">{{ $errors->first('notes', ':message') }}</p>
          	</div>
          @endif
        </div>
      </div>
      @if (Auth::check())
      <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}"></div>
        @if ($errors->has('g-recaptcha-response'))
            <span class="invalid-feedback" style="display: block;">
                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
            </span>
        @endif
      <div class="row">
        <div class="column column--12 column--m-5 -spacing-a">
          <a href="javascript:;" onclick="document.getElementById('form--submit-beachcourt').submit();" class="button-primary">
            <span class="button-primary__label">Feld einreichen</span>
            <span class="button-primary__label button-primary__label--hover">Feld einreichen</span>
          </a>
        </div>
      </div>
      @endif
    </form>

    @include('frontend.reusable-includes.divider')

  @if (Auth::check())
    <div class="row -spacing-a">
      <div class="column column--12">
        <div class="accordion">
          <div class="accordion__title-bar" data-tabgroup="first-tab-group">
            <a href="#tab1" class="accordion__title accordion__title--active">Meine Favoriten</a>
            <a href="#tab2" class="accordion__title">Meine eingereichten Felder</a>
          </div>
          <div id="first-tab-group">
            <div id="tab1" class="accordion__content">
              <ul class="list-beachcourt">
                @forelse ($myFavorites as $myFavorite)
                  <li class="list-beachcourt__item">
                    <div class="list-beachcourt__image">
                      <figure class="progressive">
                        @if(is_dir(public_path('uploads/beachcourts/' . $myFavorite->id . '/slider/standard/')))
                          <img class="progressive__img progressive--not-loaded image image--max-width" data-progressive="{{ url('/') }}/uploads/beachcourts/{{$myFavorite->id}}/slider/retina/slide-image-01-retina.jpg" src="{{ url('') }}/uploads/beachcourts/{{$myFavorite->id}}/slider/retina/slide-image-01-retina.jpg" alt="Feld in {{ $myFavorite->city }}" alt="Feld in {{ $myFavorite->city }}">
                        @else
                          <img class="progressive__img progressive--not-loaded" src="https://maps.googleapis.com/maps/api/staticmap?center={{$myFavorite->latitude}},{{$myFavorite->longitude}}&zoom=19&scale=2&size=347x180&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" data-progressive="https://maps.googleapis.com/maps/api/staticmap?center={{$myFavorite->latitude}},{{$myFavorite->longitude}}&zoom=19&scale=2&size=212x150&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" alt="Beachvolleyballfeld in {{$myFavorite->postalCode}} {{$myFavorite->city}}">
                        @endif
                      </figure>
                    </div>
                    <div class="list-beachcourt__info">
                      <div class="row">
                        <div class="column column--12">
                          <h4 class="-typo-headline-04 -text-color-gray-01">Feld in {{ $myFavorite->city }}</h4>
                        </div>
                      </div>

                      <div class="row  -spacing-b">
                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="map-pin"></span>
                            <span class="icon-text__text">{{ $myFavorite->postalCode }} {{ $myFavorite->city }} <br>{{ $myFavorite->street }} {{ $myFavorite->houseNumber }}</span>
                          </div>
                        </div>

                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="navigation"></span>
                            <span class="icon-text__text">{{ $myFavorite->longitude }}<br>{{ $myFavorite->latitude }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="row -spacing-b">
                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="info"></span>
                            <span class="icon-text__text">Felder outdoor: {{ $myFavorite->courtCountOutdoor }}<br>Felder indoor: {{ $myFavorite->courtCountIndoor }}</span>
                          </div>
                        </div>

                        <div class="column column--12 column--s-6">
                          <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($myFavorite->city),'latitude'=>$myFavorite->latitude,'longitude'=>$myFavorite->longitude)) }}" class="button-primary">
                            <span class="button-primary__label">Feld ansehen</span>
                            <span class="button-primary__label button-primary__label--hover">Feld ansehen</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <form action="{{ url('unfavorite/'.$myFavorite->id) }}" method="POST" id="form--delete-favorite">
                      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                      <a href="javascript:;" class="link-icon link-icon--shake list-beachcourt__icon" onclick="document.getElementById('form--delete-favorite').submit();">
                        <span data-feather="trash-2"></span>
                      </a>
                    </form>
                  </li>
                @empty
                
                  <p class="-typo-copy -typo-copy--bold -text-color-gray-01">Du hast noch keine Beachvolleyballfelder in deinen Favoriten.</p>
                  <p class="-typo-copy -text-color-green"><a href="#" class="link-text">Jetzt Feld hinzufügen</a></p>
                 
                @endforelse
              </ul>
            </div>
            <div id="tab2" class="accordion__content">
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
            </div>
          </div>
        </div>

      </div>
    </div>
    @endif
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

    $('.isChargeable, .isPublic, .isSingleAccess, .isMembership, .isswimmingLake').click(function() {
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

    $('.contestParticipation').click(function() {
    	if($(this).is(':checked')) {
      	$(this).parent().find('.input-toggle__hidden').val(1);
        $(this).val(1);
    	} else {
        $(this).parent().find('.input-toggle__hidden').val(0);
        $(this).val(0);
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

    $('.notification-button').click(function() {
      $(this).parent().parent('.notification').slideUp();
    });

    //shows the counter at the upload field
    ;( function( $, window, document, undefined )
    {
    	$( '.input-upload__field' ).each( function()
    	{
    		var $input	 = $( this ),
    			$label	 = $input.next( '.input-upload__label' ),
    			labelVal = $label.html();

    		$input.on( 'change', function( e )
    		{
    			var fileName = '';

    			if( this.files && this.files.length > 1 )
    				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
    			else if( e.target.value )
    				fileName = e.target.value.split( '\\' ).pop();

    			if( fileName )
    				$label.find( 'span' ).html( fileName );
    			else
    				$label.html( labelVal );
    		});

    		// Firefox bug fix
    		$input
    		.on( 'focus', function(){ $input.addClass( 'has-focus' ); })
    		.on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
    	});
    })( jQuery, window, document );


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
