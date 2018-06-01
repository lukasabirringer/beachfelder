
@extends('layouts.frontend', ['body_class' => 'beachcourt-detail'])

@section('title_and_meta')
    <title>Beachvolleyballfeld in {{ $beachcourt->postalCode }} {{ $beachcourt->city }} | beachfelder.de | 🏝 Deine Beachvolleyballfeld-Suchmaschine 🏝</title>
 @endsection

@section('content')
 @if (\Session::has('error'))
      <ul class="notification">
        <li class="notification__item">
          <span class="notification__icon" data-feather="info"></span>
          <p class="notification__text">{!! \Session::get('error') !!}</p>

          <button class="button-secondary notification__button close" data-dismiss="alert" aria-label="close">
            <span class="button-secondary__label">OK</span>
          </button>
        </li>
      </ul>
    @endif
  <div class="content__main">
    <div class="row">

      <div class="column column--12">
        <h1 class="title-page__title">Beachvolleyballfeld in {{ $beachcourt->city }}</h1>
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <div class="row">
          <div class="column column--12 column--s-6 column--m-3">
            <div class="icon-text -spacing-b">
              <span class="icon-text__icon" data-feather="map-pin"></span>
              <span class="icon-text__text">{{ $beachcourt->postalCode }} {{ $beachcourt->city }}<br>{{ $beachcourt->street }} {{ $beachcourt->houseNumber }}</span>
            </div>
          </div>
          <div class="column column--12 column--s-6 column--m-3">
            <div class="icon-text -spacing-b">
              <span class="icon-text__icon" data-feather="navigation"></span>
              <span class="icon-text__text">{{ $beachcourt->longitude }}<br>{{ $beachcourt->latitude }}</span>
            </div>
          </div>
          <div class="column column--12 column--s-6 column--m-3">
            <div class="icon-text -spacing-b">
              <span class="icon-text__icon" data-feather="info"></span>
              <span class="icon-text__text">Felder outdoor: {{ $beachcourt->courtCountOutdoor }}<br>Felder indoor: {{ $beachcourt->courtCountIndoor }}</span>
            </div>
          </div>
          <div class="column column--12 column--s-6 column--m-3">
            <div class="infobox">
              <span class="infobox__icon" data-feather="{{ $icon }}"></span>
              <span class="infobox__title">Heute</span>
              <span class="infobox__text">{{ $roundedWheater }} °C</span>
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

    <div class="row">
      <div class="column column--12 -spacing-a">
        <div class="row">
          <div class="column column--12 column--m-8">
            <div class="rating">
              @for ($i = 1; $i <= $beachcourt->rating; $i++)
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
                </div>
              @endfor
              <?php $starsLeft = 5 - $beachcourt->rating; ?>
              @if (count($starsLeft) > 0)
                @for ($i = 1; $i <= $starsLeft; $i++)
                <div class="rating__item">
                  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
                </div>
                @endfor
              @endif

              @if ($beachcourt->ratingCount < 10)
                <p class="-typo-copy -typo-copy--small -text-color-gray-01 rating__count">Vorläufige Bewertung durch beachfelder.de</p>
              @elseif ($beachcourt->ratingCount >= 10)
                <p class="-typo-copy -text-color-gray-01 -text-color-gray-01 rating__count">{{ $beachcourt->ratingCount }} Bewertungen</p>
              @endif
              
              
            </div>
          </div>
          <div class="column column--12 column--m-4 -align-right">
            <a href="{{ URL::route('beachcourts.rate', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude) )}}" class="rating__count link-icon-text">
              <span class="link-icon-text__icon" data-feather="thumbs-up"></span><span class="link-icon-text__copy">Bewertung abgeben</span>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="column column--6 column--s-3 -hidden--xxs">
            <p class="-typo-copy -text-color-gray-01 -spacing-b">
              <span class="-typo-copy--bold">Sand</span>
              @for ($i = 1; $i <= $beachcourt->ratingSand; $i++)
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
              @endfor
              <?php $starsLeft = 5 - $beachcourt->ratingSand;     ?>
              @if (count($starsLeft) > 0)
                @for ($i = 1; $i <= $starsLeft; $i++)
                <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
                @endfor
              @endif
            </p>
          </div>
          <div class="column column--6 column--s-3 -hidden--xxs">
            <p class="-typo-copy -text-color-gray-01 -spacing-b">
              <span class="-typo-copy--bold">Netz</span>
              @for ($i = 1; $i <= $beachcourt->ratingNet; $i++)
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
              @endfor
              <?php $starsLeft = 5 - $beachcourt->ratingNet;     ?>
              @if (count($starsLeft) > 0)
                @for ($i = 1; $i <= $starsLeft; $i++)
                <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
                @endfor
              @endif
            </p>
          </div>
          <div class="column column--6 column--s-3 -hidden--xxs">
            <p class="-typo-copy -text-color-gray-01 -spacing-b">
              <span class="-typo-copy--bold">Feld</span>
              @for ($i = 1; $i <= $beachcourt->ratingCourt; $i++)
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
              @endfor
              <?php $starsLeft = 5 - $beachcourt->ratingCourt;     ?>
              @if (count($starsLeft) > 0)
                @for ($i = 1; $i <= $starsLeft; $i++)
                <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
                @endfor
              @endif
            </p>
          </div>
          <div class="column column--6 column--s-3 -hidden--xxs">
            <p class="-typo-copy -text-color-gray-01 -spacing-b">
              <span class="-typo-copy--bold">Umgebung</span>
              @for ($i = 1; $i <= $beachcourt->ratingEnvironment; $i++)
                  <img src="{{ asset('images/rating-badge-petrol.svg') }}" width="16">
              @endfor
              <?php $starsLeft = 5 - $beachcourt->ratingEnvironment; ?>
              @if (count($starsLeft) > 0)
                @for ($i = 1; $i <= $starsLeft; $i++)
                <img src="{{ asset('images/rating-badge-gray.svg') }}" width="16">
                @endfor
              @endif
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

    <div class="row -flex -flex--wrap">
      <div class="column column--12 column--m-6 -spacing-a flex">
        @if( $filecount != 0 )
          <div class="image-slide">
            <div class="owl-carousel owl-carousel--detailpage">
              @for ($i = 1; $i <= $filecount; $i++)
                <img class="owl-lazy"
                     data-src="/uploads/beachcourts/{{ $beachcourt->id }}/slider/slide-image-0{{ $i }}.jpg"
                     data-src-retina="/uploads/beachcourts/{{ $beachcourt->id }}/slider/retina/slide-image-0{{ $i }}-retina.jpg"
                     alt="Beachvolleyballfeld {{ $beachcourt->city }}">
              @endfor
            </div>
            <span class="owl-navigation-item owl-navigation-item--left" data-feather="chevron-left"></span>
            <span class="owl-navigation-item owl-navigation-item--right" data-feather="chevron-right"></span>
          </div>
        @else
          <div class="message-image-missing">
            <span class="message-image-missing__icon" data-feather="image"></span>
            <p class="message-image-missing__text">
                Von diesem Beachfeld haben wir noch keine Detailbilder vorliegen. Bitte hilf uns, den Service zu verbessern, indem du uns Fotos des Beachfelds <a href="{{ URL::route('beachcourts.upload', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude) )}}">schickst</a>.
            </p>
          </div>
        @endif
      </div>

      <div class="column column--12 column--m-6 -spacing-a">
        @if(Auth::user())
          <div class="beachcourt-detail__favorite">
            <favorite
            :beachcourt={{ $beachcourt->id }}
            :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}
            ></favorite>
          </div>
        @endif

        <h4 class="-typo-headline-04 -text-color-petrol">Ist das Feld öffentlich zugänglich?</h4>
        @if ($beachcourt->isPublic === 0 )
          <p class="-typo-copy -text-color-gray-01 -spacing-d">Nein, das Feld ist <span class="-typo-copy -typo-copy--bold">nicht</span> für Jedermann zugänglich.</p>
        @elseif ($beachcourt->isPublic === 1 )
          <p class="-typo-copy -text-color-gray-01 -spacing-d">Ja, das Feld ist für <span class="-typo-copy -typo-copy--bold">Jedermann zugänglich</span>.</p>
        @else 
          <p class="-typo-copy -text-color-gray-01 -spacing-d">Es liegen uns leider darüber noch keine Daten vor.</p>
        @endif

        <h4 class="-typo-headline-04 -text-color-petrol -spacing-a">Kann ich auf diesem Feld kostenlos spielen?</h4>
        @if ($beachcourt->isChargeable === 1 )
          <p class="-typo-copy -text-color-gray-01 -spacing-b">Nein, das Spielen auf diesem Feld ist <span class="-typo-copy -typo-copy--bold">kostenpflichtig</span>. Die Preise dafür kannst du beim Betreiber in Erfahrung bringen.</p>
        @elseif ($beachcourt->isChargeable === 0 )
          <p class="-typo-copy -text-color-gray-01 -spacing-d">Ja, das Spielen auf diesem Feld ist <span class="-typo-copy -typo-copy--bold">kostenfrei</span>. Geh gleich los und spiele eine Runde oder zwei.</p>
        @elseif ($beachcourt->isChargeable === 3)
          <p class="-typo-copy -text-color-gray-01 -spacing-d">Das Spielen auf diesem Feld ist im Eintrittspreis inbegriffen.</p>
        @elseif ($beachcourt->isChargeable === NULL )
          <p class="-typo-copy -text-color-gray-01 -spacing-d">Es liegen uns leider keine Informationen vor, ob das Spielen auf diesem Feld kostpflichtig ist.</p>
        @endif
         @if($beachcourt->notes != NULL)
         <h4 class="-typo-headline-04 -text-color-petrol -spacing-a">Weitere Informationen</h4>
          <p class="-typo-copy -text-color-gray-01 -spacing-b">
            {{ $beachcourt->notes }}
          </p>
        @endif

        <h4 class="-typo-headline-04 -text-color-petrol -spacing-a">Betreiber des Feldes</h4>
        <p class="-typo-copy -text-color-gray-01 -spacing-d">
          {{ $beachcourt->operator }}<br>
          {{ $beachcourt->postalCode }} {{ $beachcourt->city }}
        </p>
        @if($beachcourt->operatorUrl != NULL)
          <p class="-text-color-green -typo-copy">
            <a href="{{ $beachcourt->operatorUrl }}" class="link-icon-text" target="_blank"><span data-feather="external-link" class="link-icon-text__icon"></span><span class="link-icon-text__copy">{{ $beachcourt->operatorUrl }}</span></a>
          </p>
        @endif
       
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>

    <div class="row -spacing-a">
      <div class="column column--12">
        <div class="map">
          <iframe width="100%" height="450" frameborder="0" zoom="5" style="border:0" allowfullscreen src="https://maps.google.de/maps?q={{ $beachcourt->latitude }},{{ $beachcourt->longitude }}&hl=es;z=14&amp;output=embed"></iframe>
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
        <h4 class="-typo-headline-03 -text-color-gray-01">Weitere Beachfelder in der Umgebung</h4>
      </div>
    </div>

    <div class="row -spacing-b -flex -flex--direction-row -flex--wrap">
      @if($beachcourt->distance <= $distance)
        @foreach ($otherBeachcourts as $otherBeachcourt)
          @if($beachcourt->latitude != $otherBeachcourt->latitude )
            @if($otherBeachcourt-> submitState != 'submitted')
              <div class="column column--12 column--s-6 column--m-6 column--l-4 -spacing-b -flex">
                <div class="beachcourt-item">
                  <div class="beachcourt-item__image">
                      @if(is_dir(public_path('uploads/beachcourts/' . $otherBeachcourt->id . '/slider/standard/')))
                        <figure class="progressive">
                          <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($otherBeachcourt->city),'latitude'=>$otherBeachcourt->latitude,'longitude'=>$otherBeachcourt->longitude,)) }}" >
                            <img
                              class="progressive__img progressive--not-loaded"
                              data-progressive="{{url('/')}}/uploads/beachcourts/{{$otherBeachcourt->id}}/slider/retina/slide-image-01-retina.jpg"
                              src="{{url('/')}}/uploads/beachcourts/{{$otherBeachcourt->id}}/slider/standard/slide-image-01.jpg"
                            />
                        </a>
                        @else
                          <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($otherBeachcourt->city),'latitude'=>$otherBeachcourt->latitude,'longitude'=>$otherBeachcourt->longitude,)) }}" >
                            <img class="progressive__img progressive--not-loaded" src="https://maps.googleapis.com/maps/api/staticmap?center={{$otherBeachcourt->latitude}},{{$otherBeachcourt->longitude}}&zoom=19&scale=2&size=347x180&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" data-progressive="https://maps.googleapis.com/maps/api/staticmap?center={{$otherBeachcourt->latitude}},{{$otherBeachcourt->longitude}}&zoom=19&scale=2&size=600x300&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" alt="Beachvolleyballfeld in {{$otherBeachcourt->postalCode}} {{$otherBeachcourt->city}}">
                          </a>
                        </figure>
                      @endif
                      @if ($otherBeachcourt->latitude != '')
                        <div class="beachcourt-item__distance">
                          <span class="beachcourt-item__icon" data-feather="navigation"></span>
                          <span class="beachcourt-item__paragraph">
                            
                            <?php  
                              $dis = number_format($otherBeachcourt->distance, 1);
                              $dis = str_replace('.', ',', $dis);  
                              echo $dis; 
                            ?>                      

                          km entfernt</span>
                        </div>
                      @endif

                      @if (Auth::user())
                        <favorite
                            :beachcourt={{ $otherBeachcourt->id }}
                            :favorited={{ $otherBeachcourt->favorited() ? 'true' : 'false' }}
                        ></favorite>
                        @endif
                  </div>
                  <div class="beachcourt-item__info">
                    <h3 class="beachcourt-item__title">Beachfeld in {{ $otherBeachcourt->city }}
                      @if ($otherBeachcourt->district != '') 
                        - {{ $otherBeachcourt->district }}
                      @endif
                    </h3>
                    @if ($otherBeachcourt->rating >= 1)
                      <div class="icon-text beachcourt-item__rating -spacing-b">
                        <span class="icon-text__icon" data-feather="award"></span>
                        <span class="icon-text__text">Dieses Feld wurde mit <br> <span class="-typo-copy--bold">{{ $otherBeachcourt->rating }}</span>/5 Bällen bewertet</span>
                      </div>
                    @else
                      <div class="icon-text beachcourt-item__rating -spacing-b">
                        <span class="icon-text__icon" data-feather="award"></span>
                        <span class="icon-text__text">Dieses Feld wurde noch <br> <span class="-typo-copy--bold">nicht </span> bewertet</span>
                      </div>
                    @endif
                    
                    <div class="icon-text -spacing-b">
                      <span class="icon-text__icon" data-feather="map-pin"></span>
                      <span class="icon-text__text">{{ $otherBeachcourt->postalCode }}<br>{{ $otherBeachcourt->city }}</span>
                    </div>

                    <div class="icon-text -spacing-b">
                      <span class="icon-text__icon" data-feather="compass"></span>
                      <span class="icon-text__text">{{ $otherBeachcourt->street }} {{ $otherBeachcourt->houseNumber }}</span>
                    </div>

                    <a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($otherBeachcourt->city),'latitude'=>$otherBeachcourt->latitude,'longitude'=>$otherBeachcourt->longitude,)) }}" class="button-primary -spacing-a"> <span class="button-primary__label">Mehr Details</span> <span class="button-primary__label button-primary__label--hover">Mehr Details</span>
                    </a>
                  </div>
                </div>
              </div>
            @endif
          @endif
        @endforeach
      @endif
    </div>

  </div> <!-- .content__main ENDE -->
@endsection
