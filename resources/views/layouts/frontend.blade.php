<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'beachfelder.de - Frontend') }}</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

  </head>
  <body class="has-bg">
    <div class="sidebar">
      <a href="index.html"><img class="sidebar__logo" src="images/signet-beachfelder.de_white.png"></a>
      <ul class="navigation">
        <li class="navigation__item"><a href="index.html" class="navigation__link"><span data-feather="home"></span></a></li>
        <li class="navigation__item"><a href="your-profile.html" class="navigation__link"><span data-feather="user"></span></a></li>
      </ul>
    </div>
    <div id="app">
     <!--  <form action="{{ route('logout') }}" method="POST">
    {{ csrf_field() }}
    <button type="submit">Logout</button>
    </form>
    <a href="{{ URL::route('beachcourtsubmit.submit') }}">Beachfeld einreichen</a>
    --> <div class="content">
      <header class="header row">
        <div class="column column--12 column--m-6">
          <script src="https://cdn.jsdelivr.net/npm/places.js@1.4.15"></script>
      <form action="/search" method="POST">
          <label class="input">
        <div class="column column--12 column--s-10">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="form-control" id="form-postcode" name="postcode">
            <input type="text" placeholder="Gib eine PLZ oder einen Ort ein" id="address-input" name="searchQuery" class="input__field ap-input">
            <button type="submit" class="btn btn-info">Suchen!</button>
        </div>
    {{ $errors->postcode->first('postcode') }}
     <span class="input__icon" data-feather="search"></span>
              <span class="input__label">PLZ oder Ort</span>
              <div class="input__border"></div>
            </label>
    </form>
        </div>
        <div class="column column--12 column--m-6 header__column">
           <div class="profile-user">
                <div class="profile-user__info">
                  <a href="your-profile.html" class="profile-user__title">Fabian Pecher</a>
                  <a href="your-profile.html" class="link-text profile-user__subtitle">Profil bearbeiten</a>
                </div>
                <div class="profile-user__image">
                  <img src="images/profile-image.jpg" width="60">
                </div>
              </div>
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
        <p class="footer__paragraph">© 2018 beachfelder.de</p>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    <!-- <script src="{{ asset('js/main.js') }}"></script> --> <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </div>
  </body>
</html>
