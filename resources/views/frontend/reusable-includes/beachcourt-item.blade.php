<div class="beachcourt-item">
	<div class="beachcourt-item__image">

		@if(is_dir(public_path('uploads/beachcourts/' . $beachcourt->id . '/slider/standard/')))
			<figure class="progressive">
				<a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude)) }}">
					<img
						class="progressive__img"
						data-progressive="{{url('/')}}/uploads/beachcourts/{{$beachcourt->id}}/slider/retina/slide-image-01-retina.jpg"
						src="{{url('/')}}/uploads/beachcourts/{{$beachcourt->id}}/slider/standard/slide-image-01.jpg"
					/>
			</a>
			
		@else
			<a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude)) }}" >
				<img class="progressive__img" src="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=347x180&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" data-progressive="https://maps.googleapis.com/maps/api/staticmap?center={{$beachcourt->latitude}},{{$beachcourt->longitude}}&zoom=19&scale=2&size=600x300&maptype=satellite&format=jpg&visual_refresh=true&key=AIzaSyAXZ7GDxm_FJ5g5yVdkawywTg7swA1rVeE" alt="Beachvolleyballfeld in {{$beachcourt->postalCode}} {{$beachcourt->city}}">
			</a>
			</figure>
		@endif

		@if (Auth::user())
				<favorite :beachcourt={{ $beachcourt->id }} :favorited={{ $beachcourt->favorited() ? 'true' : 'false' }}></favorite>
		@endif
	</div>
	<div class="beachcourt-item__info">
		<a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude)) }}" class="beachcourt-item__title">Beachfeld in {{ $beachcourt->city }}@if ($beachcourt->district != '')-{{ $beachcourt->district }}@endif 
		</a>
    @if ($beachcourt->bfdeRating)
    	<div class="rating -spacing-b">
    		@for ($i = 1; $i <= $beachcourt->bfdeRating; $i++)
    		  <div class="rating__item">
    		    <img src="{{ asset('images/rating-badge-petrol.svg') }}" alt="">
    		  </div>
    		@endfor
    		<?php $starsLeft = 5 - $beachcourt->bfdeRating; ?>
    		@if (count($starsLeft) > 0)
          @for ($i = 1; $i <= $starsLeft; $i++)
          <div class="rating__item">
            <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
          </div>
          @endfor
          <p class="-typo-copy -typo-copy--small -text-color-gray-01 -text-color-gray-01">Vorläufige Bewertung von beachfelder.de</p>
        </div>
      @endif

    @elseif ($beachcourt->ratingCount < 10)
    	<div class="rating -spacing-b">
      	@for ($i = 1; $i <= 5; $i++)
      		<div class="rating__item">
      		  <img src="{{ asset('images/rating-badge-gray.svg') }}" alt="">
      		</div>
      	@endfor
      	<p class="-typo-copy -typo-copy--small -text-color-gray-01 ">Momentan liegen noch zu wenige Bewertungen vor.</p>
    	</div>
    @else
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

    	<p class="-typo-copy -text-color-gray-01 -text-color-gray-0 -spacing-d">{{ $beachcourt->ratingCount }} Bewertungen</p>
    @endif

		<div class="icon-text -spacing-b">
			<span class="icon-text__icon" data-feather="map-pin"></span>
			<span class="icon-text__text">{{ $beachcourt->postalCode }}<br>{{ $beachcourt->city }}</span>
		</div>

		<div class="icon-text -spacing-b">
			<span class="icon-text__icon" data-feather="compass"></span>
			<span class="icon-text__text">{{ $beachcourt->street }} {{ $beachcourt->houseNumber }}</span>
		</div>

		<a href="{{ URL::route('beachcourts.show', array('cityslug'=>strtolower($beachcourt->city),'latitude'=>$beachcourt->latitude,'longitude'=>$beachcourt->longitude)) }}" class="button-primary -spacing-a">
			<span class="button-primary__label">Mehr erfahren</span>
			<span class="button-primary__label button-primary__label--hover">Mehr erfahren</span>
		</a>
	</div>
</div>