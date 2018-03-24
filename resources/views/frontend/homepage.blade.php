
@extends('layouts.frontend')

@section('content')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}" />
<div class="row">
  <div class="col">
    <h1>Beachfelder.de</h1>
    <hr>
    <form action="/search" method="POST">
        <div class="column column--12 column--s-10">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" class="form-control" id="form-postcode" name="postcode">
            <input type="text" placeholder="Gib eine PLZ oder einen Ort ein" id="address-input" name="searchQuery" class="input__field ap-input">
            <button type="submit" class="btn btn-info">Suchen!</button>
        </div>
    </form>
    {{ $errors->postcode->first('postcode') }}
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/places.js@1.4.15"></script>
@foreach ($beachcourts as $beachcourt)
    <div class="column column--12 column--s-6 column--m-4 -spacing-c">
        <div class="beachcourt-summary" >
            @if ($beachcourt -> picutrePath = ' ')
                <img src="https://beachfelder.de/img/beachcourt-summary-bg-dummy.jpg" class="beachcourt-summary__image">
            @else
                <img src="https://beachfelder.de/img/HIERMUSSDASBILDHIN" class="beachcourt-summary__image">
            @endif
            <div class="beachcourt-summary__overlay">
                    @if (Auth::user())
                    <favorite
                        :beachcourt={{ $beachcourt->id }}
                        :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}
                    ></favorite>
                    @endif
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
