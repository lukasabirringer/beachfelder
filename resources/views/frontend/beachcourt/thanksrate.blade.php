
@extends('layouts.frontend')

@section('title_and_meta')
    <title>Danke für deine Bewertung | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
 @endsection

@section('content')
<div class="content__main">
  <div class="row">
    @if (\Session::has('success'))
      <ul class="notification">
        <li class="notification__item">
          <span class="notification__icon" data-feather="info"></span>
          <p class="notification__text">{!! \Session::get('success') !!}</p>

          <button class="button-secondary notification-button close" data-dismiss="alert" aria-label="close">
            <span class="button-secondary__label notification-button__label">OK</span>
          </button>
        </li>
      </ul>
    @endif
    <div class="column column--xxs-12 column--xs-4 column--s-6 column--m-4">
      @if(is_dir(public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/')))
        <figure class="progressive">
          <img class="progressive__img progressive--not-loaded image image--max-width" data-progressive="{{ url('/') }}/uploads/beachcourts/{{$beachcourt->id}}/slider/retina/slide-image-01-retina.jpg" src="{{ url('/') }}//uploads/beachcourts/{{$beachcourt->id}}/slider/standard/slide-image-01.jpg">
        </figure>
      @else 
        <img class="progressive__img" src="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=347x180&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" data-progressive="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=600x300&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" alt="Beachvolleyballfeld in {{$beachcourt->postalCode}} {{$beachcourt->city}}">
      @endif
    </div>
    <div class="column column--xxs-12 column--xs-8 column--s-6 column--m-8">

      <h2 class="title-page__title">Bewerte das Beachvolleyballfeld</h2>
      <h4 class="title-page__subtitle">in {{ $beachcourt->city }}</h4>

      <div class="row">
        <div class="column column--12 column--m-6">
          <div class="icon-text -spacing-b">
            <span class="icon-text__icon" data-feather="map-pin"></span>
            <span class="icon-text__text">{{ $beachcourt->postalCode }}<br>{{ $beachcourt->city }}</span>
          </div>
        </div>
        <div class="column column--12 column--m-6">
          <div class="icon-text -spacing-b">
            <span class="icon-text__icon" data-feather="navigation"></span>
            <span class="icon-text__text">{{ $beachcourt->latitude }}<br>{{ $beachcourt->longitude }}</span>
          </div>
        </div>
      </div>
      <p class="-typo-copy -text-color-gray-01 -spacing-c">
        <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude,)) }}" class="link-text">zurück zum Feld</a>
        </a>
      </p>
    </div>
  </div>

  <div class="row -spacing-a">
    <div class="column column--12">
      <hr class="divider">
    </div>
  </div>

  <div class="row -spacing-a">
    <div class="column column--12">
      <h4 class="-typo-headline-03 -text-color-green">Danke für das bewerten des Beachfeldes!</h4>
    </div>
  </div>

  <div class="row -spacing-b">
    <div class="column column--12 column--m-6">
      <h4 class="-typo-headline-04 -text-color-gray-01 -spacing-b">Du hast es mit {{ $userRating }} von 5 Bällen bewertet!</h4>
      @for ($i = 1; $i <= $userRating; $i++)
        <div class="rating__item -spacing-b">
          <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
        </div>
      @endfor
      <?php $starsLeft = 5 - $userRating; ?>
      @if (count($starsLeft) > 0)
        @for ($i = 1; $i <= $starsLeft; $i++)
        <div class="rating__item -spacing-b">
          <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
        </div>
        @endfor
      @endif
    </div>
    <div class="column column--12 column--m-6">
      <h4 class="-typo-headline-04 -text-color-gray-01 -spacing-b">Insgesamt wurde das Feld mit {{ $newRating }} von 5 Bällen bewertet!</h4>

      @for ($i = 1; $i <= $newRating; $i++)
        <div class="rating__item -spacing-b">
          <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
        </div>
      @endfor
      <?php $starsLeft = 5 - $newRating; ?>
      @if (count($starsLeft) > 0)
        @for ($i = 1; $i <= $starsLeft; $i++)
        <div class="rating__item -spacing-b">
          <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
        </div>
        @endfor
      @endif
      <p class="-typo-copy -text-color-gray-01 -spacing-b">
        @if ($beachcourt->ratingCount < 10)
          Dies ist eine vorläufige Bewertung durch <span class="-typo-copy -typo-copy--bold">beachfelder.de</span>, da noch nicht genügend Bewertungen eingeganen sind, um einen repräsentativen Wert darzustellen.
        @endif
      </p>
    </div>
  </div>
</div>
@endsection


@push('scripts')
  <script>
    $('.notification-button').click(function() {
      $(this).parent().parent('.notification').slideUp();
    });
  </script>
@endpush