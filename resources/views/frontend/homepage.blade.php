
@extends('layouts.frontend', ['body_class' => 'home'])

@section('title_and_meta')
    <title>beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
    <meta name="description" content="beachfelder.de ist die Beachvolleyballfeld-Suchmaschine mit der größten und umfangreichsten Datenbank an Feldern. Auf beachfelder.de kannst du deine Felder bewerten, dir Favoriten speichern und uns neue Beachvolleyballfelder vorschlagen." />
@endsection

@section('frontpage')
  <div class="section section--start">
    @if (Auth::check())
      <div class="profile-user hide-on-mobile section__button">
        <div class="profile-user__info">
          <a href="{{ URL::route('profile.show', Auth::user()->userName) }}" class="profile-user__title">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }} </a>
          <form action="{{ URL::route('logout') }}" method="POST" class="form form--logout">
            {{ csrf_field() }}
            <a href="{{ url('/') }}/user/{{ Auth::user()->userName }}/edit" class="link-text profile-user__subtitle">Profil bearbeiten</a>
          </form>
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

    <h1 class="-typo-headline-01 -text-color-petrol">Willkommen @if (Auth::check()) {{ Auth::user()->userName }} @endif</h1>
    <p class="-typo-copy -text-color-petrol -align-center">
    <span class="-typo-copy--bold">beachfelder.de</span> ist die Suchmaschine mit der größten und umfangreichsten Datenbank an Beachvolleyball-Feldern. Auf <span class="-typo-copy--bold">beachfelder.de</span> kannst du deine Felder bewerten, dir Favoriten speichern und uns neue Beachvolleyballfelder vorschlagen.</p>

    <form action="/search" method="POST" class="form form--homepage-search">
      <label class="input section__input" style="overflow: visible;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" class="form-control" id="form-postcode13" name="postcode13">

        <input type="search" class="input__field" id="address-input" placeholder="Wo willst du dein nächstes Match spielen?" />
        <span class="input__icon" data-feather="search" onclick="document.querySelector('.form--homepage-search').submit();"></span>
        <span class="input__label">Wo willst du dein nächstes Match spielen?</span>
        <div class="input__border"></div>
        {{ $errors->postcode->first('postcode') }}
      </label>
    </form>
    <span class="section__link" data-feather="chevrons-down"></span>
  </div>
@endsection

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <div class="content__main">
    <div class="row">
        <div class="column column--12">
          <h2 class="-typo-headline-02 -text-color-gray-01">Unsere neuesten Felder</h2>
          <div class="owl-carousel owl-carousel--frontpage -spacing-b">
            @foreach ($beachcourts as $beachcourt)
              @if($beachcourt-> submitState != 'submitted')
                <div class="beachcourt-item">
                  <div class="beachcourt-item__image">

                    @if(is_dir(public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/')))
                      <figure class="progressive">
                        <img
                          class="progressive__img"
                          data-progressive="{{url('/')}}/uploads/beachcourts/{{$beachcourt->id}}/slider/retina/slide-image-01-retina.jpg"
                          src="{{url('/')}}/uploads/beachcourts/{{$beachcourt->id}}/slider/standard/slide-image-01.jpg"
                        />
                      
                    @else
                      <img class="progressive__img" src="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=347x180&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" data-progressive="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=600x300&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" alt="Beachvolleyballfeld in {{$beachcourt->postalCode}} {{$beachcourt->city}}">
                      <!-- <div class="no-image-hint">
                        <h4 class="-typo-headline-04 -text-color-petrol">Noch kein Bild vorhanden.</h4>
                        <p class="-typo-copy -text-color-gray-01">
                          Hilf' uns und schicke uns welche von diesem Feld. 
                        </p>
                      </div> -->
                      </figure>
                    @endif

                    @if (Auth::user())
                        <favorite :beachcourt={{ $beachcourt->id }} :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}></favorite>
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
                      <span class="icon-text__icon" data-feather="info"></span>
                      <span class="icon-text__text">Felder outdoor: {{ $beachcourt->courtCountOutdoor }} <br> Felder indoor: {{ $beachcourt->courtCountIndoor }}</span>
                    </div>

                    <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude)) }}" class="button-primary -spacing-a">
                      <span class="button-primary__label">Mehr erfahren</span>
                      <span class="button-primary__label button-primary__label--hover">Mehr erfahren</span>
                    </a>
                  </div>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
      <div class="row -spacing-a">
        <div class="column column--12">
          <hr class="divider">
        </div>
      </div>
      <div class="row -spacing-a">

        <div class="column column--12">
          <h2 class="-typo-headline-02 -text-color-gray-01">Felder in den größten deutschen Städten</h2>
        </div>
      </div>
      <div class="row">
        @foreach($cities as $city)
          <div class="column column--12 column--s-6 -spacing-b">
            <div class="teaser">
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
