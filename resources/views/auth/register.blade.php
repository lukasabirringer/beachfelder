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
		  </div>
		</div>
		<div class="row">
			<div class="column column--12 column--s-6 column--m-3">
				<div class="icon-text -spacing-b">
				  <span class="icon-text__icon" data-feather="check-square"></span>
				  <span class="icon-text__text">
				    Deine Lieblingsfelder
				    <br> als Favoriten abspeichern
				  </span>
				</div>
			</div>
			<div class="column column--12 column--s-6 column--m-3">
				<div class="icon-text -spacing-b">
				  <span class="icon-text__icon" data-feather="check-square"></span>
				  <span class="icon-text__text">
				    Neue Felder 
				    <br> vorschlagen
				  </span>
				</div>
			</div>
			<div class="column column--12 column--s-6 column--m-3">
				<div class="icon-text -spacing-b">
				  <span class="icon-text__icon" data-feather="check-square"></span>
				  <span class="icon-text__text">
				    Deine Lieblingsfelder 
				    <br> bewerten
				  </span>
				</div>
			</div>
			<div class="column column--12 column--s-6 column--m-3">
				<div class="icon-text -spacing-b">
				  <span class="icon-text__icon" data-feather="check-square"></span>
				  <span class="icon-text__text">
				    Fotos der Felder 
				    <br> hochladen
				  </span>
				</div>
			</div>
		</div>
		<form class="form-horizontal" method="POST" action="{{ route('register') }}">
			{{ csrf_field() }}
			<div class="row">
				<div class="column column--12 -align-center -spacing-a">
					<div class="number -text-color-green -typo-copy -typo-copy--bold">1</div>
					<h3 class="-typo-headline-04 -text-color-green -spacing-c">Allgemeines</h3>
				</div>
			</div>

			<div class="row">
				<div class="column column--12 column--s-2">
				</div>
				<div class="column column--12 column--s-8">
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
					    <p class="message__text message__text--error">{{ $errors->first('userName', ':message') }}</p>
					  </div>
					@endif
				</div>
				<div class="column column--12 column--s-2">
				</div>
			</div>
			<div class="row">
				<div class="column column--12 column--s-6">
					<label class="input -spacing-b">
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
					    <p class="message__text message__text--error">{{ $errors->first('password', ':message') }}</p>
					  </div>
					@endif
				</div>
				<div class="column column--12 column--s-6">
					<label class="input -spacing-b">
					  <input type="password" name="password_confirmation" class="input__field input__field--password-repeat" placeholder="Passwort wiederholen*">
					  <span class="input__label">Passwort wiederholen*</span>
					  <div class="input__border"></div>
					  <span class="input__icon input__icon--eye-repeat" data-feather="eye" onclick="togglePasswordRepeat()"></span>
					  <span class="input__icon input__icon--eye-off-repeat input__icon--not-visible" data-feather="eye-off" onclick="togglePasswordRepeat()"></span>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column column--12">
					<p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-c">Damit dein Passwort sicher ist, sollte es folgendes beinhalten</p>
					<span id="letter" class="password-strength password-strength--invalid -spacing-d">mindestens einen Kleinbuchstaben</span>
					<span id="capital" class="password-strength password-strength--invalid -spacing-d">mindestens einen Großbuchstaben</span>
					<span id="number" class="password-strength password-strength--invalid -spacing-d">mindestens eine Zahl</span>
					<span id="specialChar" class="password-strength password-strength--invalid -spacing-d">mindestens ein Sonderzeichen</span>
					<span id="length" class="password-strength password-strength--invalid -spacing-d">eine Mindestlänge von 8 Zeichen</span>
				</div>
			</div>
			<div class="row -spacing-a">
				<div class="column column--12 -align-center -spacing-a">
					<div class="number -text-color-green -typo-copy -typo-copy--bold">2</div>
					<h3 class="-typo-headline-04 -text-color-green -spacing-c">Kontaktdaten</h3>
				</div>
			</div>

			<div class="row">
				<div class="column column--12 column--s-6">
					<label class="input -spacing-b">
					  <input type="text" name="firstName" value="{{ old('firstName') }}" class="input__field" placeholder="Dein Vorname*">
					  <span class="input__label">Dein Vorname*</span>
					  <div class="input__border"></div>
					</label>
					@if ($errors->has('firstName'))
					  <div class="message message--error -spacing-d">
					    <div class="message__icon message__icon--error">
					      <span data-feather="alert-circle"></span>
					    </div>
					    <p class="message__text message__text--error">{{ $errors->first('firstName', ':message') }}</p>
					  </div>
					@endif
				</div>
				<div class="column column--12 column--s-6">
					<label class="input -spacing-b">
					  <input type="text" name="lastName" value="{{ old('lastName') }}" class="input__field" placeholder="Dein Nachname*">
					  <span class="input__label">Dein Nachname*</span>
					  <div class="input__border"></div>
					</label>
					@if ($errors->has('lastName'))
					  <div class="message message--error -spacing-d">
					    <div class="message__icon message__icon--error">
					      <span data-feather="alert-circle"></span>
					    </div>
					    <p class="message__text message__text--error">{{ $errors->first('lastName', ':message') }}</p>
					  </div>
					@endif
				</div>
			</div>

			<div class="row">
				<div class="column column--12 column--s-6">
					<label class="input -spacing-b">
					  <input type="text" name="email" value="{{ old('email') }}" class="input__field" placeholder="Deine E-Mail Adresse*">
					  <span class="input__label">Deine E-Mail Adresse*</span>
					  <div class="input__border"></div>
					</label>
					@if ($errors->has('email'))
					  <div class="message message--error -spacing-d">
					    <div class="message__icon message__icon--error">
					      <span data-feather="alert-circle"></span>
					    </div>
					    <p class="message__text message__text--error">{{ $errors->first('email', ':message') }}</p>
					  </div>
					@endif
				</div>
				<div class="column column--12 column--s-6">
					<label class="input -spacing-b">
					  <input type="text" name="birthdate" value="{{ old('birthdate') }}" class="input__field" placeholder="Dein Geburtsdatum (TT.MM.JJJ)">
					  <span class="input__label">Dein Geburtsdatum (TT.MM.JJJ)</span>
					  <div class="input__border"></div>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column column--12 column--s-2">
					<label class="input -spacing-b">
						<input type="text" name="postalCode" pattern="[0-9]{5}" value="{{ old('postalCode') }}" class="input__field" placeholder="PLZ">
					  <span class="input__label">PLZ</span>
					  <div class="input__border"></div>
					</label>
				</div>
				<div class="column column--12 column--s-4">
					<label class="input -spacing-b">
						<input type="text" name="city" value="{{ old('city') }}" class="input__field" placeholder="Dein Wohnort">
						<span class="input__label">Dein Wohnort</span>
						<div class="input__border"></div>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column column--12">
					<p class="-typo-copy -typo-copy--bold -text-color-green -spacing-b">Dein Geschlecht*</p>
				</div>
				<div class="column column--12 column--s-2">
					<label class="input-radio -spacing-b">
						<input type="radio" class="input-radio__field" name="sex" value="male">
					  <span class="input-radio__label">männlich</span>
					</label>
         </div>
         <div class="column column--12 column--s-2">
         	<label class="input-radio -spacing-b">
						<input type="radio" class="input-radio__field" name="sex" value="female">
						<span class="input-radio__label">weiblich</span>
					</label>
        </div>
        <div class="column column--12 column--s-2">
        	<label class="input-radio -spacing-b">
						<input type="radio" class="input-radio__field" name="sex" value="neutral">
					  <span class="input-radio__label">neutral</span>
					</label>
        </div>
        <div class="column column--12 column--s-6">
        	@if ($errors->has('sex'))
        		<div class="message message--error -spacing-d">
        	 		<div class="message__icon message__icon--error">
        	 	  	<span data-feather="alert-circle"></span>
        	 	  </div>
        	 	  <p class="message__text message__text--error">Bitte wähle dein Geschlecht</p>
        	 	</div>
        	 @endif
        </div>
			</div>
			
			<div class="row -spacing-a">
				<div class="column column--12 -align-center -spacing-a">
					<div class="number -text-color-green -typo-copy -typo-copy--bold">3</div>
					<h3 class="-typo-headline-04 -text-color-green -spacing-c">Sonstiges</h3>
				</div>
			</div>

			<div class="row">
				<div class="column column--12">
					<p class="-typo-copy -typo-copy--bold -text-color-green -spacing-b">Möchtest du den beachfelder.de-Newsletter erhalten?</p>
					<label class="input-toggle -spacing-d">
					  <input type="hidden" class="input-toggle__hidden" name="newsletterSubscribed" value="1">
					  <input type="checkbox" class="input-toggle__field newsletter" name="newsletterSubscribed" value="1">
					  <span class="input-toggle__switch"></span>
					  <span class="input-toggle__label " style="max-width: 90%; vertical-align: middle;">Ja. Ich bin damit einverstanden, dass mich beachfelder.de über ausgewählte Themen (Aktuelle Tipps über Beachvolleyball, Beachvolleyball-Veranstaltungen und neu eingereichte Beachvolleyball-Felder) informieren darf. Meine Daten werden ausschließlich zu diesem Zweck genutzt. Insbesondere erfolgt keine Weitergabe an unberechtigte Dritte. Mir ist bekannt, dass ich meine Einwilligung jederzeit mit Wirkung für die Zukunft widerrufen kann. Dies kann ich über folgende Kanäle tun: elektronisch über einen Abmeldelink im jeweiligen Newsletter, per E-Mail an: presse@beachfelder.de. Es gilt die Es gilt die Datenschutzerklärung von beachfelder.de, die auch weitere Informationen über Möglichkeiten zur Berichtigung, Löschung und Sperrung meiner Daten beinhaltet.</span>
					</label>
				</div>
			</div>
			<div class="row">
				<div class="column column--12">
					<p class="-typo-copy -typo-copy--bold -text-color-green -spacing-a">Deine Daten sind sicher bei uns -  Versprochen!</p>
					<label class="input-toggle agreed">
					  <input type="checkbox" class="input-toggle__field" name="agreed">
					  <span class="input-toggle__switch"></span>
					  <span class="input-toggle__label -spacing-d" style="max-width: 90%; vertical-align: middle;">Ja, ich habe die <a class="link-text" href="{{ url('/page/datenschutzerklaerung') }}">Datenschutzerklärung</a> zur Kenntnis genommen und bin damit einverstanden, dass die von mir angegebenen Daten elektronisch erhoben und gespeichert werden. Meine Daten werden dabei nur streng zweckgebunden zur Bearbeitung und Beantwortung meiner Anfrage benutzt. Mit dem Absenden des Kontaktformulars erkläre ich mich mit der Verarbeitung einverstanden.</span>
					</label>
				</div>
			</div>

			<div class="row">
				<div class="column column--12 -spacing-b">
				  <button class="button-primary btn-register" disabled="disabled">
				    <span class="button-primary__label">Jetzt kostenlos registrieren</span>
				    <span class="button-primary__label button-primary__label--hover">Jetzt kostenlos registrieren</span>
				  </button>
				</div>
			</div>

		</form>

		<!-- <form class="form-horizontal" method="POST" action="{{ route('register') }}">
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
					    <p class="message__text message__text--error">Bitte gib' deinen Vornamen an</p>
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
					    <p class="message__text message__text--error">Bitte gib' deinen Nachnamen an</p>
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
					    <p class="message__text message__text--error">Bitte gib' deine E-Mail Adresse an</p>
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
					<label class="input-radio -spacing-b">
					  <input type="radio" class="input-radio__field" name="sex" value="male">
					  <span class="input-radio__label">männlich</span>
					</label>

					<label class="input-radio -spacing-b">
					  <input type="radio" class="input-radio__field" name="sex" value="female">
					  <span class="input-radio__label">weiblich</span>
					</label>

					<label class="input-radio -spacing-b">
					  <input type="radio" class="input-radio__field" name="sex" value="neutral">
					  <span class="input-radio__label">neutral</span>
					</label>

					@if ($errors->has('sex'))
					  <div class="message message--error -spacing-d">
					    <div class="message__icon message__icon--error">
					      <span data-feather="alert-circle"></span>
					    </div>
					    <p class="message__text message__text--error">Bitte wähle dein Geschlecht</p>
					  </div>
					@endif

				</div>
				<div class="column column--12 column--m-6 -spacing-b"> 
					<h4 class="-typo-headline-04 -text-color-green">Möchtest du den beachfelder.de-Newsletter erhalten?</h4>

					<label class="input-toggle -spacing-d">
					  <input type="hidden" class="input-toggle__hidden" name="newsletterSubscribed" value="1">
					  <input type="checkbox" class="input-toggle__field newsletter" name="newsletterSubscribed" value="1">
					  <span class="input-toggle__switch"></span>
					  <span class="input-toggle__label">Ja</span>
					</label>
					<span class="-typo-copy -typo-copy--small -text-color-gray-01">Ich bin damit einverstanden, dass mich beachfelder.de über ausgewählte Themen (Aktuelle Tipps über Beachvolleyball, Beachvolleyball-Veranstaltungen und neu eingereichte Beachvolleyball-Felder) informieren darf. Meine Daten werden ausschließlich zu diesem Zweck genutzt. Insbesondere erfolgt keine Weitergabe an unberechtigte Dritte. Mir ist bekannt, dass ich meine Einwilligung jederzeit mit Wirkung für die Zukunft widerrufen kann. Dies kann ich über folgende Kanäle tun: elektronisch über einen Abmeldelink im jeweiligen Newsletter, per E-Mail an: presse@beachfelder.de. Es gilt die Es gilt die Datenschutzerklärung von beachfelder.de, die auch weitere Informationen über Möglichkeiten zur Berichtigung, Löschung und Sperrung meiner Daten beinhaltet.</span>
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
					    <p class="message__text message__text--error">Bitte gib dein Passwort an</p>
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
					<label class="input-toggle agreed">
					  <input type="checkbox" class="input-toggle__field" name="agreed">
					  <span class="input-toggle__switch"></span>
					  <span class="input-toggle__label -spacing-d" style="max-width: 90%; vertical-align: middle;">Ja, ich habe die <a class="link-text" href="{{ url('/page/datenschutzerklaerung') }}">Datenschutzerklärung</a> zur Kenntnis genommen und bin damit einverstanden, dass die von mir angegebenen Daten elektronisch erhoben und gespeichert werden. Meine Daten werden dabei nur streng zweckgebunden zur Bearbeitung und Beantwortung meiner Anfrage benutzt. Mit dem Absenden des Kontaktformulars erkläre ich mich mit der Verarbeitung einverstanden.</span>
					</label>
					<span class="-typo-copy -text-color-gray-01"></span>
				</div>
			</div>

			<div class="row">
				<div class="column column--12 -spacing-b">
				  <button class="button-primary btn-register" disabled="disabled">
				    <span class="button-primary__label">Jetzt kostenlos registrieren</span>
				    <span class="button-primary__label button-primary__label--hover">Jetzt kostenlos registrieren</span>
				  </button>
				</div>
			</div>
		</form> -->
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
      var checkbox = $('.newsletter');

      if(checkbox.val() == 1) {
        checkbox.attr('checked', true);
      }
    });

    $('.newsletter').click(function() {
      if($(this).is(':checked')) {
        $(this).parent().find('.input-toggle__hidden').val(1);
        $(this).val(1);
      } else {
        $(this).parent().find('.input-toggle__hidden').val(0);
        $(this).val(0);
      }
    });

     $('.agreed').click(function () {
        //check if checkbox is checked
        if ($(this).children('.input-toggle__field').is(':checked')) {

            $('.button-primary').removeAttr('disabled'); //enable input

        } else {
            $('.button-primary').attr('disabled', true); //disable input
        }
    });
  </script>
@endpush