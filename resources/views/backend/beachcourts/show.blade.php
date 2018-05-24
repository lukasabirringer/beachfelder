@extends('layouts.backend')

@section('content')
  <div class="content__main">
  	<div class="row">
  		<div class="column column--12">
  			<h1 class="title-page__title">Feld in {{ $beachcourt->city }}</h1>
  		</div>
  	</div>
  	<div class="row">

  		<div class="column column--12 column--m-6 -spacing-a">
  			<h4 class="-typo-headline-04 -text-color-green">Adresse</h4>
  			<p class="-typo-copy -text-color-petrol">{{ $beachcourt->postalCode }} {{ $beachcourt->city }}</p>
  			<p class="-typo-copy -text-color-petrol">{{ $beachcourt->street }} {{ $beachcourt->houseNumber }}</p>
  			<p class="-typo-copy -text-color-petrol">{{ $beachcourt->state }}</p>
  			<p class="-typo-copy -text-color-petrol">{{ $beachcourt->country }}</p>
  		</div>

  		<div class="column column--12 column--m-6 -spacing-a">
			
			<h4 class="-typo-headline-04 -text-color-green">Betreiber</h4>
			<p class="-typo-copy -text-color-petrol">{{ $beachcourt->operator }}</p>
			<p class="-typo-copy -text-color-petrol"><a class="link-text" href="{{ $beachcourt->operatorUrl }}" target="_blank">{{ $beachcourt->operatorUrl }}</a></p>
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
  				kostenpflichtig: 
  				@if ( $beachcourt->isChargeable === 1 ) 
  					Ja
  				@elseif ($beachcourt->isChargeable === 0)
  					nein
          @else
            Nicht angegeben
  				@endif
  			</p>
  			<p class="-typo-copy -text-color-petrol">
  				öffentlich zugänglich: 
  				@if ( $beachcourt->isPublic === 1 ) 
  					Ja
  				@elseif ($beachcourt->isPublic === 0)
  					nein
          @else
            Nicht angegeben
  				@endif
  			</p>
  		</div>
  		<div class="column column--12 column--m-6 -spacing-a">
  			<h4 class="-typo-headline-04 -text-color-green">Rating</h4>
  			<span class="-typo-copy -text-color-petrol">{{ str_limit($beachcourt->rating, $limit = 3, $end = '') }} ({{ $beachcourt->ratingCount }} Stimmen)</span>
  			<span class="-typo-copy -text-color-petrol">
  				@if (($beachcourt->ratingCount) < 10)
  				    Dieses Rating stammt von beachfelder.de
  				@else
  				    Dieses Rating stammt von den Usern
  				@endif
  			</span>
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
  </div>
@endsection
