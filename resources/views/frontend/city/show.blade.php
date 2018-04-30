@extends('layouts.frontend')

@section('title_and_meta')
    <title>Beachfelder in {{ $name }} | Beachfelder.de 🏖 :sunny:</title>
    <meta name="description" content="Hier findest du alle Beachfelder in {{ $name }}. Sehe dir alle Beachvolleyball-Felder in {{ $name }} an und finde dein nächstes Lieblingsfeld! :)" />
@endsection

<title>Beachfelder in {{ $name }}</title>
@section('content')
  <div class="content__main">
    <div class="row">
      <div class="column column--12">
        <h2 class="title-page__title">Beachvolleyballfelder in {{ $name }}</h2>
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>

    <div class="row">
      @foreach ($beachcourts as $beachcourt)
        <div class="column column--12 column--s-6 column--m-4 -spacing-b">
          <div class="beachcourt-item">
            <div class="beachcourt-item__image">
              <figure class="progressive">
                @if(is_dir(public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/')))
                  <img
                    class="progressive__img progressive--not-loaded"
                    data-progressive="/uploads/beachcourts/{{$beachcourt->id}}/slider/retina/slide-image-01-retina.jpg"
                    src="/uploads/beachcourts/{{$beachcourt->id}}/slider/standard/slide-image-01.jpg"
                  />
                @else
                  <img
                    class="progressive__img progressive--not-loaded"
                    data-progressive="/uploads/beachcourts/dummy-image-submitted-retina.jpg"
                    src="/uploads/beachcourts/dummy-image-submitted.jpg"
                  />
                @endif
              </figure>
              @if (Auth::user())
                  <favorite :beachcourt={{ $beachcourt->id }} :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}></favorite>
              @endif
            </div>
            <div class="beachcourt-item__info">
              <h3 class="beachcourt-item__title">Beachvolleyballfeld in {{ $beachcourt->city }}</h3>
              @if ($beachcourt->rating >= 1)
                <div class="icon-text beachcourt-item__rating -spacing-b">
                  <span class="icon-text__icon" data-feather="award"></span>
                  <span class="icon-text__text">Dieses Feld wurde mit <br> <span class="-typo-copy--bold">{{ $beachcourt->rating }}</span>/5 Bällen bewertet</span>
                </div>
              @else
                <div class="icon-text beachcourt-item__rating -spacing-b">
                  <span class="icon-text__icon" data-feather="award"></span>
                  <span class="icon-text__text">Dieses Feld wurde noch <br> <span class="-typo-copy--bold">nicht </span> bewertet</span>
                </div>
              @endif

              <div class="icon-text -spacing-b">
                <span class="icon-text__icon" data-feather="map-pin"></span>
                <span class="icon-text__text">{{ $beachcourt->postalCode }}<br>{{ $beachcourt->city }}</span>
              </div>

              <div class="icon-text -spacing-b">
                <span class="icon-text__icon" data-feather="info"></span>
                <span class="icon-text__text">Felder outdoor: {{ $beachcourt->courtCountOutdoor }} <br> Felder indoor: {{ $beachcourt->courtCountIndoor }}</span>
              </div>

              <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude)) }}" class="button-primary -spacing-a">
                <span class="button-primary__label">Mehr erfahren</span>
                <span class="button-primary__label button-primary__label--hover">Mehr erfahren</span>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="row -spacing-a">
      <div class="column column--12 -align-center"> 
        {{ $beachcourts->links() }}
      </div>
    </div>
  </div> <!-- .content__main ENDE -->
@endsection