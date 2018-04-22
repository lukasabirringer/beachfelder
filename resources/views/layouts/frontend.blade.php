<!doctype html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'beachfelder.de - Frontend') }}</title>
    <link rel="stylesheet" href="{{ asset('css/tipso.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datepicker.min.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/progressively/dist/progressively.min.css">
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.3/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.6.0"></script>
    <script src="https://unpkg.com/progressively/dist/progressively.min.js"></script>
    <script src="{{ asset('js/tipso.min.js') }}"></script>
    <style>
      .disabled {
        display: none;
        visibility: hidden;
      }
    </style>
  </head>
  <body @unless(empty($body_class)) class="{{$body_class}}" @endunless>
    <div class="sidebar">
      <a href="{{ url('/') }}"><img class="sidebar__logo" src="{{ asset('images/signet-beachfelder.de_white.png') }}"></a>
      <ul class="navigation">
        <li class="navigation__item"><a href="{{ url('/') }}" class="navigation__link"><span data-feather="home"></span></a></li>
        @if (Auth::check())
        <li class="navigation__item"><a href="{{ URL::route('profile.show', Auth::user()->userName) }}" class="navigation__link"><span data-feather="user"></span></a>
        </li>
        @else
        <li class="navigation__item"><a href="{{ URL::route('login') }}" class="navigation__link"><span data-feather="user"></span></a></li>
        @endif

        @if (Auth::check())
          <li class="navigation__item tipso-add-field" data-tipso="neues Feld vorschlagen"><a href="{{ URL::route('beachcourtsubmit.submit') }}" class="navigation__link"><span data-feather="plus-circle"></span></a></li>
        @endif

        @if (Auth::check())
          <li class="navigation__item">
            <form action="{{ URL::route('logout') }}" method="POST" class="form form--logout">
              {{ csrf_field() }}
              <a href="javascript:;" onclick="document.querySelector('.form--logout').submit();" class="navigation__link">  <span data-feather="log-out"></span>
              </a>
            </form>
          </li>
        @endif
      </ul>
    </div>
    <div id="app" class="content">
      <header class="header row">
        <div class="column column--12 column--m-6">
          <form action="/search" method="POST" class="form--search">

            <label class="input" style="overflow: visible;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="form-postcode" name="postcode">

              <input type="search" class="input__field" id="address-input" placeholder="PLZ oder Ort" />
              <span class="input__icon" data-feather="search" onclick="document.querySelector('.form--search').submit();"></span>
              <span class="input__label">PLZ oder Ort</span>
              <div class="input__border"></div>
              {{ $errors->postcode->first('postcode') }}
            </label>
          </form>
        </div>
        <div class="column column--12 column--m-6 header__column">
          @if (Auth::check())
            <div class="profile-user hide-on-mobile">
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
            <button class="button-secondary hide-on-mobile" onclick="window.location.href='{{URL::route('login')}}'">
              <span class="button-secondary__label">Anmelden / Registrieren</span>
            </button>
          @endif
        </div>
      </header>
      @yield('content')

      <footer class="footer row">
        <div class="column column--12">
          <ul class="footer__navigation">
            @foreach($footerLinks as $footerLink)
            <li class="footer__item"><a href="{{ url('/') }}/page/{{ $footerLink->slug }}" class="footer__link">{{ $footerLink->name }}</a></li>
            @endforeach
            <li class="footer__item"><a href="{{ url('/') }}/page/kontakt" class="footer__link">Kontakt</a></li>
          </ul>
        </div>
        <div class="column column--12">
          <p class="footer__paragraph">© {{ date('Y') }} World of Beachsport GbR</p>
        </div>
      </footer>

    </div> <!-- .content ENDE -->
    @include('cookieConsent::index')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.rawgit.com/leafo/sticky-kit/v1.1.2/jquery.sticky-kit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script type="text/javascript" src="{{ asset('js/vendors.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')

    <script>
      //icons
      feather.replace();
      //progressive image preloading
      progressively.init();
      //tooltips
      $('.tipso-add-field').tipso({
        speed : 50,
        offsetX : -20,
        background : '#457b8c',
        color : '#ffffff',
        position : 'right',
        showArrow : false,
        tooltipHover : true
      });

      $('.tipso-favorite').tipso({
        speed : 50,
        offsetY: 5,
        background : '#457b8c',
        color : '#ffffff',
        position : 'top',
        showArrow : false,
        tooltipHover : true
      });

      var placesAutocomplete = places({
        type: 'city',
        countries: 'de',
        language: 'de_DE',
        useDeviceLocation: true,
        container: document.querySelector('#address-input')
      });

      placesAutocomplete.on('change', function resultSelected(e) {
        document.querySelector('#form-postcode').value = e.suggestion.postcode || '';
      });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  </body>
</html>
