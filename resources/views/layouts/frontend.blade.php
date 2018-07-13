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
    
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="{{ asset('images/apple-icon-57x57-precomposed.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('images/apple-icon-72x72-precomposed.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('images/apple-icon-114x114-precomposed.png')}}" />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('images/apple-icon-144x144-precomposed.png')}}" />

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
  	<div class="overlay">
    <form action="/search" method="POST" class="form overlay-form">
      <label class="input section__input" style="overflow: visible;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" class="form-control" id="form-postcode13" name="postcode13">
        <input type="hidden" class="form-control" id="form-long" name="long">
        <input type="hidden" class="form-control" id="form-lat" name="lat">

        <input type="search" class="input__field" id="address-input" placeholder="Wo suchst du ein Feld?" />
        <span class="input__label">Wo suchst du ein Feld?</span>
        <div class="input__border"></div>

        @if ($errors->has('postcode13'))
          <div class="message message--error -spacing-d">
            <div class="message__icon message__icon--error">
              <span data-feather="alert-circle"></span>
            </div>
            <p class="message__text message__text--error">{{ $errors->first('postcode13', 'Die Postleitzahl muss fünf Stellen besitzen.') }}</p>
          </div>
        @endif
        
        <button class="button-primary">
        	<span class="button-primary__label">Suchen</span>
        	<span class="button-primary__label button-primary__label--hover">Suchen</span>
        </button>
       
        @if (session('status'))
	        <div class="message message--error -spacing-d">
	          <div class="message__icon message__icon--error">
	            <span data-feather="alert-circle"></span>
	          </div>
	          <p class="message__text message__text--error">{{ session('status') }}</p>
	        </div>
        @endif

      </label>
    </form>
	</div>

  	<div class="menu-mobile menu-mobile--menu">
  		<div class="menu-mobile__icon menu-mobile__icon--menu" data-feather="menu"></div>
  		<div class="menu-mobile__icon menu-mobile__icon--close" data-feather="x"></div>
  	</div>
  	<div class="menu-mobile menu-mobile--search">
  		<div class="menu-mobile__icon menu-mobile__icon--search" data-feather="search"></div>
  		<div class="menu-mobile__icon menu-mobile__icon--close" data-feather="x"></div>
  	</div>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MQ5N6TZ"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="sidebar">
      <a href="{{ url('/') }}"><img class="sidebar__logo" src="{{ asset('images/signet-beachfelder.de_white.png') }}"></a>
      <ul class="navigation">
        <li class="navigation__item"><a href="{{ url('/') }}" class="navigation__link"><span data-feather="home"></span> <span class="navigation__label -typo-copy ">Home</span> </a></li>
        @if (Auth::check())
        <li class="navigation__item"><a href="{{ URL::route('profile.show', Auth::user()->userName) }}" class="navigation__link"><span data-feather="user"></span> <span class="navigation__label -typo-copy ">Dein Profil</span> </a>
        </li>
        @else
        <li class="navigation__item"><a href="{{ URL::route('login') }}" class="navigation__link"><span data-feather="user"></span> <span class="navigation__label -typo-copy ">Login</span> </a></li>
        @endif
          <li class="navigation__item"><a href="{{ URL::route('beachcourtsubmit.submit') }}" class="navigation__link"><span data-feather="plus-circle"></span> <span class="navigation__label -typo-copy ">Feld vorschlagen</span> </a></li>
          <li class="navigation__item"><a href="{{ url('/') }}/page/faq" class="navigation__link"><span data-feather="help-circle"></span> <span class="navigation__label -typo-copy ">FAQ</span> </a></li>
        @if (Auth::check())
          <li class="navigation__item">
            <form action="{{ URL::route('logout') }}" method="POST" class="form form--logout">
              {{ csrf_field() }}
              <a href="javascript:;" onclick="document.querySelector('.form--logout').submit();" class="navigation__link">  <span data-feather="log-out"></span> <span class="navigation__label -typo-copy ">Logout</span>
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
        
        soll.value = input.value;
        placesAutocomplete.on('change', function(e) {
                
                document.querySelector('#form-postcode13').value = e.suggestion.postcode || '';
                document.querySelector('#form-lat').value = e.suggestion.latlng.lat || '';
                document.querySelector('#form-long').value = e.suggestion.latlng.lng || '';     
            });
         
      });

      $('.sidebar').hover(function() {
      	$(this).addClass('sidebar--open');
      	$('.navigation').addClass('navigation--open');
      	setTimeout(function () {
            $('.navigation__label').addClass('navigation__label--visible');
        }, 500);
      	
      },
      function() {
      	$(this).removeClass('sidebar--open');
      	$('.navigation').removeClass('navigation--open');
      	$('.navigation__label').removeClass('navigation__label--visible');
      }
      );

      $('.menu-mobile--search').click(function() {
      	$(this).find('.menu-mobile__icon--search').toggle();
      	$(this).find('.menu-mobile__icon--close').toggle();
      	$('.overlay').toggleClass('overlay--open');
      });

      $('.menu-mobile--menu').click(function() {
      	$(this).find('.menu-mobile__icon--menu').toggle();
      	$(this).find('.menu-mobile__icon--close').toggle();

      	$('.sidebar').toggleClass('sidebar--mobile-visible');
      });
    </script>

    @stack('scripts')
  </body>
</html>
