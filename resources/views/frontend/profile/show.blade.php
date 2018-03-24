
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
          <img src="/uploads/profilePictures/{{ $profilepicture }}" class="profile-user__image">
        @else
          <img src="/uploads/profilePictures/fallback/placeholder-user.png" class="image">
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
        <div class="accordion__title-bar">
          <h4 class="accordion__title accordion__title--active">Meine Favoriten</h4>
          <h4 class="accordion__title">Meine eingereichten Felder</h4>
        </div>
        <div class="accordion__content">
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
                      <a href="{{ URL::route('beachcourts.show', array('city'=>$myFavorite->citySlug,'latitude'=>$myFavorite->latitude,'longitude'=>$myFavorite->longitude,)) }}" class="button-primary">
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
              <p>kein beachfeld vorhanden.</p>
            @endforelse
          </ul>
        </div>
      </div>
    </div>
  </div>
</div><!-- .content__main ENDE -->


<div class="row row--zero">
    <div class="column column--12 column--zero">
        <div class="hero-image-beachcourt-detail " style="background-image: url(http://beachfelder.de/img/header-image.jpg)">
          <div class="hero-image-beachcourt-detail__overlay">
            @if($eigenesprofil === 'true' )
            <h1 class="hero-image-beachcourt-detail__title">@lang('Willkommen'), {{ $user->name }}</h1>
            @else
            <h1>Das ist das Profil von {{ $profileuser->userName }}</h1>
            @endif
          </div>
        </div>
    </div>
</div>
<a href="/user/{{ $user->userName }}/edit">Daten editieren</a>
<div class="content">
  <div class="row -spacing-widget-default">
    <div class="column column--12">
      <div class="header-page">
        @if($eigenesprofil === 'true' )
        <h1 class="header-page__title -text-color-blue-2">@lang('mein profil')</h1>
        @else
        <h1 class="header-page__title -text-color-blue-2">@lang('profil von') {{ $profileuser->userName }}</h1>
        @endif
      </div>
    </div>
  </div>
</div>


<!-- UPLOAD NEW PICTURE -->
<div class="context-menu profile-user-image__context-menu">
<form method="POST" action="{{ url('profil/uploadprofilepicture/') }}" enctype="multipart/form-data">
{{ csrf_field() }}
<label class="input-fileupload">
<input type="file" name="profilePicture" class="input-fileupload__field" data-multiple-caption="{count} files selected" />
<span class="input-fileupload__icon icon icon--camera"></span>
<span class="input-fileupload__label">@lang('Neues Profilbild hochladen')</span>
</label>
<button type="submit">Upload!</button>
</form>
</div>

<button type="button" class="button" onclick="window.location.href='{{ url('') }}/profile/profilbild-loeschen'" >
  <span class="button__label button__label--icon">Profilbild löschen</span>
</button>
<hr>
<h4>@lang('Allgemeine Informationen') </h4>
@if($eigenesprofil === 'true' )
  <p>@lang('Username'):{{ $user -> userName }} </p>
  <p>@lang('Vorname'):{{ $user -> firstName }} </p>
  <p>@lang('Nachname'):{{ $user -> lastName }} </p>
  <p>@lang('Geburtstag'):{{ $user -> birthdate }} </p>
  <p>@lang('E-Mail'):{{ $user -> email }} </p>
  <p>@lang('PLZ'):{{ $user -> postalCode }} </p>
  <p>@lang('Ort'):{{ $user -> city }} </p>
  <p>@lang('Passwort'): ********* </p>
@else
  <p>@lang('Geburtstag'):{{ $profileuser -> birthdate }} </p>
  <p>@lang('PLZ'):{{ $profileuser -> postalCode }} </p>
  <p>@lang('Ort'):{{ $profileuser -> city }} </p>
@endif

<!-- FAVS -->
<h3>Favs</h3>
<hr>
<div class="content">
  <div class="row -spacing-widget-default">
    <div class="column column--12">
      <hr class="divider" />
    </div>
  </div>
  <div class="row -spacing-widget-default">
    <div class="column column--12">
      <div class="header-page" id="meine-favoriten">
        @if($eigenesprofil === 'true' )
        <h1 class="header-page__title  -text-color-blue-2 ">@lang('Meine Favoriten')</h1>
        @else
        <h1 class="header-page__title  -text-color-blue-2 ">@lang('Favoriten von') {{ $profileuser->userName }}</h1>
        @endif
      </div>
    </div>
    <div class="column column--12 -spacing-f">
<div class="row">
  <form method="GET" action="{{ route('profile.show', Auth::user()->userName) }}">

    <div class="column column--12 column--s-4 -spacing-static-c">
      <label class="select ">
        <select class="select__field" name="min">
            <option selected="selected" disabled="disabled">@lang('minimale Punktzahl')</option>
            <option>0</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
        <span class="select__icon icon icon--arrow-down"></span>
      </label>
    </div>
    <div class="column column--12 column--s-4 -spacing-static-c">
      <label class="select ">
        <select class="select__field" name="max">
            <option selected="selected" disabled="disabled">@lang('maximale Punktzahl')</option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select>
        <span class="select__icon icon icon--arrow-down"></span>
      </label>
    </div>
    <div class="column column--12 column--s-4 -spacing-static-c">
      <button type="submit" class="button" >
          <span class="button__icon icon icon--filter"></span>
        <span class="button__label button__label--icon">@lang('Filtern')</span>
      </button>
    </div>
  </form>
</div>

<ul class="list-beachcourt -spacing-d">
    @forelse ($myFavorites as $myFavorite)
        <a href="{{ URL::route('beachcourts.show', array('city'=>$myFavorite->citySlug,'latitude'=>$myFavorite->latitude,'longitude'=>$myFavorite->longitude,)) }}" class="list-beachcourt__link">
            <li class="list-beachcourt__item">
                <div class="list-beachcourt__image">
                    <img src="/uploads/beachcourts/standard/list-view-image/beachcourt-list-blind-image.jpg" class="image">
                </div>
                <div class="list-beachcourt__title-container column--12 column--s-4">
                    <h5 class="list-beachcourt__title">Feld in {{ $myFavorite->postalCode }} {{ $myFavorite->city }}</h5>
                    <p class="list-beachcourt__date"> @lang('hinzugefügt am'):<br> {{ $myFavorite->created_at }} </p>
                </div>
                <div class="list-beachcourt__coordinates-container column--12 column--s-3">
                    <h5 class="list-beachcourt__title">@lang('Koordinaten')</h5>
                    <p class="list-beachcourt__coordinates">{{ $myFavorite->latitude }} <br> {{ $myFavorite->longitude }}</p>
                </div>
                @if($eigenesprofil === 'true' )
                <div class="list-beachcourt__action">

                    <div class="list-beachcourt__form">
                        <button type="button" onclick="load_modal_removeFavoriteBeachcourt(); return false;" class="button-icon list-beachcourt__button">
                            <span class="button-icon__icon icon icon--delete"></span>
                        </button>
                    </form>
                </div>
                @else
                @endif
            </li>
        </a>
    @empty
        <div class="column column--12 -spacing-inner-a -background-gray-3">
          <p class="icon icon--heart-o -typo-headline-1 -text-color-blue-2 -align-center"></p>
          <p class="-typo-copy--large -text-color-blue-2 -font-primary -align-center -spacing-static-b">@lang('Du hast noch keine Favoriten gespeichert.')</p>
          <p class="-typo-copy--large -text-color-green -font-primary -align-center -spacing-static-b">
              <a href="{{ URL::route('homepage.show') }}">Füge dein erstes Beachvolleyballfeld hinzu</a>
          </p>
        </div>
    @endforelse
</ul>
    </div>
  </div>
</div>

@endsection
