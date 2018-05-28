@extends('layouts.frontend')

@section('title_and_meta')
    <title>Registriere dich | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
@endsection

@section('content')
	<div class="content__main">
		<ul class="notification">
		  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
		    @if(Session::has('alert-' . $msg))
		      <li class="notification__item">
		        <span class="notification__icon" data-feather="info"></span>
		        <p class="notification__text alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>

		        <button class="button-secondary notification-button close" data-dismiss="alert" aria-label="close">
		          <span class="button-secondary__label notification-button__label">OK</span>
		        </button>
		      </li>
		    @endif
		  @endforeach
		</ul>
	
		<div class="row">
		  <div class="column column--12">
		    <h2 class="title-page__title">Registriere dich</h2>
		    <p class="title-page__subtitle">Als registrierter Benutzer hast du nützliche Vorteile</p>

		    <ul class="list-benefits -spacing-c">
		    	<li class="list-benefits__item"><span data-feather="check-square" class="list-benefits__icon"></span>Deine Lieblingsfelder als Favoriten abspeichern</li>
		    	<li class="list-benefits__item"><span data-feather="check-square" class="list-benefits__icon"></span>Neue Felder vorschlagen</li>
		    	<li class="list-benefits__item"><span data-feather="check-square" class="list-benefits__icon"></span>Felder bewerten</li>
		    	<li class="list-benefits__item"><span data-feather="check-square" class="list-benefits__icon"></span>Fotos der Felder hochladen</li>
		    	<li class="list-benefits__item"><span data-feather="check-square" class="list-benefits__icon"></span>Unseren Newsletter mit den aktuellsten Tipps erhalten</li>
		    </ul>
		  </div>
		</div>

		<div class="row -spacing-a">
		  <div class="column column--12">
		    <hr class="divider">
		  </div>
		</div>

		<form class="form-horizontal" method="POST" action="{{ route('register') }}">
			<div class="row  -spacing-a">
				{{ csrf_field() }}
				<div class="column column--12">
					<h4 class="-typo-headline-04 -text-color-green">Allgemeine Angaben</h4>
					<label class="input -spacing-b">
					  <input type="text" name="userName" value="{{ old('userName') }}" class="input__field" placeholder="Dein Username*">
					  <span class="input__label">Dein Username*</span>
					  <div class="input__border"></div>
					</label>
					@if ($errors->has('userName'))
					  <div class="message message--error -spacing-d">
					    <div class="message__icon message__icon--error">
					      <span data-feather="alert-circle"></span>
					    </div>
					    <p class="message__text message__text--error">Dieses Feld ist ein Pflichtfeld</p>
					  </div>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="column column--12 column--m-6 -spacing-b">
					<label class="input">
					  <input type="text" name="firstName" value="{{ old('firstName') }}" class="input__field" placeholder="Dein Vorname*">
					  <span class="input__label">Dein Vorname*</span>
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
				<div class="column column--12 column--m-6 -spacing-b">
					<label class="input">
					  <input type="text" name="lastName" value="{{ old('lastName') }}" class="input__field" placeholder="Dein Nachname*">
					  <span class="input__label">Dein Nachname*</span>
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
			</div>

			<div class="row">
				<div class="column column--12 column--m-6 -spacing-b">
					<label class="input">
					  <input type="email" name="email" value="{{ old('email') }}" class="input__field" placeholder="Deine E-Mail Adresse*">
					  <span class="input__label">Deine E-Mail Adresse*</span>
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
				<div class="column column--12 column--m-6 -spacing-b">
					<label class="input">
					  <input type="text" name="birthdate" value="{{ old('birthdate') }}" class="input__field" placeholder="Dein Geburtsdatum (TT.MM.JJJ)">
					  <span class="input__label">Dein Geburtsdatum (TT.MM.JJJ)</span>
					  <div class="input__border"></div>
					</label>
				</div>
			</div>

			<div class="row">
				<div class="column column--12 column--m-3 -spacing-b">
					<label class="input">
					  <input type="text" name="postalCode" value="{{ old('postalCode') }}" class="input__field" placeholder="PLZ">
					  <span class="input__label">PLZ</span>
					  <div class="input__border"></div>
					</label>
				</div>
				<div class="column column--12 column--m-9 -spacing-b">
					<label class="input">
					  <input type="text" name="city" value="{{ old('city') }}" class="input__field" placeholder="Dein Wohnort">
					  <span class="input__label">Dein Wohnort</span>
					  <div class="input__border"></div>
					</label>
				</div>
			</div>

			<div class="row">
				<div class="column column--12 column--m-6 -spacing-b"> 
					<h4 class="-typo-headline-04 -text-color-green">Wähle dein Geschlecht*</h4>
					<label class="input-radio -spacing-d">
					  <input type="radio" class="input-radio__field" name="sex" value="male">
					  <span class="input-radio__label">männlich</span>
					</label>

					<label class="input-radio -spacing-d">
					  <input type="radio" class="input-radio__field" name="sex" value="female">
					  <span class="input-radio__label">weiblich</span>
					</label>

					<label class="input-radio -spacing-d">
					  <input type="radio" class="input-radio__field" name="sex" value="neutral">
					  <span class="input-radio__label">neutral</span>
					</label>

					@if ($errors->has('sex'))
					  <div class="message message--error -spacing-d">
					    <div class="message__icon message__icon--error">
					      <span data-feather="alert-circle"></span>
					    </div>
					    <p class="message__text message__text--error">Dieses Feld ist ein Pflichtfeld</p>
					  </div>
					@endif

				</div>
				<div class="column column--12 column--m-6 -spacing-b"> 
					<h4 class="-typo-headline-04 -text-color-green">Möchtest du den beachfelder.de-Newsletter erhalten?</h4>

					<label class="input-toggle -spacing-d">
					  <input type="hidden" class="input-toggle__hidden" name="newsletterSubscribed" value="1">
					  <input type="checkbox" class="input-toggle__field" name="newsletterSubscribed" value="1">
					  <span class="input-toggle__switch"></span>
					  <span class="input-toggle__label">Ja</span>
					</label>
				</div>
			</div>

			<div class="row">
				<div class="column column--12 column--m-6 -spacing-b">
					<label class="input">
					  <input type="password" name="password" value="{{ old('password') }}" class="input__field input__field--password" placeholder="Dein Passwort*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}">
					  <span class="input__label">Dein Passwort*</span>
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
				<div class="column column--12 column--m-6 -spacing-b">
					<label class="input">
					  <input type="password" name="password_confirmation" class="input__field input__field--password-repeat" placeholder="Passwort wiederholen*">
					  <span class="input__label">Passwort wiederholen*</span>
					  <div class="input__border"></div>
					  <span class="input__icon input__icon--eye-repeat" data-feather="eye" onclick="togglePasswordRepeat()"></span>
					  <span class="input__icon input__icon--eye-off-repeat input__icon--not-visible" data-feather="eye-off" onclick="togglePasswordRepeat()"></span>
					</label>
				</div>
			</div>

			<div class="row">
				<div class="column column--12 -spacing-b">
				  <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-c">Damit dein Passwort sicher ist, sollte es folgendes beinhalten</p>
				  <p id="letter" class="password-strength password-strength--invalid -spacing-d">mindestens einen Kleinbuchstaben</p>
				  <p id="capital" class="password-strength password-strength--invalid -spacing-d">mindestens einen Großbuchstaben</p>
				  <p id="number" class="password-strength password-strength--invalid -spacing-d">mindestens eine Zahl</p>
				  <p id="specialChar" class="password-strength password-strength--invalid -spacing-d">mindestens ein Sonderzeichen</p>
				  <p id="length" class="password-strength password-strength--invalid -spacing-d">eine Mindestlänge von 8 Zeichen</p>
				</div>
			</div>

			<div class="row">
				<div class="column column--12 -spacing-b">
				  <button class="button-primary btn-register">
				    <span class="button-primary__label">Jetzt kostenlos registrieren</span>
				    <span class="button-primary__label button-primary__label--hover">Jetzt kostenlos registrieren</span>
				  </button>
				</div>
			</div>
		</form>
	</div> <!-- .content__main ENDE -->
@endsection


@push('scripts')
  <script>
  	var myInput = document.querySelector('.input__field--password');
    var letter = document.getElementById('letter');
    var capital = document.getElementById('capital');
    var number = document.getElementById('number');
    var specialChar = document.getElementById('specialChar');
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

      // Validate specialChars
      var specialChars = /[~`!#$%\^&*+=\-\–[\]\\';.,/{}|\\":<>\?]/g;
      if(myInput.value.match(specialChars)) {
        specialChar.classList.remove('password-strength--invalid');
        specialChar.classList.add('password-strength--valid');
      } else {
        specialChar.classList.remove('password-strength--valid');
        specialChar.classList.add('password-strength--invalid');
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

    var inputRepeat = document.querySelector('.input__field--password-repeat'),
        eyeRepeat = document.querySelector('.input__icon--eye-repeat'),
        eyeOffRepeat = document.querySelector('.input__icon--eye-off-repeat');

    // Toggle Password Repeat Field
    function togglePasswordRepeat() {
        if (inputRepeat.type === 'password') {
            inputRepeat.type = 'text';
            eyeRepeat.classList.add('input__icon--not-visible');
            eyeOffRepeat.classList.remove('input__icon--not-visible');
        } else {
            inputRepeat.type = 'password';
            eyeRepeat.classList.remove('input__icon--not-visible');
            eyeOffRepeat.classList.add('input__icon--not-visible');
        }
    };

    //hide the notification
    $('.notification-button').click(function() {
      $(this).parent('.notification__item').parent('.notification').hide();
    });

    $(document).ready(function() {
      var checkbox = $('.input-toggle__field');
      var hint = $('.hint').hide();

      if(checkbox.val() == 1) {
        checkbox.attr('checked', true);
        checkbox.parent().find('.input-toggle__label').text('Ja');
        hint.slideToggle();
      }
    });

    $('.input-toggle__field').click(function() {
      if($(this).is(':checked')) {
        $(this).parent().find('.input-toggle__label').text('Ja');
        $(this).parent().find('.input-toggle__hidden').val(1);
        $(this).val(1);
        $('.hint').slideToggle();
      } else {
        $(this).parent().find('.input-toggle__label').text('Nein');
        $(this).parent().find('.input-toggle__hidden').val(0);
        $(this).val(0);
        $('.hint').slideToggle();
      }
    });
  </script>
@endpush