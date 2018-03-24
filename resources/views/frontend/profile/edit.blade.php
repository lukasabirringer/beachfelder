@extends('layouts.frontend')

@section('content')

<div class="content__main">
  <div id="common"></div>
  <div class="row">
    <div class="column column--12">
      <h2 class="title-page__title">Bearbeite dein Profil</h2>
    </div>
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
            <span class="icon-text__text">Favoriten: X<br>Eingereichte Felder: X</span>
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
    <form action="#" class="form form--edit-profile">
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
              <input type="text" class="input__field" name="" value="{{ $user->userName }}">
              <span class="input__label">Username</span>
            </label>
          </div>
        </div>
        <div class="row">
          <div class="column column--12 column--m-6">
            
            <label class="input -spacing-b">
              <input type="text" class="input__field" name="" value="{{ $user->firstName }}">
              <span class="input__label">Vorname</span>
            </label>

            <label class="input -spacing-b">
              <input type="text" class="input__field" name="" value="{{ $user->postalCode }}">
              <span class="input__label">PLZ</span>
            </label>

            <label class="input -spacing-b">
              <input type="text" class="input__field input__field--date datepicker-here" data-position="top left" placeholder="Geburtstag" name="" value="{{ $user->birthdate }}">
              <span class="input__label">Geburstag</span>
            </label>
            
          </div>
          <div class="column column--12 column--m-6">

            <label class="input -spacing-b">
              <input type="text" class="input__field" name="" value="{{ $user->lastName }}">
              <span class="input__label">Nachname</span>
            </label>

            <label class="input -spacing-b">
              <input type="text" class="input__field" name="" value="{{ $user->city }}">
              <span class="input__label">Ort</span>
            </label>

            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
              Geschlecht
            </p>
            <label class="input-radio -spacing-b">
              <input type="radio" class="input-radio__field" name="gender" value="man" checked="checked">
              <span class="input-radio__label">männlich</span>
            </label>
            <label class="input-radio -spacing-b">
              <input type="radio" class="input-radio__field" name="gender" value="woman">
              <span class="input-radio__label">weiblich</span>
            </label>
            <label class="input-radio -spacing-b">
              <input type="radio" class="input-radio__field" name="gender" value="neutral">
              <span class="input-radio__label">neutral</span>
            </label>
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
              <input type="email" class="input__field" name="" value="{{ $user->email }}">
              <span class="input__label">E-Mail Adresse</span>
            </label>
          </div>
          <div class="column column--12 column--m-6">
            <label class="input -spacing-b">
              <input type="password" class="input__field" name="" value="{{ $user->password }}">
              <span class="input__label">Passwort</span>
            </label>

          </div>
          <div class="column column--12 column--m-6">
            <label class="input -spacing-b">
              <input type="password" class="input__field">
              <span class="input__label">Passwort wiederholen</span>
            </label>
          </div>
        </div>
        <div id="profile-image"></div>
        
        <div class="row -spacing-a">
          <div class="column column--12">
            <hr class="divider">
          </div>
        </div>

        <div class="row -spacing-a">
          <div class="column column--12">
            <h4 class="-typo-headline-04 -text-color-petrol">Dein Profilbild</h4>
          </div>
          <div class="column column--12 column--m-6 -spacing-b">
            <p class="-typo-copy -text-color-gray-01">Dein aktuelles Profilbild</p>
            <div class="image-profile -spacing-d">
              <img src="/uploads/profilePictures/{{ $user->pictureName }}" class="profile-user__image">
            </div>
          </div>
          <div class="column column--12 column--m-6 -spacing-b">
            <p class="-typo-copy -text-color-gray-01">Dein neues Profilbild</p>
            <div class="dropzone -spacing-d" id="user-profile-image-upload">
              <span class="dropzone__hint dz-message">Ziehe hier dein neues Profilbild rein</span>
              <div class="image-profile fallback">
                <input type="file" name="file" />
              </div>
            </div>
          </div>
        </div>
        <div id="your-account"></div>

        <div class="row -spacing-a" id="submit">
          <div class="column column--12">
            <button class="button-primary profile-edit__button">
              <span class="button-primary__label">Profil speichern</span>
            </button>
          </div>
        </div>

        <div class="row -spacing-a">
          <div class="column column--12">
            <hr class="divider">
          </div>
        </div>

        <div class="row -spacing-a" id="password">
          <div class="column column--12">
            <h4 class="-typo-headline-04 -text-color-petrol">Dein Account</h4>
          </div>
          <div class="column column--12">
            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">Deine Privatsphären-Einstellungen</p>
          </div>
          <div class="column column--12 -spacing-d">
            <label class="input-toggle">
              <input type="checkbox" class="input-toggle__field">
              <span class="input-toggle__switch"></span>
              <span class="input-toggle__label">Meine Favoriten öffentlich machen</span>
            </label>
          </div>
          <div class="column column--12 -spacing-d">
            <label class="input-toggle">
              <input type="checkbox" class="input-toggle__field">
              <span class="input-toggle__switch"></span>
              <span class="input-toggle__label">Meine eingereichten Felder öffentlich machen</span>
            </label>
          </div>
          <div class="column column--12 column--m-6 -spacing-a">
            <button class="button-primary profile-edit__button">
              <span class="button-primary__label">Profil speichern</span>
            </button>
          </div>
          <div class="column column--12">
            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-a">Deinen Account löschen</p>
            <p class="-typo-copy -text-color-gray-01">
              Dass du deinen Account bei <span class="-typo-copy--bold">beachfelder.de</span> löschen möchtest, finden wir sehr schade. Bitte beachte, dass dieser Vorgang kann nicht rückgänging gemacht werden und du dies nur machen solltest, wenn du dir wirklich sicher bist.
            </p>
          </div>
          <div class="column column--12 column--m-6 -spacing-b">
            <a class="button-primary button-primary--red">
              <span class="button-primary__label">Ja, ich möchte meinen Account wirklich löschen</span>
            </a>
          </div>
        </div>
      </div>
    </form>
  </div>

</div><!-- .content__main ENDE -->

<!-- old stuff -->
<div class="container">
    <div class="row">

<form class="form-horizontal" action="{{ URL::route('profile.update') }}" method="POST" enctype="multipart/form-data">
<input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
          <label for="userName" class="col-sm-2 control-label">Name</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="userName" value="{{ $user->userName }}">
            @if ($errors->has('userName'))
              <div class="alert alert-danger">{{ $errors->first('userName', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="email" class="col-sm-2 control-label">E-Mail-Adresse</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" value="{{ $user->email }}">
            @if ($errors->has('email'))
              <div class="alert alert-danger">{{ $errors->first('email', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="firstName" class="col-sm-2 control-label">Vorname</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="firstName" value="{{ $user->firstName }}">
            @if ($errors->has('firstName'))
              <div class="alert alert-danger">{{ $errors->first('firstName', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="lastName" class="col-sm-2 control-label">Nachname</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="lastName" value="{{ $user->lastName }}">
            @if ($errors->has('lastName'))
              <div class="alert alert-danger">{{ $errors->first('lastName', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="postalCode" class="col-sm-2 control-label">PLZ</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="postalCode" value="{{ $user->postalCode }}">
            @if ($errors->has('postalCode'))
              <div class="alert alert-danger">{{ $errors->first('postalCode', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="city" class="col-sm-2 control-label">Stadt</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="city" value="{{ $user->city }}">
            @if ($errors->has('city'))
              <div class="alert alert-danger">{{ $errors->first('city', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="birthdate" class="col-sm-2 control-label">Geburtstag</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="birthdate" value="{{ $user->birthdate }}">
            @if ($errors->has('birthdate'))
              <div class="alert alert-danger">{{ $errors->first('birthdate', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="sex" class="col-sm-2 control-label">Geschlecht</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="sex" value="{{ $user->sex }}">
            @if ($errors->has('sex'))
              <div class="alert alert-danger">{{ $errors->first('sex', ':message') }}</div>
            @endif
          </div>
        </div>
        <div class="form-group">
          <label for="publicProfile" class="col-sm-2 control-label">öffentliches Profil?</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="publicProfile" value="{{ $user->publicProfile }}">
            @if ($errors->has('publicProfile'))
              <div class="alert alert-danger">{{ $errors->first('publicProfile', ':message') }}</div>
            @endif
          </div>
        </div>


        <div class="form-group">
          <label for="role" class="col-sm-2 control-label">Rolle</label>
          <div class="col-sm-10">
            <select class="form-control" name="role" class="selectpicker">
              <optgroup label="aktuelle Rolle">
                <option>{{ $user->role }}</option>
              </optgroup>
              <optgroup label="neue Rolle">
                <option value="registrated">registrated</option>
                <option value="betreiber">betreiber</option>
                <option value="admin">admin</option>
              </optgroup>
            </select>

          </div>
        </div>



        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Speichern</button>
          </div>
        </div>

      </form>

      <p>Letztes Update: {{ $user->updated_at }}</p>


    </div>
</div>

@endsection
