
@extends('layouts.frontend')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="content__main">
    <div class="row">
        <div class="column column--12 column--s-6 column--m-4">
            <h1 class="title-page__title home__title">Willkommen</h1>
            <p class="title-page__subtitle">
            <span class="-typo-copy--bold">beachfelder.de</span> ist die Beachvolleyballfeld-Suchmaschine mit der größten und umfangreichsten Datenbank an Feldern.</p>

            <p class="-typo-copy -text-color-gray-01 -spacing-a">Wir bieten dir die Möglickeit, Felder zu bewerten, Favoriten zu speichern und neue Beachvolleyballfelder uns vorzuschlagen.</p>
        </div>
        <div class="column column--12 column--s-6 column--m-8" style="position: relative;">
                        <div class="overlay-gradient overlay-gradient--left">
                            <button class="button-circle button-circle--left">
                                <span class="button-circle__icon" data-feather="chevron-left"></span>
                            </button>

                            <button class="button-circle button-circle--right -spacing-b">
                                <span class="button-circle__icon" data-feather="chevron-right"></span>
                            </button>
                        </div>
                        <div class="xxxxxxxxxx">
                            @foreach ($beachcourts as $beachcourt)
                            <div class="beachcourt-item">
                                <div class="beachcourt-item__image" style="background: url(/uploads/beachcourts/{{$beachcourt->id}}/1.jpg);">
                                    <div class="beachcourt-item__favorite beachcourt-item__favorite--is-favorited">
                                        <span data-feather="heart"></span>
                                        @if (Auth::user())
                                        <favorite
                                            :beachcourt={{ $beachcourt->id }}
                                            :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}
                                        ></favorite>
                                        @endif
                                    </div>
                                </div>
                                <div class="beachcourt-item__info">
                                    <h3 class="beachcourt-item__title">Beachvolleyballfeld in {{ $beachcourt->city }}</h3>
                                    <div class="icon-text beachcourt-item__rating -spacing-b">
                                        <span class="icon-text__icon" data-feather="award"></span>
                                        <span class="icon-text__text">Dieses Feld wurde mit <br> <span class="-typo-copy--bold">{{ $beachcourt->rating }}</span>/5 Bällen bewertet</span>
                                    </div>

                                    <div class="icon-text -spacing-b">
                                        <span class="icon-text__icon" data-feather="map-pin"></span>
                                        <span class="icon-text__text">{{ $beachcourt->postalCode }}<br>{{ $beachcourt->city }}</span>
                                    </div>

                                    <div class="icon-text -spacing-b">
                                        <span class="icon-text__icon" data-feather="info"></span>
                                        <span class="icon-text__text">Felder outdoor: {{ $beachcourt->courtCountOutdoor }} <br> Felder indoor: {{ $beachcourt->courtCountIndoor }}</span>
                                    </div>

                                    <a href="beachcourt-detail.html" class="button-primary -spacing-a">
                                      <span class="button-primary__label">Mehr Details</span>
                                    </a>
                                </div>
                                @endforeach
                            </div>
</div>
xxx
            <div class="beachcourt-summary__overlay">


                <h3 class="beachcourt-summary__title"><a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude,)) }}">Beachvolleyballfeld </a></h3>
                <p class="-typo-copy--large -text-color-white -font-primary -align-center">{{ $beachcourt->postalCode }} {{ $beachcourt->city }} <br>{{ $beachcourt->street }}  {{ $beachcourt->houseNumber }} </p>
                <span class="beachcourt-summary__distance">
                    <span class="icon icon--distance beachcourt-summary__icon-distance"></span>
                    <?php
                        $distance = round($beachcourt->distance, 1)*2;
                        $distance = str_replace('.', ',', $distance);
                    ?>
                    {{ $distance }} km entfernt
                </span>
                <div class="beachcourt-summary__location">
                    <span class="beachcourt-summary__coordinate">
                    @if ($beachcourt->courtCountOutdoor > 0)
                        Felder outdoor: {{ $beachcourt->courtCountOutdoor }}
                    @endif

                    @if ($beachcourt->courtCountIndoor > 0)
                        <br>Felder Indoor: {{ $beachcourt->courtCountIndoor }} </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
