<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'beachfelder.de - Frontend') }}</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.3/owl.carousel.min.js"></script>
    <style>
      .disabled {
        display: none;
        visibility: hidden;
      }
    </style>
  </head>
  <body class="has-bg">
    <div class="sidebar">
      <a href="{{ url('/') }}"><img class="sidebar__logo" src="{{ asset('images/signet-beachfelder.de_white.png') }}"></a>
      <ul class="navigation">
        <li class="navigation__item"><a href="{{ url('/') }}" class="navigation__link"><span data-feather="home"></span></a></li>
        @if (Auth::check())
        <li class="navigation__item"><a href="{{ URL::route('profile.show', Auth::user()->userName) }}" class="navigation__link"><span data-feather="user"></span></a></li>
        @else
        <li class="navigation__item"><a href="{{ URL::route('login') }}" class="navigation__link"><span data-feather="user"></span></a></li>
        @endif

        @if (Auth::check())
          <li class="navigation__item"><a href="{{ URL::route('beachcourtsubmit.submit') }}" class="navigation__link"><span data-feather="star"></span></a></li>
        @endif
      </ul>
    </div>
    <div id="app" class="content">
      <header class="header row">
        <div class="column column--12 column--m-6">
          <script src="https://cdn.jsdelivr.net/npm/places.js@1.4.15"></script>
          <form action="/search" method="POST">
            <label class="input">
            <div class="column column--12 column--s-10">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="form-postcode" name="postcode">
              <input type="text" placeholder="Gib eine PLZ oder einen Ort ein" id="address-input" name="searchQuery" class="input__field ap-input">
            </div>
            {{ $errors->postcode->first('postcode') }}
              <span class="input__icon" data-feather="search"></span>
              <span class="input__label">PLZ oder Ort</span>
              <div class="input__border"></div>
            </label>
    </form>
    <script>
      var placesAutocomplete = places({
        type: 'city',
        countries: 'de',
        container: document.querySelector('#address-input')
      });

      placesAutocomplete.on('change', function resultSelected(e) {
        document.querySelector('#form-postcode').value = e.suggestion.postcode || '';
      });
      </script>
        </div>
        <div class="column column--12 column--m-6 header__column">
          @if (Auth::check())
            <div class="profile-user">
              <div class="profile-user__info">
                <a href="{{ URL::route('profile.show', Auth::user()->userName) }}" class="profile-user__title">{{ Auth::user()->firstName }} {{ Auth::user()->lastName }} </a>
                <form action="{{ URL::route('logout') }}" method="POST" class="form form--logout">
                  {{ csrf_field() }}
                  <a href="javascript:;" onclick="document.querySelector('.form--logout').submit();" class="link-text profile-user__subtitle">Abmelden</a>
                </form>
              </div>
              <div class="profile-user__image">
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
            <button class="button-secondary" onclick="window.location.href='{{URL::route('login')}}'">
              <span class="button-secondary__label">Anmelden / Registrieren</span>
            </button>
          @endif
        </div>
      </header>
       @yield('content')
    </div>
    <footer class="footer row">
      <div class="column column--12">
        <ul class="footer__navigation">
          <li class="footer__item"><a href="impressum.html" class="footer__link">Impressum</a></li>
          <li class="footer__item"><a href="kontakt.html" class="footer__link">Kontakt</a></li>
        </ul>
      </div>
      <div class="column column--12">
        <p class="footer__paragraph">© {{ date('Y') }} World of Beachsport GbR</p>
      </div>
    </footer>
    @include('cookieConsent::index')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script type="text/javascript" src="{{ asset('js/vendors.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script>
      feather.replace();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  </body>
</html>
