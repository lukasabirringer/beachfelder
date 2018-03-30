@extends('layouts.frontend')

@section('content')

<div class="content__main">
  <div id="common"></div>
  <div class="row">
    <div class="column column--12">
      <h2 class="title-page__title">Bearbeite dein Profil</h2>
    </div>
  </div>
<div class="flash-message">
@foreach (['danger', 'warning', 'success', 'info'] as $msg)
@if(Session::has('alert-' . $msg))

<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
@endif
@endforeach
</div>
  <div class="row">
    <div class="column column--8">
      <div class="row">
        <div class="column column--12 column--s-6 column--m-4">
          <div class="icon-text -spacing-b">
            <span class="icon-text__icon" data-feather="user"></span>
            <span class="icon-text__text">{{ $user->firstName }} {{ $user->lastName }} <br> {{ $user->birthdate }}</span>
          </div>
        </div>
        <div class="column column--12 column--s-6 column--m-4">
          <div class="icon-text -spacing-b">
            <span class="icon-text__icon" data-feather="map-pin"></span>
            <span class="icon-text__text">{{ $user->postalCode }} <br> {{ $user->city }}</span>
          </div>
        </div>
        <div class="column column--12 column--s-6 column--m-4">
          <div class="icon-text -spacing-b">
            <span class="icon-text__icon" data-feather="info"></span>
            <span class="icon-text__text">Favoriten: {{ $countFavorites }}<br>Eingereichte Felder: {{ $countSubmits }}</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="column column--12">
      <hr class="divider">
    </div>
  </div>

  <div class="row -spacing-a">
    <form method="POST" action="{{ URL::route('profile.update') }}" class="form form--edit-profile">
      {{ csrf_field() }}
      <div class="column column--12 column--m-3 profile-edit__column">
        <p class="-typo-copy -text-color-gray-01"><a href="#common" class="profile-edit__link link-text">Allgemeine Informationen</a></p>
        <p class="-typo-copy -text-color-gray-01 -spacing-b"><a href="#password" class="profile-edit__link link-text">Passwort</a></p>

        <p class="-typo-copy -text-color-gray-01 -spacing-b"><a href="#profile-image" class="profile-edit__link link-text">Profilbild</a></p>

        <p class="-typo-copy -text-color-gray-01 -spacing-b"><a href="#your-account" class="profile-edit__link link-text">Dein Account</a></p>
      </div>

      <div class="column column--12 column--m-9">
        <h4 class="-typo-headline-04 -text-color-petrol">Deine Informationen</h4>
        <div class="row">
          <div class="column column--12 column--m-6">
            <label class="input -spacing-b">
              <input type="text" class="input__field" name="userName" value="{{ $user->userName }}">
              <span class="input__label">Username</span>
            </label>
            @if ($errors->has('userName'))
                <span class="help-block">
                    <strong>{{ $errors->first('userName') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="row">
          <div class="column column--12 column--m-6">

            <label class="input -spacing-b">
              <input type="text" class="input__field" name="firstName" value="{{ $user->firstName }}">
              <span class="input__label">Vorname</span>
            </label>
            @if ($errors->has('firstName'))
                <span class="help-block">
                    <strong>{{ $errors->first('firstName') }}</strong>
                </span>
            @endif

            <label class="input -spacing-b">
              <input type="text" class="input__field" name="postalCode" value="{{ $user->postalCode }}">
              <span class="input__label">PLZ</span>
            </label>
            @if ($errors->has('postalCode'))
                <span class="help-block">
                    <strong>{{ $errors->first('postalCode') }}</strong>
                </span>
            @endif

            <label class="input -spacing-b">
              <input type="text" class="input__field input__field--date datepicker-here" data-position="top left" placeholder="Geburtstag" name="birthdate" value="{{ $user->birthdate }}">
              <span class="input__label">Geburstag</span>
            </label>
            @if ($errors->has('birthdate'))
                <span class="help-block">
                    <strong>{{ $errors->first('birthdate') }}</strong>
                </span>
            @endif

          </div>
          <div class="column column--12 column--m-6">

            <label class="input -spacing-b">
              <input type="text" class="input__field" name="lastName" value="{{ $user->lastName }}">
              <span class="input__label">Nachname</span>
            </label>
            @if ($errors->has('lastName'))
                <span class="help-block">
                    <strong>{{ $errors->first('lastName') }}</strong>
                </span>
            @endif

            <label class="input -spacing-b">
              <input type="text" class="input__field" name="city" value="{{ $user->city }}">
              <span class="input__label">Ort</span>
            </label>
            @if ($errors->has('city'))
                <span class="help-block">
                    <strong>{{ $errors->first('city') }}</strong>
                </span>
            @endif

            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
              Geschlecht
            </p>
            <label class="input-radio -spacing-b">
              <input type="radio" class="input-radio__field" name="sex" value="man" checked="checked">
              <span class="input-radio__label">männlich</span>
            </label>
            <label class="input-radio -spacing-b">
              <input type="radio" class="input-radio__field" name="sex" value="woman">
              <span class="input-radio__label">weiblich</span>
            </label>
            <label class="input-radio -spacing-b">
              <input type="radio" class="input-radio__field" name="sex" value="neutral">
              <span class="input-radio__label">neutral</span>
            </label>
            @if ($errors->has('sex'))
                <span class="help-block">
                    <strong>{{ $errors->first('sex') }}</strong>
                </span>
            @endif
          </div>
          <div id="password"></div>
        </div>
        <div class="row -spacing-a">

          <div class="column column--12">
            <hr class="divider">
          </div>
        </div>

        <div class="row -spacing-a">
          <div class="column column--12">
            <h4 class="-typo-headline-04 -text-color-petrol">Dein Passwort</h4>
          </div>
          <div class="column column--12">
            <label class="input -spacing-b">
              <input type="email" class="input__field" name="email" value="{{ $user->email }}">
              <span class="input__label">E-Mail</span>
            </label>
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="column column--12 column--m-6">
            <label class="input -spacing-b">
              <input type="password" class="input__field" name="password" value="{{ $user->password }}">
              <span class="input__label">Passwort</span>
            </label>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="column column--12 column--m-6">
            <label class="input -spacing-b">
              <input type="password" class="input__field" value="{{ $user->password }}" name="password_confirmation">
              <span class="input__label">Passwort wiederholen</span>
            </label>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
          </div>
        </div>
        <div class="row -spacing-a">
        <div class="column column--12">
          <h4 class="-typo-headline-04 -text-color-petrol">Dein Account</h4>
        </div>
        <div class="column column--12">
          <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">Deine Privatsphären-Einstellungen</p>
        </div>
        <div class="column column--12 -spacing-d">
          <label class="input-toggle">
            <input type="checkbox" name="publicProfile" value="{{ $user->publicProfile }}" class="input-toggle__field">
            <span class="input-toggle__switch"></span>
            <span class="input-toggle__label">Meine Profil öffentlich machen</span>
            <p class="-typo-copy -text-color-gray-01 -spacing-b">
              Wenn du deinen Account auf öffentlich stellt, sehen andere User folgende Informationen von dir:
              <ul>
              <li>Deinen Usernamen</li>
              <li>Deine Postleitzahl</li>
              <li>Dein Alter</li>
              <li>Deine favorisierten Beachfelder</li>
              </ul>
            </p>
          </label>
        </div>
        </div>

        <div class="row -spacing-a" id="submit">
          <div class="column column--12">
            <button class="button-primary profile-edit__button" type="submit">
              <span class="button-primary__label">Profil speichern</span>
              <span class="button-primary__label button-primary__label--hover">Profil speichern</span>
            </button>
          </div>
        </div>
      </form>
        <div id="profile-image"></div>

        <div class="row -spacing-a">
          <div class="column column--12">
            <hr class="divider">
          </div>
        </div>

        <form method="POST" action="{{ url('profil/uploadprofilepicture/') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="row -spacing-a">
            <div class="column column--12">
              <h4 class="-typo-headline-04 -text-color-petrol">Dein Profilbild</h4>
            </div>
            <div class="column column--12 column--m-6 -spacing-b">
              <p class="-typo-copy -text-color-gray-01">Dein aktuelles Profilbild</p>
              <div class="image-profile -spacing-d">
                @if($user->pictureName !== 'placeholder-user.png' )
                  <img src="../../uploads/profilePictures/{{ $user->id }}/{{ $user->pictureName }}">
                @else
                  <img src="../../uploads/profilePictures/fallback/placeholder-user.png" class="image image--max-width">
                @endif

              </div>
            </div>
            <div class="column column--12 column--m-6 -spacing-b">
              <p class="-typo-copy -text-color-gray-01">Dein neues Profilbild</p>
              <label class="input-fileupload">
                <input id="profile-img" type="file" name="profilePicture" class="input-fileupload__field" data-multiple-caption="{count} files selected" />
              </label>
              @if ($errors->has('profilePicture'))
                <div class="alert alert-danger">{{ $errors->first('profilePicture', ':message') }}</div>
              @endif
              <img src="" class="image image--max-width" id="profile-img-tag"/>
            </div>
          </div>
          <div class="row">
            <div class="column column--12 column--m-6">
              <button type="button" class="button-primary button-primary--red -spacing-b" onclick="window.location.href='{{ url('') }}/profile/profilbild-loeschen'" >
                <span class="button-primary__label">Profilbild löschen</span>
                <span class="button-primary__label button-primary__label--hover">Profilbild löschen</span>
              </button>
            </div>
            <div class="column column--12 column--m-6">
              <button class="button-primary profile-edit__button -spacing-b" type="submit">
                <span class="button-primary__label">Profilbild speichern</span>
                <span class="button-primary__label button-primary__label--hover">Profil speichern</span>
              </button>
            </div>
          </div>
          <div id="your-account"></div>
        </form>
        <div class="row -spacing-a">
          <div class="column column--12">
            <hr class="divider">
          </div>
        </div>

        <div class="row -spacing-b" id="password">
          <div class="column column--12">
            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-a">Deinen Account löschen</p>
            <p class="-typo-copy -text-color-gray-01">
              Dass du deinen Account bei <span class="-typo-copy--bold">beachfelder.de</span> löschen möchtest, finden wir sehr schade. Bitte beachte, dass dieser Vorgang kann nicht rückgänging gemacht werden und du dies nur machen solltest, wenn du dir wirklich sicher bist.
            </p>
          </div>
          <div class="column column--12 column--m-6 -spacing-b">
            <a class="button-primary button-primary--red">
              <span class="button-primary__label">Ja, ich möchte meinen Account löschen</span>
              <span class="button-primary__label button-primary__label--hover">Bist du dir wirklich sicher?</span>
            </a>
          </div>
        </div>
      </div>
  </div>
  <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });
</script>


@endsection
