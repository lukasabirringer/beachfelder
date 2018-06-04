<!doctype html>
<html lang="de">
  <head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MQ5N6TZ');</script>
    <!-- End Google Tag Manager -->
		
		<!-- Google Adsense -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-2244539104246669",
        enable_page_level_ads: true
      });
    </script>
    <!-- End Google Adsense -->
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('title_and_meta')
    <link rel="stylesheet" href="{{ asset('css/tipso.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.0/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/progressively/dist/progressively.min.css">
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.3/owl.carousel.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/places.js@1.6.0"></script>
    <script src="https://unpkg.com/progressively/dist/progressively.min.js"></script>
    <script src="{{ asset('js/tipso.min.js') }}"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <style>
      .disabled {
        display: none;
        visibility: hidden;
      }
    </style>
  </head>
  <body @unless(empty($body_class)) class="{{$body_class}}" @endunless>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MQ5N6TZ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="sidebar">
      <a href="{{ url('/') }}"><img class="sidebar__logo" src="{{ asset('images/signet-beachfelder.de_white.png') }}"></a>
      <ul class="navigation">
        <li class="navigation__item tipso-sidebar" data-tipso="Startseite"><a href="{{ url('/') }}" class="navigation__link"><span data-feather="home"></span></a></li>
        @if (Auth::check())
        <li class="navigation__item tipso-sidebar" data-tipso="Dein Profl"><a href="{{ URL::route('profile.show', Auth::user()->userName) }}" class="navigation__link"><span data-feather="user"></span></a>
        </li>
        @else
        <li class="navigation__item"><a href="{{ URL::route('login') }}" class="navigation__link"><span data-feather="user"></span></a></li>
        @endif
          <li class="navigation__item tipso-sidebar" data-tipso="neues Feld vorschlagen"><a href="{{ URL::route('beachcourtsubmit.submit') }}" class="navigation__link"><span data-feather="plus-circle"></span></a></li>
        @if (Auth::check())
          <li class="navigation__item tipso-sidebar" data-tipso="Ausloggen">
            <form action="{{ URL::route('logout') }}" method="POST" class="form form--logout">
              {{ csrf_field() }}
              <a href="javascript:;" onclick="document.querySelector('.form--logout').submit();" class="navigation__link">  <span data-feather="log-out"></span>
              </a>
            </form>
          </li>
        @endif
      </ul>
    </div>
    @yield('frontpage')
    <div id="app" class="content">
      <header class="header row">
        <div class="column column--12 column--m-6">
          <form action="/search" method="POST" class="form form--search">

            <label class="input" style="overflow: visible;">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" class="form-control" id="form-postcode13" name="postcode13">
              <input type="hidden" class="form-control" id="form-long" name="long">
              <input type="hidden" class="form-control" id="form-lat" name="lat">

              <input type="search" class="input__field " id="address-input" placeholder="Wo willst du dein nächstes Match spielen?" />
              <span class="input__icon" data-feather="search" onclick="document.querySelector('.form--search').submit();"></span>
              <span class="input__label">Wo willst du dein nächstes Match spielen?</span>
              <div class="input__border"></div>

              {{ $errors->postcode->first('postcode') }}
            </label>
          </form>
        </div>
        <div class="column column--12 column--m-6 header__column">
          @if (Auth::check())
            <div class="profile-user hide-on-mobile">
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
            <button class="button-secondary hide-on-mobile" onclick="window.location.href='{{URL::route('login')}}'">
              <span class="button-secondary__label">Anmelden / Registrieren</span>
            </button>
          @endif
        </div>
      </header>
      @yield('content')

      @include('frontend.reusable-includes.footer')

    </div> <!-- .content ENDE -->
    @include('cookieConsent::index')
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.rawgit.com/leafo/sticky-kit/v1.1.2/jquery.sticky-kit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script type="text/javascript" src="{{ asset('js/vendors.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.0/aos.js"></script>

    <script>

			AOS.init({
				disable: 'mobile'
	    });
           
      //icons
      feather.replace();
      //progressive image preloading
      progressively.init();
      //tooltips
      $('.tipso-sidebar').tipso({
        speed : 250,
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
        useDeviceLocation: false,
        container: document.querySelector('#address-input')
      });

      $('#address-input').on('keyup', function() {
      
        var input = document.querySelector("#address-input");
        var soll = document.querySelector("#form-postcode13");
        
        if (isNaN(input.value) || input.value.length > 6){
            placesAutocomplete.on('change', function(e) {
                document.querySelector('#form-postcode13').value = e.suggestion.postcode || '';
                document.querySelector('#form-lat').value = e.suggestion.latlng.lat || '';
                document.querySelector('#form-long').value = e.suggestion.latlng.lng || '';     
            });
          } else {
                soll.value = input.value;
              placesAutocomplete.on('change', function(e) {
                document.querySelector('#form-lat').value = e.suggestion.latlng.lat || '';
                document.querySelector('#form-long').value = e.suggestion.latlng.lng || ''; 
            });
          }
      });
    </script>

    @stack('scripts')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  </body>
</html>
