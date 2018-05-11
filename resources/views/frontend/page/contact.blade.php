@extends('layouts.frontend')

@section('title_and_meta')
    <title>Nimm' Kontakt mit uns auf | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
 @endsection

@section('content')
  @if (\Session::has('success'))
    <ul class="notification">
      <li class="notification__item">
        <span class="notification__icon" data-feather="info"></span>
        <p class="notification__text">{!! \Session::get('success') !!}</p>

        <button class="button-secondary notification__button close" data-dismiss="alert" aria-label="close">
          <span class="button-secondary__label">OK</span>
        </button>
      </li>
    </ul>
  @endif

  <div class="content__main">
    <div class="row">
      <div class="column column--12">
        <h2 class="title-page__title">Nimm Kontakt mit uns auf</h2>
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>
    <form class="form-horizontal" method="POST" action="{{ route('contact.save') }}">
      {{ csrf_field() }}
      <div class="row">
        <div class="column column--12 column--s-6 -spacing-a">
          <label class="input">
            <input type="text" name="userEmail" value="{{ old('userEmail') }}" class="input__field" placeholder="Deine E-Mail*" required="required">
            <span class="input__label">Deine E-Mail*</span>
            <div class="input__border"></div>
          </label>

          @if ($errors->has('userEmail'))
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
            <input type="text" name="subject" value="{{ old('subject') }}" class="input__field" placeholder="Betreff*" required="required">
            <span class="input__label">Betreff*</span>
            <div class="input__border"></div>
          </label>

          @if ($errors->has('subject'))
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
        <div class="column column--12 -spacing-a">
          <label class="textarea">
            <textarea name="message" class="textarea__field"></textarea>
            <span class="textarea__label">Deine Nachricht</span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="column column--12">
          <label class="input-toggle -spacing-d">
            <input type="checkbox" class="input-toggle__field" name="agreed">
            <span class="input-toggle__switch"></span>
            <span class="input-toggle__label">Ja, ich habe die <a class="link-text" href="{{ url('/page/datenschutzerklaerung') }}">Datenschutzerklärung</a> zur Kenntnis genommen und bin damit einverstanden, dass die von mir angegebenen Daten elektronisch erhoben und gespeichert werden. Meine Daten werden dabei nur streng zweckgebunden zur Bearbeitung und Beantwortung meiner Anfrage benutzt. Mit dem Absenden des Kontaktformulars erkläre ich mich mit der Verarbeitung einverstanden.</span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="column column--12 column--s-6">
          <div class="g-recaptcha" data-sitekey="{{ env('CAPTCHA_SITE_KEY') }}"></div>
        @if ($errors->has('g-recaptcha-response'))
            <span class="invalid-feedback" style="display: block;">
                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
            </span>
        @endif
        </div>
        
        <div class="column column--12 column--s-6 -spacing-b">
          <button type="submit" class="button-primary" disabled="disabled">
            <span class="button-primary__label">Anfrage senden</span>
            <span class="button-primary__label button-primary__label--hover">Anfrage senden</span>
          </button>
        </div>
      </div>

    </form>

    <div class="row -spacing-a">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12 column--s-6 column--m-4">
        <p class="-typo-copy--bold -text-color-gray-01">
          World of Beachsports GbR
        </p>
        <p class="-typo-copy -text-color-gray-01">
          Andreas Engmann
          <br>Fabian Pecher
          <br>Lukas Birringer
        </p>
      </div>
      <div class="column column--12 column--s-6 column--m-4">
        <p class="-typo-copy--bold -text-color-gray-01">
          Sitz
        </p>
        <p class="-typo-copy -text-color-gray-01">
          Allmendäckerstr. 5/1<br>
          75233 Tiefenbronn-Mühlhausen
        </p>
      </div>
      <div class="column column--12 column--s-6 column--m-4">
        <p class="-typo-copy--bold -text-color-gray-01">
          E-Mail
        </p>
        <p class="-typo-copy -text-color-gray-01">
          presse[a]beachfelder.de
        </p>
      </div>
    </div>
  </div> <!-- .content__main ENDE -->
@endsection

@push('scripts')
  
  <script>
    //hide the notification
    $('.notification__button').click(function() {
      $(this).parent('.notification__item').parent('.notification').hide();
    });

    $('.input-toggle').click(function () {
       //check if checkbox is checked
       if ($(this).children('.input-toggle__field').is(':checked')) {

           $('.button-primary').removeAttr('disabled'); //enable input

       } else {
           $('.button-primary').attr('disabled', true); //disable input
       }
   });
  </script>
@endpush