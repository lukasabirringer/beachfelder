@extends('layouts.frontend')

@section('content')
  <div class="content__main">
    <div class="row">
      <div class="column column--12">
        <h2 class="title-page__title">Registrieren oder anmelden</h2>
      </div>
    </div>
    <div class="row -spacing-a">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>

    <ul class="notification">
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
          <li class="notification__item">
            <span class="notification__icon" data-feather="info"></span>
            <p class="notification__text alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>

            <button class="button-secondary notification__button close" data-dismiss="alert" aria-label="close">
              <span class="button-secondary__label">OK</span>
            </button>
          </li>
        @endif
      @endforeach
    </ul>

    <div class="page-login -spacing-a">
      <div class="page-login__half page-login__half--left">
        <h3 class="page-login__title"> <span class="page-login__title-icon" data-feather="user-plus"></span>Registriere dich</h3>

        <div class="page-login__content">
          <div class="row -spacing-a">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
              {{ csrf_field() }}
              <div class="column column--12 column--s-6 -spacing-b">
                <label class="input">
                  <input type="text" name="name" value="{{ old('name') }}" class="input__field" placeholder="Dein Username">
                  <span class="input__label">Dein Username</span>
                  <div class="input__border"></div>
                </label>
                @if ($errors->has('name'))
                  <div class="message message--error -spacing-d">
                    <div class="message__icon message__icon--error">
                      <span data-feather="alert-circle"></span>
                    </div>
                    <p class="message__text message__text--error">Dieses Feld ist ein Pflichtfeld</p>
                  </div>
                @endif
              </div>

              <div class="column column--12 column--s-6 -spacing-b">
                <label class="input">
                  <input type="text" name="firstName" value="{{ old('firstName') }}" class="input__field" placeholder="Dein Vorname">
                  <span class="input__label">Dein Vorname</span>
                  <div class="input__border"></div>
                </label>
                @if ($errors->has('firstName'))
                  <div class="message message--error -spacing-d">
                    <div class="message__icon message__icon--error">
                      <span data-feather="alert-circle"></span>
                    </div>
                    <p class="message__text message__text--error">Dieses Feld ist ein Pflichtfeld</p>
                  </div>
                @endif
              </div>

              <div class="column column--12 column--s-6 -spacing-b">
                <label class="input">
                  <input type="text" name="lastName" value="{{ old('lastName') }}" class="input__field" placeholder="Dein Nachname">
                  <span class="input__label">Dein Nachname</span>
                  <div class="input__border"></div>
                </label>
                @if ($errors->has('lastName'))
                  <div class="message message--error -spacing-d">
                    <div class="message__icon message__icon--error">
                      <span data-feather="alert-circle"></span>
                    </div>
                    <p class="message__text message__text--error">Dieses Feld ist ein Pflichtfeld</p>
                  </div>
                @endif
              </div>


              <div class="column column--12 column--s-6 -spacing-a">
                <label class="input">
                  <input type="email" name="email" value="{{ old('email') }}" class="input__field" placeholder="Deine E-Mail Adresse">
                  <span class="input__label">Deine E-Mail Adresse</span>
                  <div class="input__border"></div>
                </label>
                @if ($errors->has('email'))
                  <div class="message message--error -spacing-d">
                    <div class="message__icon message__icon--error">
                      <span data-feather="alert-circle"></span>
                    </div>
                    <p class="message__text message__text--error">Dieses Feld ist ein Pflichtfeld</p>
                  </div>
                @endif
              </div>

              <div class="column column--12 column--s-6 -spacing-a">
                <label class="input">
                  <input type="text" name="birthdate" value="{{ old('birthdate') }}" class="datepicker-here input__field input__field--date" data-position="bottom left" placeholder="Dein Geburtsdatum">
                  <span class="input__label">Dein Geburtsdatum</span>
                  <div class="input__border"></div>
                </label>
              </div>

              <div class="column column--12 column--s-12">
                <div class="row">
                  <div class="column column--12 column--s-5 -spacing-a">
                    <label class="input">
                      <input type="text" name="postalCode" value="{{ old('postalCode') }}" class="input__field" placeholder="Deine Postleitzahl">
                      <span class="input__label">Deine Postleitzahl</span>
                      <div class="input__border"></div>
                    </label>
                  </div>

                  <div class="column column--12 column--s-7 -spacing-a">
                    <label class="input">
                      <input type="text" name="city" value="{{ old('city') }}" class="input__field" placeholder="Dein Wohnort">
                      <span class="input__label">Dein Wohnort</span>
                      <div class="input__border"></div>
                    </label>
                  </div>
                </div>
              </div>

              <div class="column column--12 column--s-12 -spacing-a">
                <div class="row">
                  <div class="column column--12">
                    <p class="-typo-copy -text-color-gray-01">Wähle dein Geschlecht</p>
                  </div>
                  <div class="column column--12 column--s-4">
                    <label class="input-radio">
                      <input type="radio" class="input-radio__field" name="sex" value="männlich">
                      <span class="input-radio__label">männlich</span>
                    </label>
                  </div>
                  <div class="column column--12 column--s-4">
                    <label class="input-radio">
                      <input type="radio" class="input-radio__field" name="sex" value="weiblich">
                      <span class="input-radio__label">weiblich</span>
                    </label>
                  </div>
                  <div class="column column--12 column--s-4">
                    <label class="input-radio">
                      <input type="radio" class="input-radio__field" name="sex" value="neutral">
                      <span class="input-radio__label">neutral</span>
                    </label>
                  </div>
                  @if ($errors->has('sex'))
                    <div class="message message--error -spacing-d">
                      <div class="message__icon message__icon--error">
                        <span data-feather="alert-circle"></span>
                      </div>
                      <p class="message__text message__text--error">Dieses Feld ist ein Pflichtfeld</p>
                    </div>
                  @endif
                </div>
              </div>

              <div class="column column--12 column--s-6 -spacing-a">
                <label class="input">
                  <input type="password" name="password" value="{{ old('password') }}" class="input__field input__field--password" placeholder="Dein Passwort" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
                  <span class="input__label">Dein Passwort</span>
                  <div class="input__border"></div>
                  <span class="input__icon input__icon--eye" data-feather="eye" onclick="togglePassword()"></span>
                  <span class="input__icon input__icon--eye-off input__icon--not-visible" data-feather="eye-off" onclick="togglePassword()"></span>
                </label>

                @if ($errors->has('password'))
                  <div class="message message--error -spacing-d">
                    <div class="message__icon message__icon--error">
                      <span data-feather="alert-circle"></span>
                    </div>
                    <p class="message__text message__text--error">Dieses Feld ist ein Pflichtfeld</p>
                  </div>
                @endif
              </div>

              <div class="column column--12 column--s-6 -spacing-a">
                <label class="input">
                  <input type="password" name="password_confirmation" class="input__field input__field--password" placeholder="Passwort wiederholen">
                  <span class="input__label">Passwort wiederholen</span>
                  <div class="input__border"></div>
                  <span class="input__icon input__icon--eye" data-feather="eye" onclick="togglePassword()"></span>
                  <span class="input__icon input__icon--eye-off input__icon--not-visible" data-feather="eye-off" onclick="togglePassword()"></span>
                </label>
              </div>

              <div class="column column--12 -spacing-b">
                <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-c">Damit dein Passwort sicher ist, sollte es folgendes beinhalten</p>
                <p id="letter" class="password-strength password-strength--invalid -spacing-d">mindestens einen Kleinbuchstaben</p>
                <p id="capital" class="password-strength password-strength--invalid -spacing-d">mindestens einen Großbuchstaben</p>
                <p id="number" class="password-strength password-strength--invalid -spacing-d">mindestens eine Zahl</p>
                <p id="length" class="password-strength password-strength--invalid -spacing-d">eine Mindestlänge von 8 Zeichen</p>
              </div>

              <div class="column column--12 -spacing-b">
                <button class="button-primary btn-register">
                  <span class="button-primary__label">Jetzt kostenlos registrieren</span>
                  <span class="button-primary__label button-primary__label--hover">Jetzt kostenlos registrieren</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div><!-- .left side ENDE -->
      <div class="page-login__half page-login__half--right">
        <h3 class="page-login__title"><span class="page-login__title-icon" data-feather="user"></span>Melde dich an</h3>

        <div class="page-login__content">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="row -spacing-a">
              <div class="column column--12 -spacing-b">
                <label class="input">
                  <input type="email" class="input__field" name="email" value="{{ old('email') }}" placeholder="Deine E-Mail Adresse">
                  <span class="input__label">Deine E-Mail Adresse</span>
                  <div class="input__border"></div>
                </label>

                @if ($errors->has('email'))
                  <div class="message message--error -spacing-d">
                    <div class="message__icon message__icon--error">
                      <span data-feather="alert-circle"></span>
                    </div>
                    <p class="message__text message__text--error">Bitte gib' deine E-Mail Adresse ein</p>
                  </div>
                @endif
              </div>

              <div class="column column--12 -spacing-a">
                <label class="input">
                  <input type="password" name="password" class="input__field" placeholder="Passwort">
                  <span class="input__label">Passwort</span>
                  <div class="input__border"></div>
                  <span class="input__icon input__icon--eye" data-feather="eye" onclick="togglePassword()"></span>
                  <span class="input__icon input__icon--eye-off input__icon--not-visible" data-feather="eye-off" onclick="togglePassword()"></span>
                </label>

                @if ($errors->has('password'))
                  <div class="message message--error -spacing-d">
                    <div class="message__icon message__icon--error">
                      <span data-feather="alert-circle"></span>
                    </div>
                    <p class="message__text message__text--error">Bitte gib' dein Passwort ein</p>
                  </div>
                @endif
              </div>

              <div class="column column--12 -spacing-b">
                <button class="button-primary">
                  <span class="button-primary__label">Anmelden</span>
                  <span class="button-primary__label button-primary__label--hover">Anmelden</span>
                </button>
              </div>
            </div>

            <div class="row">
              <div class="column column--12 -spacing-b">
                <p class="-typo-copy -text-color-gray-01"> <a class="link-text" href="{{ route('password.request') }}">Passwort vergessen?</a> </p>
              </div>
            </div>
          </form>
        </div>
      </div> <!-- .right side ENDE -->
    </div>
  </div> <!-- .content__main ENDE -->
@endsection

@push('scripts')
  <script>
    var myInput = document.querySelector('.input__field--password');
    var letter = document.getElementById('letter');
    var capital = document.getElementById('capital');
    var number = document.getElementById('number');
    var length = document.getElementById('length');
    var pwdstrength = document.getElementById('pwchecker');


    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {
      // Validate lowercase letters
      var lowerCaseLetters = /[a-z]/g;
      if(myInput.value.match(lowerCaseLetters)) {
        letter.classList.remove('password-strength--invalid');
        letter.classList.add('password-strength--valid');
      } else {
        letter.classList.remove('password-strength--valid');
        letter.classList.add('password-strength--invalid');
    }

      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInput.value.match(upperCaseLetters)) {
        capital.classList.remove('password-strength--invalid');
        capital.classList.add('password-strength--valid');
      } else {
        capital.classList.remove('password-strength--valid');
        capital.classList.add('password-strength--invalid');
      }

      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInput.value.match(numbers)) {
        number.classList.remove('password-strength--invalid');
        number.classList.add('password-strength--valid');
      } else {
        number.classList.remove('password-strength--valid');
        number.classList.add('password-strength--invalid');
      }

      // Validate length
      if(myInput.value.length >= 8) {
        length.classList.remove('password-strength--invalid');
        length.classList.add('password-strength--valid');
      } else {
        length.classList.remove('password-strength--valid');
        length.classList.add('password-strength--invalid');
      }
    }

    //toggle password
    var input = document.querySelector('.input__field--password'),
        eye = document.querySelector('.input__icon--eye'),
        eyeOff = document.querySelector('.input__icon--eye-off');

    // Toggle Password Field
    function togglePassword() {
        if (input.type === 'password') {
            input.type = 'text';
            eye.classList.add('input__icon--not-visible');
            eyeOff.classList.remove('input__icon--not-visible');
        } else {
            input.type = 'password';
            eye.classList.remove('input__icon--not-visible');
            eyeOff.classList.add('input__icon--not-visible');
        }
    };

    $('.page-login__half').click(function() {

      if($('.page-login__half').hasClass('page-login__half--active')) {

        $('.page-login__half').removeClass('page-login__half--active');
        $(this).addClass('page-login__half--active');
        $('.page-login__overlay').addClass('page-login__overlay--open');
      }
      else {

        $(this).addClass('page-login__half--active');
        $('.page-login__overlay').addClass('page-login__overlay--open');
      }
    });

    $('.page-login__title').click(function() {
      $(this).next($('.page-login__content')).toggleClass('page-login__content--open');
    });

    //hide the notification
    $('.notification__button').click(function() {
      $(this).parent('.notification__item').parent('.notification').hide();
    });
  </script>
@endpush
