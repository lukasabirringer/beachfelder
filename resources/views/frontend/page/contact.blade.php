@extends('layouts.frontend')

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
    <form class="form-horizontal" method="POST" action="{{ route('contact.save') }}">
      {{ csrf_field() }}
      <div class="row">
        <div class="column column--12 column--s-6 -spacing-a">
          <label class="input">
            <input type="text" name="subject" value="{{ old('subject') }}" class="input__field" placeholder="Grund der Anfrage">
            <span class="input__label">Grund der Anfrage</span>
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

        <div class="column column--12 column--s-6 -spacing-a">
          <label class="input">
            <input type="textarea" name="message" value="{{ old('message') }}" class="input__field" placeholder="Schreibe hier deine Nachricht">
            <span class="input__label">Nachricht</span>
            <div class="input__border"></div>
          </label>
          @if ($errors->has('message'))
            <div class="message message--error -spacing-d">
              <div class="message__icon message__icon--error">
                <span data-feather="alert-circle"></span>
              </div>
              <p class="message__text message__text--error">Dieses Feld ist ein Pflichtfeld</p>
            </div>
          @endif
        </div>

        <div class="column column--12 -spacing-b">
          <button type="submit" class="button-primary">
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
          presse@beachfelder.de
        </p>
      </div>
    </div>
@endsection

@push('scripts')
  <script>
    //hide the notification
    $('.notification__button').click(function() {
      $(this).parent('.notification__item').parent('.notification').hide();
    });
  </script>
@endpush