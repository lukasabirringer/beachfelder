@extends('layouts.frontend')

@section('title_and_meta')
    <title>Melde dich an | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
@endsection

@section('content')
  @if (\Session::has('error'))
    <ul class="notification">
      <li class="notification__item">
        <span class="notification__icon" data-feather="info"></span>
        <p class="notification__text">{!! \Session::get('error') !!}</p>

        <button class="button-secondary notification-button close" data-dismiss="alert" aria-label="close">
          <span class="button-secondary__label notification-button__label">OK</span>
        </button>
      </li>
    </ul>
  @endif
  <div class="content__main">
    <div class="row">
      <div class="column column--12">
        <h2 class="title-page__title">Melde dich an</h2>
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <div class="row">
        <div class="column column--12 column--m-6 -spacing-a">
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
        <div class="column column--12 column--m-6 -spacing-a">
          <label class="input">
            <input type="password" name="password" class="input__field input__field--password-login" placeholder="Passwort">
            <span class="input__label">Passwort</span>
            <div class="input__border"></div>
            <span class="input__icon input__icon--eye-login" data-feather="eye" onclick="togglePasswordLogin()"></span>
            <span class="input__icon input__icon--eye-off-login input__icon--not-visible" data-feather="eye-off" onclick="togglePasswordLogin()"></span>
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
      </div>

      <div class="row">
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

          <p class="-typo-copy -text-color-gray-01">Noch nicht angemeldet? Dann <a class="link-text" href="{{ route('register') }}">registriere dich</a> gleich.</p>
        </div>
      </div>
    </form>
  </div> <!-- .content__main ENDE -->
@endsection

@push('scripts')
  <script>
    var inputLogin = document.querySelector('.input__field--password-login'),
        eyeLogin = document.querySelector('.input__icon--eye-login'),
        eyeOffLogin = document.querySelector('.input__icon--eye-off-login');

    // Toggle Password Login Field
    function togglePasswordLogin() {
        console.log(inputLogin);

        if (inputLogin.type === 'password') {
            inputLogin.type = 'text';
            eyeLogin.classList.add('input__icon--not-visible');
            eyeOffLogin.classList.remove('input__icon--not-visible');
        } else {
            inputLogin.type = 'password';
            eyeLogin.classList.remove('input__icon--not-visible');
            eyeOffLogin.classList.add('input__icon--not-visible');
        }
    };

    //hide the notification
    $('.notification-button').click(function() {
      $(this).parent('.notification__item').parent('.notification').hide();
    });
  </script>
@endpush
