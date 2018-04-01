
@extends('layouts.frontend')

@section('content')
  <div class="content__main">
    <div class="row">
      <div class="column column--12">
        <h2 class="title-page__title">Dein Profil</h2>
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

    <div class="row">
      <div class="column column--8">
        <div class="row">
          <div class="column column--12 column--s-6 column--m-4">
            <div class="icon-text -spacing-b">
              <span class="icon-text__icon" data-feather="user"></span>
              <span class="icon-text__text">{{ $user->firstName }} {{ $user->lastName }} <br> {{ $user->birthdate }} </span>
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

      <div class="column column--4 profile-user__column">
        <a href="/user/{{ $user->userName }}/edit" class="link-icon link-icon--rotate -text-color-gray-01 profile-user__edit-icon"><span data-feather="settings"></span></a>
      </div>
    </div>

    <div class="row">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12 column--m-4">
        @if($user->pictureName !== 'placeholder-user.png' )
          <img src="/uploads/profilePictures/{{ $profilepicture }}" class="image image--max-width">
        @else
          <img src="/uploads/profilePictures/fallback/placeholder-user.png" class="image image--max-width">
        @endif
      </div>

      <div class="column column--12 column--m-8">
        <div class="row">
          <div class="column column--12">
            <h4 class="-typo-headline-04 -text-color-petrol">Deine Informationen</h4>
          </div>
        </div>
        <div class="row">
          <div class="column column--12 column--m-6">
            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
              Username
            </p>
            <p class="-typo-copy -text-color-gray-02">
              {{ $user->userName }}
            </p>

            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
              Vorname
            </p>
            <p class="-typo-copy -text-color-gray-02">
              {{ $user->firstName }}
            </p>

            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
              Nachname
            </p>
            <p class="-typo-copy -text-color-gray-02">
              {{ $user->lastName }}
            </p>

            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
              Geburtstag
            </p>
            <p class="-typo-copy -text-color-gray-02">
              {{ $user->birthdate }}
            </p>
          </div>

          <div class="column column--12 column--m-6">
            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
              PLZ
            </p>
            <p class="-typo-copy -text-color-gray-02">
              {{ $user->postalCode }}
            </p>

            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
              Ort
            </p>
            <p class="-typo-copy -text-color-gray-02">
              {{ $user->city }}
            </p>

            <p class="-typo-copy -typo-copy--bold -text-color-gray-01 -spacing-b">
              E-Mail Adresse
            </p>
            <p class="-typo-copy -text-color-gray-02">
              {{ $user->email }}
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <div class="accordion">
          <div class="accordion__title-bar" data-tabgroup="first-tab-group">
            <a href="#tab1" class="accordion__title accordion__title--active">Meine Favoriten</a>
            <a href="#tab2" class="accordion__title">Meine eingereichten Felder</a>
          </div>
          <div id="first-tab-group">
            <div id="tab1" class="accordion__content">
              <ul class="list-beachcourt">
                @forelse ($myFavorites as $myFavorite)
                  <li class="list-beachcourt__item">
                    <div class="list-beachcourt__image">
                      <img
                        src="{{ url('') }}/uploads/beachcourts/{{$myFavorite->id}}/slider/slide-image-01-retina.jpg"
                        srcset="{{ url('/') }}/uploads/beachcourts/{{$myFavorite->id}}/slider/slide-image-01-retina.jpg 2x"
                        alt="Feld in {{ $myFavorite->city }}" class="image image--max-height">
                    </div>
                    <div class="list-beachcourt__info">
                      <div class="row">
                        <div class="column column--12">
                          <h4 class="-typo-headline-04 -text-color-gray-01">Feld in {{ $myFavorite->city }}</h4>
                        </div>
                      </div>

                      <div class="row  -spacing-b">
                        <div class="column column--12">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="map-pin"></span>
                            <span class="icon-text__text">{{ $myFavorite->postalCode }} {{ $myFavorite->city }} <br>{{ $myFavorite->street }} {{ $myFavorite->houseNumber }}</span>
                          </div>
                        </div>

                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="navigation"></span>
                            <span class="icon-text__text">{{ $myFavorite->longitude }}<br>{{ $myFavorite->latitude }}</span>
                          </div>
                        </div>

                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="info"></span>
                            <span class="icon-text__text">Felder outdoor: {{ $myFavorite->courtCountOutdoor }}<br>Felder indoor: {{ $myFavorite->courtCountIndoor }}</span>
                          </div>
                        </div>
                      </div>
                      <div class="row -spacing-b">
                        <div class="column column--12 column--s-5">

                          <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($myFavorite->city),'latitude'=>$myFavorite->latitude,'longitude'=>$myFavorite->longitude)) }}" class="button-primary">
                            <span class="button-primary__label">Feld ansehen</span>
                            <span class="button-primary__label button-primary__label--hover">Feld ansehen</span>
                          </a>
                        </div>
                      </div>
                    </div>
                    <form action="{{ url('unfavorite/'.$myFavorite->id) }}" method="POST" id="form--delete-favorite">
                      <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                      <a href="javascript:;" class="link-icon link-icon--shake list-beachcourt__icon" onclick="document.getElementById('form--delete-favorite').submit();">
                        <span data-feather="trash-2"></span>
                      </a>
                    </form>
                  </li>
                @empty
                  <p class="-typo-copy -typo-copy--bold -text-color-gray-01">Du hast noch keine Beachvolleyballfelder in deinen Favoriten.</p>
                  <p class="-typo-copy -text-color-green"><a href="#" class="link-text">Jetzt Feld hinzufügen</a></p>
                @endforelse
              </ul>
            </div>
            <div id="tab2" class="accordion__content">
              @forelse ($submittedCourts as $submittedCourt)
              <li class="list-beachcourt__item">
                    <div class="list-beachcourt__image">
                      @if ($submittedCourt->submitState === 'approved')
                        <figure class="progressive">
                          <img class="progressive__img progressive--not-loaded image image--max-width" data-progressive="{{ url('/') }}/uploads/beachcourts/{{$submittedCourt->id}}/slider/slide-image-01-retina.jpg" src="{{ url('') }}/uploads/beachcourts/{{$submittedCourt->id}}/slider/slide-image-01.jpg" alt="Feld in {{ $submittedCourt->city }}">
                        </figure>
                      @else
                        <figure class="progressive">
                          <img class="progressive__img progressive--not-loaded image image--max-width" data-progressive="{{ url('') }}/uploads/beachcourts/dummy-image-submitted-retina.jpg" src="{{ url('') }}/uploads/beachcourts/dummy-image-submitted.jpg">
                        </figure>
                      @endif
                    </div>
                    <div class="list-beachcourt__info">
                      <div class="row">
                        <div class="column column--12">
                          <h4 class="-typo-headline-04 -text-color-gray-01">Feld in {{ $submittedCourt->city }}</h4>
                        </div>
                      </div>

                      <div class="row  -spacing-b">
                        <div class="column column--12">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="map-pin"></span>
                            <span class="icon-text__text">{{ $submittedCourt->postalCode }} {{ $submittedCourt->city }} <br>{{ $submittedCourt->street }} {{ $submittedCourt->houseNumber }}</span>
                          </div>
                        </div>

                        <div class="column column--12 column--m-6">
                          <div class="icon-text">
                            <span class="icon-text__icon" data-feather="navigation"></span>
                            <span class="icon-text__text">{{ $submittedCourt->longitude }}<br>{{ $submittedCourt->latitude }}</span>
                          </div>
                        </div>

                        <div class="column column--12 column--m-6">
                          @if($submittedCourt->submitState === 'approved')
                            <span class="icon-text__icon" data-feather="check-circle"></span>
                            <span class="icon-text__text">Einreichungsstatus:<br>genehmigt</span>
                          @else
                            <span class="icon-text__icon" data-feather="clock"></span>
                            <span class="icon-text__text">Einreichungsstatus:<br>in Überprüfung</span>
                          @endif
                        </div>
                      </div>
                      @if ($submittedCourt->submitState === 'approved')
                      <div class="row -spacing-b">
                        <div class="column column--12 column--s-5">

                          <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($submittedCourt->city),'latitude'=>$submittedCourt->latitude,'longitude'=>$submittedCourt->longitude)) }}" class="button-primary">
                            <span class="button-primary__label">Feld ansehen</span>
                            <span class="button-primary__label button-primary__label--hover">Feld ansehen</span>
                          </a>
                        </div>
                      </div>
                      @endif
                    </div>
                  </li>
              @empty
              <p class="-typo-copy -typo-copy--bold -text-color-gray-01">Du hast noch keine Beachvolleyballfelder eingereicht.</p>
              <p class="-typo-copy -text-color-green"><a href="{{ URL::route('beachcourtsubmit.submit') }}" class="link-text">Jetzt Feld einreichen</a></p>
              @endforelse
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- .content__main ENDE -->
@endsection
