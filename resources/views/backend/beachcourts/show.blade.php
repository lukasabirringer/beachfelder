@extends('layouts.backend')

@section('content')
  <div class="content__main">
    <div class="row">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>
    <div class="row">
      <div class="column column--12">
        <p class="-typo-copy -text-color-gray-01"><a class="link-icon-text" href="{{ URL::previous() }}"><span class="link-icon-text__icon" data-feather="chevron-left"></span><span class="link-icon-text__text">Zurück zur Übersicht</span></a></p>
      </div>
    </div>
    <div class="row">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>
  	<div class="row">
  		<div class="column column--12">
  			<h1 class="title-page__title">Feld in {{ $beachcourt->city }} <a href="{{ URL::route('backendBeachcourt.edit', $beachcourt->id) }}" class="link-icon -text-color-gray-01"><span data-feather="edit"></span></a></h1>
  		</div>
  	</div>
  	<div class="row">
  		<div class="column column--12 column--m-6 -spacing-a">
  			<h4 class="-typo-headline-04 -text-color-green">Adresse</h4>
  			<p class="-typo-copy -text-color-petrol"><span class="-typo-copy -typo-copy--bold">Stadt:</span> {{ $beachcourt->postalCode }} {{ $beachcourt->city }}</p>
  			<p class="-typo-copy -text-color-petrol"><span class="-typo-copy -typo-copy--bold">Stadtteil:</span> {{ $beachcourt->district }} </p>
        <p class="-typo-copy -text-color-petrol"><span class="-typo-copy -typo-copy--bold">Straße + Hausnummer:</span> {{ $beachcourt->street }} {{ $beachcourt->houseNumber }}</p>
        <p class="-typo-copy -text-color-petrol -spacing-d"><span class="-typo-copy -typo-copy--bold">Bundesland:</span> {{ $beachcourt->state }} </p>
  			<p class="-typo-copy -text-color-petrol"><span class="-typo-copy -typo-copy--bold">Land:</span> {{ $beachcourt->country }}</p>
  		</div>

  		<div class="column column--12 column--m-6 -spacing-a">
			
			<h4 class="-typo-headline-04 -text-color-green">Betreiber</h4>
			<p class="-typo-copy -text-color-petrol"><span class="-typo-copy -typo-copy--bold">Betreiber:</span> {{ $beachcourt->operator }}</p>
      <p class="-typo-copy -text-color-petrol"><span class="-typo-copy -typo-copy--bold">Ansprechpartner:</span> 
        @if($beachcourt->operatorContactPerson != '')
          {{ $beachcourt->operatorContactPerson }}
        @else
          Nicht angegeben
        @endif
        </p>
      <p class="-typo-copy -text-color-petrol -spacing-d"><span class="-typo-copy -typo-copy--bold">Website:</span> <a class="link-text" href="{{ $beachcourt->operatorUrl }}" target="_blank">{{ $beachcourt->operatorUrl }}</a></p>
      <p class="-typo-copy -text-color-petrol"><span class="-typo-copy -typo-copy--bold">E-Mail:</span>
        @if($beachcourt->operatorContactPersonEmail != '')
          <a class="link-text" href="mailto:{{ $beachcourt->operatorContactPersonEmail }}">{{ $beachcourt->operatorContactPersonEmail }}</a>
        @else
          Nicht angegeben
        @endif
      </p>
      <p class="-typo-copy -text-color-petrol"><span class="-typo-copy -typo-copy--bold">Telefon:</span>
        @if($beachcourt->operatorContactPersonPhone != '')
          <a class="link-text" href="tel:{{ $beachcourt->operatorContactPersonPhone }}">{{ $beachcourt->operatorContactPersonPhone }}</a>
        @else
          Nicht angegeben
        @endif
      </p>
  		</div>
  	</div>

  	<div class="row">
  		<div class="column column--12 column--m-6 -spacing-a">
  			<h4 class="-typo-headline-04 -text-color-green">Koordinaten</h4>
  			<p class="-typo-copy -text-color-petrol">{{ $beachcourt->latitude }}</p>
  			<p class="-typo-copy -text-color-petrol">{{ $beachcourt->longitude }}</p>
  		</div>
  		<div class="column column--12 column--m-6 -spacing-a">
  			<h4 class="-typo-headline-04 -text-color-green">Plätze</h4>
  			<p class="-typo-copy -text-color-petrol">Outdoor: {{ $beachcourt->courtCountOutdoor }}</p>
  			<p class="-typo-copy -text-color-petrol">Indoor: {{ $beachcourt->courtCountIndoor }}</p>
  		</div>
  	</div>

  	<div class="row">
  		<div class="column column--12 column--m-6 -spacing-a">
  			<h4 class="-typo-headline-04 -text-color-green">Sonstiges</h4>
  			<p class="-typo-copy -text-color-petrol">
  				<span class="-typo-copy -typo-copy--bold">kostenpflichtig:</span> 
  				@if ( $beachcourt->isChargeable === 1 ) 
  					Ja
  				@elseif ($beachcourt->isChargeable === 0)
  					nein
          @else
            Nicht angegeben
  				@endif
  			</p>
  			<p class="-typo-copy -text-color-petrol">
  				<span class="-typo-copy -typo-copy--bold">öffentlich zugänglich:</span>
  				@if ( $beachcourt->isPublic === 1 ) 
  					Ja
  				@elseif ($beachcourt->isPublic === 0)
  					nein
          @else
            Nicht angegeben
  				@endif
  			</p>
        <p class="-typo-copy -text-color-petrol">
          <span class="-typo-copy -typo-copy--bold">Dusche:</span>
          @if ( $beachcourt->shower === 1 ) 
            Ja
          @elseif ($beachcourt->shower === 0)
            nein
          @else
            Nicht angegeben
          @endif
        </p>
        <p class="-typo-copy -text-color-petrol">
          <span class="-typo-copy -typo-copy--bold">Flutlicht:</span>
          @if ( $beachcourt->floodlight === 1 ) 
            Ja
          @elseif ($beachcourt->floodlight === 0)
            nein
          @else
            Nicht angegeben
          @endif
        </p>
        <p class="-typo-copy -text-color-petrol">
          <span class="-typo-copy -typo-copy--bold">Schwimmbad oder See?:</span>
          @if ( $beachcourt->isswimmingLake === 1 ) 
            Ja
          @elseif ($beachcourt->isswimmingLake === 0)
            nein
          @else
            Nicht angegeben
          @endif
        </p>
        <p class="-typo-copy -text-color-petrol">
          <span class="-typo-copy -typo-copy--bold">Einmalige Zutrittsgebühr:</span>
          @if ( $beachcourt->isSingleAccess === 1 ) 
            Ja
          @elseif ($beachcourt->isSingleAccess === 0)
            nein
          @else
            Nicht angegeben
          @endif
        </p>
        <p class="-typo-copy -text-color-petrol">
          <span class="-typo-copy -typo-copy--bold">Dauerhafte Mitgliedsgebühr:</span>
          @if ( $beachcourt->isMembership === 1 ) 
            Ja
          @elseif ($beachcourt->isMembership === 0)
            nein
          @else
            Nicht angegeben
          @endif
        </p>
  		</div>
  		<div class="column column--12 column--m-6 -spacing-a">
  			<h4 class="-typo-headline-04 -text-color-green">Rating</h4>
  			<p class="-typo-copy -text-color-petrol">
  				<span class="-typo-copy -typo-copy--bold">{{$beachcourtRatingCount}}</span>
  				@if ($beachcourtRatingCount < 2)
  					Bewertung
  				@else
  					Bewertungen
  				@endif
  			</p>
  			<p class="-typo-copy -text-color-petrol">
  				@if ($beachcourtRatingCount > 10)
						Mehr als 10 Bewertungen, daher wird Rating von Usern ausgegeben
  					@else
						Weniger als 10 Bewertungen, daher wird Rating von beachfelder.de oder kein Rating ausgegeben
  				@endif
  			</p>
  		</div>
  	</div>

  	<div class="row">
  		<div class="column column--12 -spacing-a">
  			<hr class="divider">
  		</div>
  	</div>
  	<div class="row">
  		<div class="column column--12">
  			<p class="-typo-copy -text-color-gray-01"><a class="link-icon-text" href="{{ URL::previous() }}"><span class="link-icon-text__icon" data-feather="chevron-left"></span><span class="link-icon-text__text">Zurück zur Übersicht</span></a></p>
  		</div>
  	</div>
    <div class="row">
      <div class="column column--12">
        <hr class="divider">
      </div>
    </div>
  </div>
@endsection
