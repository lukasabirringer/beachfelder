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
      <div class="column column--12 column--m-3 profile-edit__column">
        <p class="-typo-copy -text-color-gray-01"><a href="#common" class="profile-edit__link link-text">Allgemeine Informationen</a></p>
        <p class="-typo-copy -text-color-gray-01 -spacing-b"><a href="#password" class="profile-edit__link link-text">Passwort</a></p>

        <p class="-typo-copy -text-color-gray-01 -spacing-b"><a href="#profile-image" class="profile-edit__link link-text">Profilbild</a></p>

        <p class="-typo-copy -text-color-gray-01 -spacing-b"><a href="#your-account" class="profile-edit__link link-text">Dein Account</a></p>
      </div>

      <div class="column column--12 column--m-9">
        <h4 class="-typo-headline-04 -text-color-petrol">Deine Informationen</h4>
        
        <form action="{{ URL::route('profile.update') }}" class="form">
          {{ csrf_field() }}
          <div class="row">
            <div class="column column--12 column--m-6">
              <label class="input -spacing-b">
                <input type="text" class="input__field" name="userName" value="{{ $user->userName }}">
                <span class="input__label">Username</span>
              </label>
            </div>
          </div>

          <div class="row">
            <div class="column column--12 column--m-6">
              <label class="input -spacing-b">
                <input type="text" class="input__field" name="firstName" value="{{ $user->firstName }}">
                <span class="input__label">Vorname</span>
              </label>

              <label class="input -spacing-b">
                <input type="text" class="input__field" name="postalCode" value="{{ $user->postalCode }}">
                <span class="input__label">PLZ</span>
              </label>

              <label class="input -spacing-b">
                <input type="text" class="input__field input__field--date datepicker-here" data-position="top left" placeholder="Geburtstag" name="birthdate" value="{{ $user->birthdate }}">
                <span class="input__label">Geburstag</span>
              </label>
            </div>

            <div class="column column--12 column--m-6">
              <label class="input -spacing-b">
                <input type="text" class="input__field" name="lastName" value="{{ $user->lastName }}">
                <span class="input__label">Nachname</span>
              </label>

              <label class="input -spacing-b">
                <input type="text" class="input__field" name="city" value="{{ $user->city }}">
                <span class="input__label">Ort</span>
              </label>

              <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">Geschlecht</p>
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
            </div>
            <div id="password"></div>

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
                  <input type="email" class="input__field" name="password" value="{{ $user->email }}">
                  <span class="input__label">E-Mail Adresse</span>
                </label>
              </div>
              <div class="column column--12 column--m-6">
                <label class="input -spacing-b">
                  <input type="password" class="input__field" name="password" value="">
                  <span class="input__label">Passwort</span>
                </label>
              </div>
              <div class="column column--12 column--m-6">
                <label class="input -spacing-b">
                  <input type="password" class="input__field" value="" name="password_confirmation">
                  <span class="input__label">Passwort wiederholen</span>
                </label>
              </div>
            </div>

            <div class="row -spacing-a" id="submit">
              <div class="column column--12">
                <button class="button-primary profile-edit__button" type="submit" disabled="disabled">
                  <span class="button-primary__label">Profil speichern</span>
                  <span class="button-primary__label button-primary__label--hover">Profil speichern</span>
                </button>
              </div>
            </div>
          </div>
        </form>

        <div id="profile-image"></div>

        <div class="row -spacing-a">
          <div class="column column--12">
            <hr class="divider">
          </div>
        </div>

        <form method="POST" action="{{ url('profil/uploadprofilepicture') }}" enctype="multipart/form-data">
          {{ csrf_field() }}

          <div class="row -spacing-a">
            <div class="column column--12">
              <h4 class="-typo-headline-04 -text-color-petrol">Dein Profilbild</h4>
            </div>

            <div class="column column--12 column--m-6 -spacing-b">
              <p class="-typo-copy -text-color-gray-01">Dein aktuelles Profilbild</p>

              @if($user->pictureName !== 'placeholder-user.png' )
                <img src="../../uploads/profilePictures/{{ $user->id }}/{{ $user->pictureName }}" class="image image--max-width -spacing-d">
              @else
                <img src="../../uploads/profilePictures/fallback/placeholder-user.png" class="image image--max-width -spacing-d">
              @endif
            </div>

            <div class="column column--12 column--m-6 -spacing-b">
              <p class="-typo-copy -text-color-gray-01">Dein neues Profilbild</p>

              <label class="input-fileupload">
                <input type="file" name="profilePicture" class="input-fileupload__field" data-multiple-caption="{count} files selected" />
              </label>
            </div>
          </div>

          <div class="row">
            <div class="column column--12 column--m-6">
            </div>
            <div class="column column--12 column--m-6">
              <button class="button-primary profile-edit__button -spacing-b" type="submit" disabled="disabled">
                <span class="button-primary__label">Profil speichern</span>
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

        <div class="row -spacing-a" id="password">
          <div class="column column--12">
            <h4 class="-typo-headline-04 -text-color-petrol">Dein Account</h4>
          </div>
          <div class="column column--12">
            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">Deine Privatsphären-Einstellungen</p>
          </div>
          <div class="column column--12 -spacing-d">
            <label class="input-toggle -spacing-d">
              <input type="checkbox" class="input-toggle__field" name="publicProfile" value="{{ $user->publicProfile }}">
              <span class="input-toggle__switch"></span>
              <span class="input-toggle__label">Privates Profil</span>
              {{ $user->publicProfile }}
            </label>
          </div>
          <div class="column column--12 -spacing-b">
            <p class="-typo-copy -text-color-gray-01 hint">Bei einem <span class="-typo-copy -typo-copy--bold">öffentlichen Profil</span> zeigst du anderen Benutzern, welche Beachvolleyballfelder du schon eingereicht hast, welche Felder du favorisiert hast und deine Basis-Informationen wie <span class="-typo-copy -typo-copy--bold">Username, Postleitzahl</span> und dein <span class="-typo-copy -typo-copy--bold">Geschlecht.</span> </p>
          </div>
          <div class="column column--12 column--m-6 -spacing-a">
            <button class="button-primary profile-edit__button" disabled="disabled">
              <span class="button-primary__label">Profil speichern</span>
              <span class="button-primary__label button-primary__label--hover">Profil speichern</span>
            </button>
          </div>
          
          <div class="column column--12">
            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-a">Deinen Account löschen</p>
            <p class="-typo-copy -text-color-gray-01">
              Dass du deinen Account bei <span class="-typo-copy--bold">beachfelder.de</span> löschen möchtest, finden wir sehr schade. Bitte beachte, dass dieser Vorgang kann nicht rückgänging gemacht werden und du dies nur machen solltest, wenn du dir wirklich sicher bist.
            </p>
          </div>
          <div class="column column--12 column--m-6 -spacing-b">
            <button class="button-primary button-primary--red" onclick="window.location.href='{{ url('') }}/profile/profil-loeschen'">
              <span class="button-primary__label">Ja, ich möchte meinen Account löschen</span>
              <span class="button-primary__label button-primary__label--hover">Bist du dir wirklich sicher?</span>
            </button>
          </div>
        </div>
      </div><!-- .column .column__12 .column__m-9 ENDE -->
    </div>
  </div> <!-- .content__main ENDE -->
@endsection

@push('scripts')
  <script>
    $('.profile-edit__link').on('click', function(e){
      var href = $(this).attr('href');

      $('html, body').animate({
        scrollTop:$(href).offset().top
      },'slow');

      e.preventDefault();
    });

    $('.profile-edit__column').stick_in_parent({
      offset_top: 100
    });

    $('input').on('keyup', function() {
      $('.profile-edit__button').attr('disabled', false);
    });

    $('input').on('change', function() {
      $('.profile-edit__button').attr('disabled', false);
    });

    // $(document).ready(function() {
    //   var checkbox = $('.input-toggle__field');
    //   var hint = $('.hint').hide();


    //   if(checkbox.val(1)) {
    //     checkbox.attr('checked', true);
    //     checkbox.parent().find('.input-toggle__label').text('Öffentliches Profil');
    //     console.log(checkbox.val());
    //     hint.slideToggle();
    //   } else if(checkbox.val(0)) {
    //     checkbox.attr('checked', false);
    //     checkbox.parent().find('.input-toggle__label').text('Privates Profil');
    //     console.log(checkbox.val());
    //   }
    // });

    // // $('.input-toggle__field').click(function() {
    // //   if($(this).is(':checked')) {
    // //     $(this).parent().find('.input-toggle__label').text('Öffentliches Profil');
    // //     $(this).val(1);
    // //     $('.hint').slideToggle();
    // //   } else {
    // //     $(this).parent().find('.input-toggle__label').text('Privates Profil');
    // //     $(this).val(0);
    // //     $('.hint').slideToggle();
    // //   }
    // // });
  </script>
@endpush
