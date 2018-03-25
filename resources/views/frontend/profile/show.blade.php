
@extends('layouts.frontend')

@section('content')
<div class="content__main">
  <div class="row">
    <div class="column column--12">
      <h2 class="title-page__title">Dein Profil</h2>
    </div>
  </div>
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
            <span class="icon-text__text">Favoriten: X<br>Eingereichte Felder: X</span>
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
      <div class="image-profile">
        @if($user->pictureName !== 'placeholder-user.png' )
          <img src="/uploads/profilePictures/{{ $profilepicture }}">
        @else
          <img src="/uploads/profilePictures/fallback/placeholder-user.png">
        @endif
      </div>
    </div>

    <div class="column column--12 column--m-8">
      <h4 class="-typo-headline-04 -text-color-petrol">Deine Informationen</h4>
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
                    <img src="images/dummy-01.jpg" class="image image--max-height">
                  </div>
                  <div class="list-beachcourt__info">
                    <div class="row">
                      <div class="column column--12">
                        <h4 class="-typo-headline-04 -text-color-gray-01">Feld in {{ $myFavorite->city }}</h4>   
                      </div>
                    </div>

                    <div class="row  -spacing-b">
                      <div class="column column--12 column--m-4">
                        <div class="icon-text">
                          <span class="icon-text__icon" data-feather="map-pin"></span>
                          <span class="icon-text__text">{{ $myFavorite->postalCode }} {{ $myFavorite->city }} <br>{{ $myFavorite->street }} {{ $myFavorite->houseNumber }}</span>
                        </div>
                      </div>

                      <div class="column column--12 column--m-4">
                        <div class="icon-text">
                          <span class="icon-text__icon" data-feather="navigation"></span>
                          <span class="icon-text__text">{{ $myFavorite->longitude }}<br>{{ $myFavorite->latitude }}</span>
                        </div>
                      </div>

                      <div class="column column--12 column--m-4">
                        <div class="icon-text">
                          <span class="icon-text__icon" data-feather="info"></span>
                          <span class="icon-text__text">Felder outdoor: {{ $myFavorite->courtCountOutdoor }}<br>Felder indoor: {{ $myFavorite->courtCountIndoor }}</span>
                        </div>
                      </div>
                    </div>
                    <div class="row -spacing-b">
                      <div class="column column--12 column--s-5">
                        <a href="{{ URL::route('beachcourts.show', array('city'=>$myFavorite->citySlug,'latitude'=>$myFavorite->latitude,'longitude'=>$myFavorite->longitude)) }}" class="button-primary">
                          <span class="button-primary__label">Feld ansehen</span>
                        </a>
                      </div>
                    </div>
                  </div>
                  <a href="#" class="link-icon link-icon--shake list-beachcourt__icon">
                    <span data-feather="trash-2"></span>
                  </a>
                </li>
              @empty
                <p class="-typo-copy -typo-copy--bold -text-color-gray-01">Du hast noch keine Beachvolleyballfelder in deinen Favoriten.</p>
                <p class="-typo-copy -text-color-green"><a href="#" class="link-text">Jetzt Feld hinzufügen</a></p>
              @endforelse
            </ul>
          </div>
          <div id="tab2" class="accordion__content">
            <p class="-typo-copy -typo-copy--bold -text-color-gray-01">Du hast noch keine Beachvolleyballfelder eingereicht.</p>
            <p class="-typo-copy -text-color-green"><a href="{{ URL::route('beachcourtsubmit.submit') }}" class="link-text">Jetzt Feld einreichen</a></p>
          </div>  
        </div>
        
      </div>
    </div>
  </div>
@endsection
